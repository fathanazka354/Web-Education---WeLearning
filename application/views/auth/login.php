<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="">

        <div class="card o-hidden border-0 shadow-lg my-0" style="width: 400px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->


                <div class="row justify-content-center">
                    <?php
                    if ($this->session->flashdata('message')) {
                    ?>
                        <!-- <div class="alert alert-danger">
                            <?= $this->session->flashdata('message'); ?>
                        </div> -->
                    <?php } ?>
                    <div class="col-10">
                        <div class="p-3 mt-4 mb-5">
                            <div class="text-center">
                                <!-- <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1> -->
                                <img src="<?= base_url('assets') ?>/img/logobaruku.png" style="height: 200px; width: 200px; margin-bottom: 15px;">
                            </div>
                            <form class="user" method="POST" action="<?= base_url('auth/masuk') ?>" autocomplete="off">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nis" name="nis" placeholder="Input NIS" autocomplete="none">
                                    <?php echo form_error('nis', '<small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Input Password">
                                    <?php echo form_error('password', '<small class="text-danger" >', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LfZfu0dAAAAAB4b0ByBr50Gwb4C0Tfc4VWnTlAI">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <!-- <h5 class="small mt-2 mb-2 text-center">Or Login With</h5> -->
                                <!-- <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> AMIKOM GOOGLE ACCOUNT
                                </a> -->
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