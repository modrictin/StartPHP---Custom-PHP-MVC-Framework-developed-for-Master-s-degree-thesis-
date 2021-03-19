<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\core;


use app\core\db\Database;
use app\core\db\DbModel;
use mysql_xdevapi\Exception;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\BadRouteException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use Dotenv\Dotenv;


class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Database $db;
    public RouteCollector $router;
    public Dispatcher $dispatcher;
    public Request $Request;
    public Response $Response;
    public Session $session;
    public ?DbModel $user;
    public array $config;
    private $RouterResponse;


    //jer mozemo mijenjat klasu
    public string $userClass;


    /**
     * Application constructor.
     *
     * Initializes the Routes
     * @param string $RootPath -> Path to the root of the project
     */

    public function __construct(string $RootPath)
    {
        $this->initConfig();

        $this->db = new Database($this->config['db']);
        //Initialize RouteCollector and Dispatcher
        $this->mailer = new Mailer($this->config['mail']);
        $this->session = new Session();
        $this->Response = new Response();
        $this->Request = new Request();
        self::$ROOT_DIR = $RootPath;
        self::$app = $this;

        $this->userClass = $this->config['userClass'];
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }

        $this->InitializeRouter();

    }


    private function initConfig()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        $this->config = [

            'userClass' => \app\models\User::class,
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD']
            ],
            'mail' => [
                'mail_host' => $_ENV['MAIL_HOST'],
                'smtp_port' => $_ENV['SMTP_PORT'],
                'mail_username' => $_ENV['MAIL_USERNAME'],
                'mail_pw' => $_ENV['SMTP_PASSWORD'],
                'from_default' => $_ENV['MAIL_SEND_FROM_DEFAULT'],
            ]

        ];
    }

    private function InitializeRouter()
    {
        $this->router = new RouteCollector();
        Routes::DefineRouts($this->router);
        $this->dispatcher = new Dispatcher($this->router->getData());

        try {
            $this->RouterResponse = $this->dispatcher
                ->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        } catch (HttpRouteNotFoundException $e) {
            /**
             * 404 Exception
             */
            $this->Response->StatusCode(404);
            $controller = new Controller();
            echo $controller->Render('exceptions/e404', "404", ['message' => $e->getMessage()]);


        } catch (HttpMethodNotAllowedException $e) {

            $controller = new Controller();
            echo $controller->Render('exceptions/e403', "Forbiden", ['message' => $e->getMessage()]);

        } catch (\Exception $e) {

            $controller = new Controller();
            echo $controller->Render('exceptions/e403', "Forbiden", ['message' => $e->getMessage()]);

        }

    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    /**
     * Run the application in the index.php dispatching all the html
     */
    public function Run()
    {
        // Echo The Response from Routes
        echo $this->RouterResponse;
    }

    public function login(DbModel $user): bool
    {
        $this->user = $user;
        $primaryKey = $user::primaryKey();

        $primaryKeyValue = $user->{$primaryKey};

        $this->session->set('user', $primaryKeyValue);

        return true;
    }


    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }


}

