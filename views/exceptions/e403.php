<?php

/** @var $model app\models\User */

use app\core\AssetManager;
use app\core\form\Form;

$this->layout('/layouts/auth');

?>

<div class="d-flex justify-content-center">
    <div class="col-md-4 pt-5">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Error</h4>
            </div>
            <br>
            <h4 class="text-center"><?php echo $message ?></h4>
            <div class="row">
                <div class="col-md-12 text-center">

                    <a href="/login">

                        <button class="btn btn-info ">Login</button>
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

</div>