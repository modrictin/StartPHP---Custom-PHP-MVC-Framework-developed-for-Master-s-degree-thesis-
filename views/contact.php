<?php

use app\core\form\Form;
use app\core\form\TextareaField;

$this->layout('layouts/main');
/**  @var $model \app\models\ContactForm */

?>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Contact Us</h4>
                <p class="card-category">Fill out the form to contact us</p>
            </div>
            <div class="card-body">

                <?php $form = Form::begin('', 'post') ?>
                <?php echo $form->field($model, 'subject') ?>
                <?php echo $form->field($model, 'email') ?>
                <?php echo new TextareaField($model, 'body') ?>


                <button type="submit" class="btn btn-primary float-right">Send Email</button>

                <?php Form::end() ?>


            </div>
        </div>
    </div>

</div>