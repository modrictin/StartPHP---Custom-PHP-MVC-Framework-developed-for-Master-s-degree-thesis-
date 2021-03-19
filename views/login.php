<?php

/** @var $model app\models\User */

use app\core\Application;
use app\core\AssetManager;
use app\core\form\Form;

$this->layout('layouts/auth');


?>

<div class="d-flex justify-content-center">
    <div class="col-md-4 pt-5">
        <div class="card">

            <div class="card-header card-header-primary">
                <h4 class="card-title">Login</h4>
            </div>
            <div class="card-body">


                <img src="<?php echo AssetManager::baseUrl() ?>/assets/template/img/StartPHP.png" class="w-100">
                <?php $form = Form::begin('', 'post'); ?>

                <?php echo $form->field($model, 'email'); ?>
                <?php echo $form->field($model, 'password')->passwordField(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-right w-100">Login</button>
                    </div>
                </div>
                <?php Form::end(); ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label>Dont have an account?</label>
                        <a href="/register">

                            <button class="btn btn-info w-100">Register</button>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>