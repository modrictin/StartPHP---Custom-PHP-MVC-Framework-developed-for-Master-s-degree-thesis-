<?php


use app\core\Application;

$this->layout('layouts/main');


?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h1>Welcome, <?php echo Application::$app->user->firstname ?></h1>
                <p>StartPHP is a fast, modern and EasyToUse PHP MVC FrameWork.</p>
                <hr>
                <h2>Vision</h2>
                <p>My vision was to make an easy to develop starter framework which developers can use to quickstart
                    their
                    projects and build their unique frameworks! </p>

                <h2>Libaries used</h2>
                <p>Special thanks to other developers that made these awesome easy to use libaries for working with:</p>
                <ul>
                    <li>
                        <a class="font-weight-bold" href="https://github.com/mrjgreen/phroute">PHRoute</a> - Fast
                        request router for PHP

                    </li>
                    <li>
                        <a class="font-weight-bold" href="http://platesphp.com/">Plates PHP</a> - Native PHP template
                        system that’s fast, easy to use and easy to extend.

                    </li>
                    <li>
                        <a class="font-weight-bold" href="https://respect-validation.readthedocs.io/en/latest/">Respect\Validation</a>
                        - The most awesome validation engine ever created for PHP.
                    </li>
                    <li>
                        <a class="font-weight-bold" href="https://docs.guzzlephp.org/en/stable/">Guzzle</a> - Guzzle is
                        a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web
                        services.
                    </li>
                    <li>
                        <a class="font-weight-bold" href="https://github.com/vlucas/phpdotenv">PHP dotenv</a> - Loads
                        environment variables from .env to getenv(), $_ENV and $_SERVER automagically.
                    </li>
                    <li>
                        <a class="font-weight-bold" href="https://github.com/PHPMailer/PHPMailer">PHP Mailer</a> - A
                        full-featured email creation and transfer class for PHP
                    </li>

                </ul>
                <hr>
                <h2>Clone the repo and start Developing your own framework</h2>
                <a target="_blank" href="https://github.com/progonitelj/StartPHP">
                    <button class="btn btn-lg btn-primary">
                        <i class="material-icons">download</i>
                        Github Repository
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

