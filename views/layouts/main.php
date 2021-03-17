<?php

use app\core\Application;
use app\core\AssetManager;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <?php AssetManager::GetTemplateStyles(); ?>
    <?php AssetManager::GetViewStyles($this->e($VIEW_NAME)); ?>
    <?php AssetManager::GetPackageStyles($PACKAGES); ?>
</head>
<body>
<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo p-0"><a href="/" class="simple-text logo-normal">
                <img src="./assets/template/img/StartPHP.png" class="w-100">
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item   ">
                    <a class="nav-link" href="/">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item   ">
                    <a class="nav-link" href="/contact">
                        <i class="material-icons">grid_4x4</i>
                        <p>contact</p>
                    </a>
                </li>
                <li class="nav-item   ">
                    <a class="nav-link" href="/dashboard">
                        <i class="material-icons">grid_4x4</i>
                        <p>Documentation</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;"><?= $this->e($title) ?></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="#">Another Notification</a>
                                <a class="dropdown-item" href="#">Another One</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <?php if (Application::$app->session->getFlash('success')) { ?>

                    <div class="alert alert-success">
                        <?php echo Application::$app->session->getFlash('success') ?>
                    </div>

                <?php } ?>


                <?= $this->section('content') ?>

            </div>
        </div>
    </div>


</div>
<!-- End your project here-->


</body>
<?php AssetManager::GetTemplateScripts() ?>
<?php AssetManager::GetViewScripts($VIEW_NAME); ?>
<?php AssetManager::GetPackageScripts($PACKAGES); ?>

<!-- SET ACTIVE STATUS IF LINK MATCHES THE MODULE -->
<script>
    function SetActiveNavigation() {
        var Link = window.location;
        $(".sidebar-wrapper .nav .nav-item .nav-link").each(function () {
            if ($(this).attr("href") == Link.pathname) {
                $(this).parents('li').addClass("active");
            }
        })
    }

    SetActiveNavigation();
</script>

</html>
