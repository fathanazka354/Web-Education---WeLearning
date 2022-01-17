<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 40px">
            <!-- Choose Lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0">Biologi</h1>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('murid/lesson') ?>">Lesson</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail lesson</li>
                </ol>
            </nav>

            <!-- Begin Detail Lesson -->
            <div class="border border-secondary p-3 mt-3">
                <!-- Announcement -->
                <a href="#">
                    <h4 class="card text-center mt-2" style="padding: 15px; background-color: rgb(223, 240, 252);"><b>Pengumuman</b></h4>
                </a>
                <div class="p-1">
                    <p style="font-size: 14px; color: black;" class="mb-2">
                        <input class="checkbox mt-0 float-right" type="checkbox" value="" aria-label="Checkbox for lesson">
                    </p>
                    <?php if ($pengumuman) : ?>
                        <p style="color: black;"><?= $pengumuman['isi'] ?></p>
                    <?php else : ?>
                        <div class="card">
                            <div class="card-body text-center">
                                Tidak ada pengumumannya lurr
                            </div>
                        </div>
                    <?php endif ?>
                    <hr style="height:1px;border:none;color:rgb(150, 150, 150);background-color:rgb(158, 158, 158);">
                </div>
                <!-- Pertemuan 1 -->

                <!-- Pertemuan 1 -->
                <?php if ($detail_lesson) : ?>
                    <?php $i = 1;
                    foreach ($detail_lesson as $d) : ?>
                        <a href="#">
                            <h4 class="card text-center mt-2" style="padding: 15px; background-color: rgb(223, 240, 252);"><b>Pertemuan <?= $i++ ?></b></h4>
                        </a>
                        <div class="card mt-2" style="display: block; padding: 20px;">

                            <p style="font-size: 14px; color: black;" class="mb-3"><?= $d['buku'] ?></p>
                            <p style="font-size: 14px; color: black;" class="mb-3">Video</p>
                            <a href="<?= $d['link_video'] ?>"><?= $d['link_video'] ?></a>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <a href="#">
                        <h4 class="card text-center mt-2" style="padding: 15px; background-color: rgb(223, 240, 252);"><b>Pertemuan </b></h4>
                    </a>
                    <div class="card">
                        <div class="card-body text-center">
                            Tidak ada pelajarannya lurr
                        </div>
                    </div>
                <?php endif ?>

                <!-- <?php
                        $i = 1;
                        foreach ($detail_lesson as $g) : ?>
                    <div class="row">
                        <div class="col">
                            <h6 style="color: black;"><b>Pertemuan <?= $i++ ?></b></h6>
                        </div>
                    </div>
                    <div class="pl-3">
                        <div class="row">
                            <a href="#" style="font-size: 14px; color: black;" class="mb-2">RPS
                            </a>
                        </div>
                        <div class="row">
                            <a href="#" style="font-size: 14px; color: black;" class="mb-2">Materi <?= $g['buku'] ?>
                            </a>
                        </div>
                        <div class="row">
                            <a href="#" style="font-size: 14px; color: black;" class="mb-2">Video <?= $g['link_belajar'] ?>
                            </a>

                        </div>
                        <hr style="height:1px;border:none;color:rgb(150, 150, 150);background-color:rgb(158, 158, 158);">
                    </div>
                <?php endforeach; ?> -->
            </div>
            <!-- End Detail Lesson -->
        </div>