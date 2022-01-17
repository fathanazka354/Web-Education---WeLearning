<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 40px">
            <!-- Choose Lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Choose Lesson</h1>
            </div>

            <!-- Content Row 1 -->
            <div class="row">
                <!-- Lesson 14 -->
                <?php foreach ($buku as $b) : ?>
                    <div class="col-xl-4 col-md-7 mb-4 ">
                        <a href="<?= base_url('murid/detailLesson/') . $b['id_lesson_murid'] ?>" class="text-decoration-none">
                            <div class="card shadow h-100 pb-2">
                                <div class="card-header py-3 text-light" style="height: 135px;background-color: <?= $b['color'] ?>">
                                    <div class="h6 font-weight-bold"><?= $b['nama_matpel'] ?> <?= $b['kelas'] ?></div>
                                    <p class="mt-2"><?= $b['nama_lengkap'] ?>, <?= $b['gelar'] ?></p>
                                </div>
                                <div class="card-body" style="height: 100px;">
                                    <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>