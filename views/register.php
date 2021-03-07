<?php

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
                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">First Name</label>
                                <input type="text" name="fname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Last Name</label>
                                <input type="text" name="lname" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email address</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right ">Register</button>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

</div>