<!-- Outer Row -->
<div class="row justify-content-center mt-2">

    <div class="col-xl-7 col-lg-10 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-3">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="p-3 mt-4 mb-5">
                            <div class="text-center">
                                <!-- <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1> -->
                                <img src="https://amikom.ac.id/public/docs/2016/logo_amikom_full_color.png" style="height: 200px; width: 200px; margin-bottom: 15px;">
                            </div>

                            <form class="user" method="POST" action="<?= base_url("auth/addData") ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="id" name="id" placeholder="Input ID">
                                    <?php echo form_error('nis', '<small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nis" name="nis" aria-describedby="emailHelp" placeholder="Input NIS">
                                    <?php echo form_error('nis', '<small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Input username">
                                </div>
                                <?php echo form_error('username', '<small class="text-danger" >', '</small>'); ?>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Input Password">
                                </div>
                                <?php echo form_error('password', '<small class="text-danger" >', '</small>'); ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Sign Up
                                </button>
                            </form>
                            <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>