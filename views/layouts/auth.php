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
    <title><?= $this->e($GlobalPageTitle) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <?php AssetManager::GetTemplateStyles(); ?>
    <?php AssetManager::GetViewStyles($this->e($GlobalViewName)); ?>
    <?php AssetManager::GetPackageStyles($GlobalPackages); ?>
</head>
<body>
<div class="wrapper ">
    <div class="container-fluid">

        <?= $this->section('content') ?>
    </div>
</div>

<!-- End your project here-->


</body>
<?php AssetManager::GetTemplateScripts() ?>
<?php AssetManager::GetViewScripts($GlobalViewName); ?>
<?php AssetManager::GetPackageScripts($GlobalPackages); ?>


</html>
