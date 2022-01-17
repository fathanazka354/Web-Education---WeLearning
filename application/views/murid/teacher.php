<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 40px">
            <!-- choose lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Teacher</h1>
            </div>
            <?php foreach ($guru as $g) : ?>
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" style="color: black;">
                            <div class="col-2">
                                <!-- <i class="fas fa-user-circle"></i> -->
                                <img class="rounded-circle mx-auto d-block" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 80px;height: 80px">
                            </div>
                            <div class="col-10">
                                <div class="ml-5">
                                    <h6><?= $g['nama_lengkap'] ?>, <?= $g['gelar'] ?></h5>
                                        <h6>NIP : <span><?= $g['nis'] ?></span></h6>
                                        <h6 class="font-weight-bold"><?= $g['nama_matpel'] ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


            <!-- Content Row -->
            <div class="row">
            </div>
        </div>