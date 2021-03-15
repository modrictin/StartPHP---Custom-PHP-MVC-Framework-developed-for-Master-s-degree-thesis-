<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\core;


use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\BadRouteException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Database $db;
    public RouteCollector $router;
    public Dispatcher $dispatcher;
    public Request $Request;
    public Response $Response;


    private $RouterResponse;


    /**
     * Application constructor.
     *
     * Initializes the Routes
     * @param string $RootPath -> Path to the root of the project
     */

    public function __construct(string $RootPath)
    {
        self::$ROOT_DIR = $RootPath;
        self::$app = $this;
        $this->db = new Database();
        $this->Response = new Response();
        $this->Request = new Request();
        //Initialize RouteCollector and Dispatcher
        $this->InitializeRouter();
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

        } catch (HttpMethodNotAllowedException $e) {
            /**
             * Route Not Allowed Exception
             */
            return 'Not Allowed';
        }

    }

    /**
     * Run the application in the index.php dispatching all the html
     */
    public function Run()
    {

        // Echo The Response from Routes

        echo $this->RouterResponse;

    }


}

