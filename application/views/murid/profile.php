<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <div class="row-cols"> -->
    <div class="row">
        <div class="col-8 col-md-8" style="padding-right: 7px">
            <!-- user detail -->
            <div class="border border-secondary">
                <h1 class="udtitle" style="font-size: 22px;">User Details
                    <a href="<?= base_url('murid/changePassword') ?>">
                        <i class="fas fa-edit fa-sm float-right" style="color: gray; margin-right: 40px; margin-top: 20px; font-size: 18px;">Edit</i>
                    </a>
                </h1>
                <h1 class="udtitle"><b>Angkatan</b></h1>
                <h1 class="udisi"><?= $profile['angkatan'] ?></h1>
                <h1 class="udtitle"><b>Email</b></h1>
                <h1 class="udisi"><?= $profile['email'] ?></h1>
                <h1 class="udtitle"><b>Password</b></h1>
                <h1 class="udisi">*****************</h1>
                <h1 class="udtitle"><b>Negara</b></h1>
                <h1 class="udisi" style="margin-bottom: 20px;"><?= $profile['negara'] ?></h1>
            </div>
            <!-- Courses Detail -->
            <div class="see-all border border-secondary" style="margin-top: 10px;">
                <h1 class="udtitle" style="font-size: 22px;">Courses Details</h1>
                <?php foreach ($guru as $g) : ?>
                    <h1 class="coursedetail"><?= $g['kelas'] ?> - <?= $g['nama_matpel'] ?> - <?= $g['nama_lengkap'] ?>, <?= $g['gelar'] ?>.</h1>
                <?php endforeach ?>
                <h6 class="see-all-button" style="cursor: pointer;">See All</h6>
            </div>
        </div>
        <!-- Side-bar kiri -->
        <div class="col-4 col-md-4 pl-3">
            <div class="row mb-3">
                <div class="mx-auto d-block text-center border border-secondary p-3" style="width: 30rem;">
                    <img src="<?= base_url('assets/img/') . $profile['image'] . '.jpg' ?>" style="width: 120px; margin-bottom: 10px;" class="rounded-circle border" />
                    <h5 style="color: black;"><?= $profile['nama_lengkap'] ?> </h5>
                    <h7 style="color: black;"><?= $profile['nis'] ?> </h7>
                    <p style="color: black;"><?= $profile['kelas'] ?>
                </div>
            </div>
            <div class="row mb-4">
                <div class="mx-auto ml-2 d-block border border-secondary" style="width: 30rem;">
                    <h1 class="loginact1">Login Activity</h1>
                    <h1 class="loginact2"><b>First access to site</b></h1>
                    <!-- <h1 class="loginact3">Monday, 27 September 2021, 7:27 AM (75 days 2 hours)</h1> -->
                    <h1 class="loginact3"><?= date('d-m-Y , H:i:s AM / PM') ?> (<?= date(date('now') - date('d')) ?>)</h1>
                    <h1 class="loginact2"><b>Last access to site</b></h1>
                    <h1 class="loginact3" style="margin-bottom: 15px;"><?= date('d-m-Y , H:i:s AM/PM') ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="edit-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('murid/updateProfile') ?>">
                    <input type="hidden" name="id" id="id" value="<?= $profile['id_user'] ?>">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" name="negara" id="exampleFormControlSelect1">
                            <?php foreach ($jml_negara as $n) : ?>
                                <?php if ($n == $profile['negara']) : ?>
                                    <option value="<?= $n['negara'] ?>" selected><?= $n['negara'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $n['negara'] ?>"><?= $n['negara'] ?></option>
                                <?php endif; ?>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Current Password</label>
                        <input type="password" name="password1" class="form-control" id="password">
                        <?= form_error('password1', '<small class="text-danger pl-3"></small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" name="password2" class="form-control" id="password">
                        <?= form_error('password2') ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Confirm Password</label>
                        <input type="password" name="password3" class="form-control" id="password">
                        <?= form_error('password3') ?>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div> -->