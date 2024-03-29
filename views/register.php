<?php
/** @var $model app\models\User */

use app\core\form\Form;

$this->layout('layouts/auth');

?>

<div class="d-flex justify-content-center">
    <div class="col-md-6 pt-5">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Register</h4>
            </div>
            <div class="card-body">
                <?php $form = Form::begin('', 'post'); ?>
                <div class="row">
                    <div class="col">
                        <?php echo $form->field($model, 'firstname'); ?>
                    </div>
                    <div class="col">
                        <?php echo $form->field($model, 'lastname'); ?>
                    </div>
                </div>
                <?php echo $form->field($model, 'email'); ?>
                <?php echo $form->field($model, 'password')->passwordField(); ?>
                <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
                <button type="submit" class="btn btn-primary float-right ">Register</button>
                <a href="/login">
                    <button type="button" class="btn btn-default float-left ">Back to login</button>
                </a>
                <?php Form::end(); ?>

            </div>
        </div>
    </div>

</div>