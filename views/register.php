<?php

use app\core\form\Form;

$this->layout('layouts/auth', [
    'title' => $this->e($PAGE_TITLE),
    'VIEW_NAME' => $this->e($VIEW_NAME),
    'PACKAGES' => $PACKAGES
]);

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
                        <?php echo $form->field($model, 'fname'); ?>
                    </div>
                    <div class="col">
                        <?php echo $form->field($model, 'lname'); ?>
                    </div>
                </div>
                <?php echo $form->field($model, 'email'); ?>
                <?php echo $form->field($model, 'password')->passwordField(); ?>
                <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
                <button type="submit" class="btn btn-primary float-right ">Register</button>
                <?php Form::end(); ?>

            </div>
        </div>
    </div>

</div>