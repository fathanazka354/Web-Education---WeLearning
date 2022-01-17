<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 40px">
            <!-- choose lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Recently Accessed Courses</h1>
            </div>

            <!-- Content Row 1 -->
            <div class="row slider">
                <!-- <div class="col-xl-1 col-md-2" style="margin-top: 80px;margin-bottom: 80px;">
                    <div class="align-items-center">
                      <i class="fas fa-chevron-circle-left" style="font-size: 40px;color: black;"></i>
                    </div>
                  </div> -->

                <!-- Lesson 1 -->
                <?php if (isset($history)) : ?>

                    <?php foreach ($history as $h) : ?>
                        <div class="col-md-12 mb-4">
                            <a href="<?= base_url('murid/detailLesson/') . $h['id_matpel'] ?>" class="text-decoration-none">
                                <div class="card shadow h-100 pb-2">
                                    <div class="card-header py-3 text-light" style="height: 135px;background-color: <?= $h['color'] ?>">
                                        <div class="h6 font-weight-bold"><?= $h['nama_matpel'] ?> <?= $h['kelas'] ?></div>
                                        <p class="mt-2"><?= $h['nama_lengkap'] ?>, <?= $h['gelar'] ?></p>
                                    </div>
                                    <div class="card-body" style="height: 90px;">
                                        <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-md-12 mb-4">
                        <div class="card shadow h-100 pb-2">
                            <div class="card-body d-flex justify-content-center align-item-center">
                                <div class="row ">
                                    <div class="col">
                                        <div class="h6 font-weight-bold">No Lesson result</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <!-- choose lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Schedules</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <h4 class="pl-3 pt-4 text-gray-800">Offline Class</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Pelajaran</th>
                                    <th>Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($buku as $b) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td><?= $b['hari'] ?></td>
                                        <td><?= $b['jam'] ?></td>
                                        <td>
                                            <h6>
                                                <?= $b['nama_matpel'] ?>
                                            </h6>
                                        </td>
                                        <td>
                                            <h6>
                                                <?= $b['nama_lengkap'] ?>,<?= $b['gelar'] ?>
                                            </h6>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="card shadow mb-4">
                <h4 class="pl-3 pt-4 text-gray-800">Online Class</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if ($buku_online) : ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Link Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1;
                                    foreach ($buku_online as $b) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++ ?></td>
                                            <td>Senin</td>
                                            <td>07.15</td>
                                            <td>
                                                <h6>
                                                    <?= $b['nama_matpel'] ?>
                                                </h6>
                                            </td>
                                            <td>
                                                <h6>
                                                    <?= $b['nama_lengkap'] ?>,<?= $b['gelar'] ?>
                                                </h6>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= $b['link_kelas'] ?>">
                                                    <i class="fas fa-video" style="font-size: 20px;color: #3992E4;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">No result</h5>
                                        </div>
                                    </div>
                                <?php endif ?>

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

        </div>