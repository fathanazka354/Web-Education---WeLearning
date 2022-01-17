<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 10px">
            <!-- Choose Lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Recently Lesson</h1>
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

            <!-- To-do Assignment -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">To-do Assignment</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Completed -->
                <div class=" col-md-4 mb-4">
                    <div class="card bg-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-8 mr-3">
                                    <div class="h4 mb-2 font-weight-bold text-light"><?= $todo_completed ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-circle text-light fa-2x my-2 float-end"></i>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="font-weight-bold text-light mb-1">Completed</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- In Progress -->
                <div class=" col-md-4 mb-4">
                    <div class="card bg-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-8 mr-3">
                                    <div class="h4 mb-2 font-weight-bold text-light"><?= $todo_inprogress ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-redo text-warning bg-light p-2 rounded-circle" style="font-size: 18px;"></i>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="font-weight-bold text-light mb-1">In Progress</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Missing -->
                <div class=" col-md-4 mb-4">
                    <div class="card bg-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-8 mr-3">
                                    <div class="h4 mb-2 font-weight-bold text-light">
                                        <?php if ($todo_missing < 1) : ?>
                                            0
                                        <?php else : ?>
                                            <?= $todo_missing ?>
                                        <?php endif ?>
                                    </div>
                                    <!-- <div class="font-weight-bold text-info mb-1">Missing</div> -->
                                </div>
                                <div class="col-auto ">
                                    <i class="fas fa-times-circle text-light fa-2x"></i>
                                </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="font-weight-bold text-light mb-1">Missing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- History -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">History</h1>
            </div> -->


            <!-- Content Row -->
            <!-- <div class="row"> -->
            <!-- History 1 -->
            <!-- <div class="col-xl-4 col-md-7 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 px-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center mb-2">
                                <div class="col-1">
                                    <i class="fas fa-info-circle" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11 pl-3">
                                    <div class="font-weight-bold text-dark">Biologi</div>
                                </div>
                            </div>
                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-2" style="width: 55px; font-size: 12px;">Bab 1</p>
                            <div class="text-dark">Pertumbuhan dan Perkembangan</div>
                        </div>
                    </div>
                </div> -->

            <!-- History 2 -->
            <!-- <div class="col-xl-4 col-md-7 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 px-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center mb-2">
                                <div class="col-1">
                                    <i class="fas fa-info-circle" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11 pl-3">
                                    <div class="font-weight-bold text-dark">Fisika</div>
                                </div>
                            </div>
                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-2" style="width: 55px; font-size: 12px;">Bab 4</p>
                            <div class="text-dark">Induksi Elektromagnetik</div>
                        </div>
                    </div>
                </div> -->

            <!-- History 3 -->
            <!-- <div class="col-xl-4 col-md-7 mb-4">
                    <div class="card border-left-info shadow h-100 py-2 px-1">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center mb-2">
                                <div class="col-1">
                                    <i class="fas fa-info-circle" style="font-size: 25px;"></i>
                                </div>
                                <div class="col-11 pl-3">
                                    <div class="font-weight-bold text-dark">Matematika Wajib</div>
                                </div>
                            </div>
                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-2" style="width: 55px; font-size: 12px;">Bab 3</p>
                            <div class="text-dark">Integral Tentu</div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Upcoming Events -->
            <div class="row my-4">

                <h1 class="h3 mb-4 text-gray-800 ">Upcoming Events</h1>
                <div class="row">
                    <div class="col-4 ">
                        <div class="card border-left-warna-1 ml-3 mr-4">
                            <div class="card-body">
                                <div class="row my-2" style="color: #90e0ef;">
                                    <div class="col-1">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-10">Sat, 25 Dec | 23.59</div>
                                </div>
                                Tugas Listrik Statis (Fisika 12 IPA 7)
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div class="card border-left-warna-2 ml-3 mr-4">
                            <div class="card-body">
                                <div class="row my-2" style="color: #ffdd00;">
                                    <div class="col-1">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-10">Sat, 25 Dec | 23.59</div>
                                </div>
                                Tugas Materi Genetik (Biologi 12 IPA 7)
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div class="card border-left-warna-3 ml-3 mr-4">
                            <div class="card-body">
                                <div class="row my-2" style="color: #e0aaff;">
                                    <div class="col-1">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="col-10">Sat, 25 Dec | 23.59</div>
                                </div>
                                Tugas Menggambar (Seni Budaya 12 IPA 7)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>