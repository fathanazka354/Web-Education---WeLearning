<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <div class="row-cols"> -->
    <div class="row">
        <div class="col-8 col-md-8" style="padding-right: 7px">
            <!-- user detail -->
            <div class="border border-secondary">
                <h1 class="udtitle" style="font-size: 22px;">User Details
                    <a href="<?= base_url('guru/changePassword') ?>">
                        <i class="fas fa-edit fa-sm float-right" style="color: gray; margin-right: 40px; margin-top: 20px; font-size: 18px;">Edit</i>
                    </a>
                </h1>
                <h1 class="udtitle"><b>Mata Pelajaran</b></h1>
                <h1 class="udisi"><?= $profile['nama_matpel'] ?></h1>
                <h1 class="udtitle"><b>Email</b></h1>
                <h1 class="udisi"><?= $profile['email'] ?></h1>
                <h1 class="udtitle"><b>Password</b></h1>
                <h1 class="udisi"><?= $profile['password'] ?></h1>
                <h1 class="udtitle"><b>Negara</b></h1>
                <h1 class="udisi" style="margin-bottom: 20px;"><?= $profile['negara'] ?></h1>
            </div>
            <!-- Courses Detail -->
            <div class="see-all border border-secondary" style="margin-top: 10px;">
                <h1 class="udtitle" style="font-size: 22px;">Courses Details</h1>
                <?php foreach ($guru as $g) : ?>
                    <h1 class="coursedetail"><?= $g['kelas'] ?> - <?= $g['nama_matpel'] ?></h1>
                <?php endforeach ?>
                </span>
                <h5 class="see-all-button" style="cursor: pointer;">See All</h5>
            </div>
        </div>
        <!-- Side-bar kiri -->
        <div class="col-4 col-md-4 pl-3">
            <div class="row mb-3">
                <div class="mx-auto d-block text-center border border-secondary" style="width: 30rem;">
                    <img src="<?= base_url('assets/img/') . $profile['image'] ?>" style="width: 120px; margin-bottom: 10px;" class="rounded-pill border" />
                    <h5 style="color: black;">Irawati, S.Pd.</h5>
                    <p style="color: black;">Biologi <br> NIP. 112233445667788</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="mx-auto ml-2 d-block border border-secondary" style="width: 30rem;">
                    <h1 class="loginact1">Login Activity</h1>
                    <h1 class="loginact2"><b>First access to site</b></h1>
                    <h1 class="loginact3">Monday, 27 September 2021, 7:27 AM (75 days 2 hours)</h1>
                    <h1 class="loginact2"><b>Last access to site</b></h1>
                    <h1 class="loginact3" style="margin-bottom: 15px;">Saturday, 11 December 2021, 9:46 AM (7 secs)</h1>
                </div>
            </div>
        </div>
    </div>
</div>