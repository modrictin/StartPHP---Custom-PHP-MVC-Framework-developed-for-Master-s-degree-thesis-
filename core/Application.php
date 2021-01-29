<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/28/2021
 */

namespace app\core;

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;


class Application
{
    public static string $ROOT_DIR;

    public RouteCollector $router;
    public Dispatcher $dispatcher;
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
        //Initialize RouteCollector and Dispatcher
        $this->InitializeRouter();
    }

    private function InitializeRouter()
    {
        $this->router = new RouteCollector();
        Routes::DefineRouts($this->router);
        $this->dispatcher = new Dispatcher($this->router->getData());
        $this->RouterResponse = $this->dispatcher
            ->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
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

