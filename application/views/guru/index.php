<div class="row">
    <div class="col-md-9" style="padding-right: 40px">
        <!-- Info -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Info</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-4 mb-4">
                <div class="card bg-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 font-weight-bold text-light mb-2">Jumlah Siswa</div>
                                <div class="h4 font-weight-bold text-light my-2"><?= $murid ?></div>
                                <div class="text-light">detail <i class="fas fa-angle-double-right ml-2"></i></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-graduate text-gray-300 my-1" style="font-size: 65px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-xl-3 col-4 mb-4">
                <div class="card bg-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center my-2">
                            <div class="col-8 mr-3">
                                <div class="h4 mb-2 font-weight-bold text-light">3 </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle text-light fa-2x my-2"></i>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="font-weight-bold text-light mb-1">Completed</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="col-xl-3 col-4 mb-4">
                <div class="card bg-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center my-2">
                            <div class="col-8 mr-3">
                                <div class="h4 mb-2 font-weight-bold text-light">4 </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-redo text-warning bg-light p-2 rounded-circle my-2" style="font-size: 18px;"></i>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="font-weight-bold text-light mb-1">In Progress</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Task For Today -->
        <div class="row mt-2">
            <div class="col-sm-5">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Task For Today</h1>
                </div>

                <!-- Task 1 -->
                <div class="row ml-1 my-3">
                    <div class="card border-left-warna-4 shadow h-100 py-2 px-1" style="width: 330px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="row no-gutters align-items-center mb-2">
                                        <div class="col-1">
                                            <i class="fas fa-info-circle" style="font-size: 25px"></i>
                                        </div>
                                        <div class="col-11 pl-3">
                                            <div class="font-weight-bold text-dark">Biologi</div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-3 text-center" style="width: 60px; font-size: 12px">Bab 3</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-3 text-center" style="width: 60px; font-size: 12px">23.59</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="bg-gray-300 kelas-tguru text-dark font-weight-bold" style="margin-left: -5px;">12 IPA 4</div>
                                </div>
                            </div>
                            <div class="text-dark">Materi Genetik</div>
                        </div>
                    </div>
                </div>

                <!-- Task 1 -->
                <div class="row ml-1 my-3">
                    <div class="card border-left-warna-4 shadow h-100 py-2 px-1" style="width: 330px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="row no-gutters align-items-center mb-2">
                                        <div class="col-1">
                                            <i class="fas fa-info-circle" style="font-size: 25px"></i>
                                        </div>
                                        <div class="col-11 pl-3">
                                            <div class="font-weight-bold text-dark">Biologi Lintas Minat</div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-3 text-center" style="width: 60px; font-size: 12px">Bab 3</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-3 text-center" style="width: 60px; font-size: 12px">12.00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="bg-gray-300 kelas-tguru text-dark font-weight-bold mr-2" style="margin-left: -5px;">10 IPS 1</div>
                                </div>
                            </div>
                            <div class="text-dark">Virus</div>
                        </div>
                    </div>
                </div>

                <!-- Task 1 -->
                <div class="row ml-1 my-3">
                    <div class="card border-left-warna-4 shadow h-100 py-2 px-1" style="width: 330px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="row no-gutters align-items-center mb-2">
                                        <div class="col-1">
                                            <i class="fas fa-info-circle" style="font-size: 25px"></i>
                                        </div>
                                        <div class="col-11 pl-3">
                                            <div class="font-weight-bold text-dark">Biologi</div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-3 text-center" style="width: 60px; font-size: 12px">Bab 2</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="bg-light p-2 rounded-pill text-dark font-weight-bold mb-3 text-center" style="width: 60px; font-size: 12px">23.59</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="bg-gray-300 kelas-tguru text-dark font-weight-bold" style="margin-left: -5px;">11 IPA 3</div>
                                </div>
                            </div>
                            <div class="text-dark">Struktur dan Fungsi Jaringan Tumbuhan</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-7">
                <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="h3 mb-0 text-gray-800">My Notes</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="float-right">
                            <button type="button" class="btn btn-transparent" style="color: #3992e4;border: #3992e4 solid 2px;" data-toggle="modal" data-target="#exampleModal">+ Add Notes</button>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <div class="card shadow">
                        <div class="card-body see-all">
                            <?php foreach ($notes as $n) : ?>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <i class="far fa-file note-guru"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <div class="ml-3">
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="font-weight-bold my-1 text-dark"><?= $n['nama_notes'] ?></div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="btn-group dropleft">
                                                        <button type="button" class="btn-link bg-transparent text-dark" data-toggle="dropdown" aria-expanded="false" style="border: none">
                                                            <div class="float-right">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#updateModal<?= $n['id_notes_guru'] ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?= base_url('guru/hapus_notes/') . $n['id_notes_guru'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="my-2"><?= $n['isi_notes'] ?></p>
                                            <div class="font-weight-bold" style="font-size: 14px;"><?= date('Y-m-d') ?></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach ?>
                            <div class="row">
                                <div class="col-sm-1">
                                    <i class="far fa-file note-guru"></i>
                                </div>
                                <div class="col-sm-11">
                                    <div class="ml-3">
                                        <div class="row">
                                            <div class="col-11">
                                                <div class="font-weight-bold my-1 text-dark">Mengoreksi Tugas Siswa</div>
                                            </div>
                                            <div class="col-1">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn-link bg-transparent text-dark" data-toggle="dropdown" aria-expanded="false" style="border: none">
                                                        <div class="float-right">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="my-2">Mengoreksi tugas biologi kelas 12 IPA 7</p>
                                        <div class="font-weight-bold" style="font-size: 14px;">13 Jan 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="see-all-text">
                                <hr>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <i class="far fa-file note-guru"></i>
                                    </div>
                                    <div class="col-sm-11">
                                        <div class="ml-3">
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="font-weight-bold my-1 text-dark">Membuat Soal Ulangan</div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="btn-group dropleft">
                                                        <button type="button" class="btn-link bg-transparent text-dark" data-toggle="dropdown" aria-expanded="false" style="border: none">
                                                            <div class="float-right">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </div>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="my-2">Membuat soal ulangan Bab 2 struktur dan fungsi jaringan tumbuhan untuk kelas 11 IPA 3</p>
                                            <div class="font-weight-bold" style="font-size: 14px;">13 Jan 2022</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right text-dark mt-3 mb-2 see-all-button" style="cursor: pointer;">View All Notes</div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('guru/add_notes') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul">
                        </div>
                        <div class="form-group">
                            <label for="isi">Notes</label>
                            <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <?php foreach ($notes as $n) : ?>
        <div class="modal fade" id="updateModal<?= $n['id_notes_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Notes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('guru/update_notes') ?>" method="POST">
                        <input type="hidden" value="<?= $n['id_notes_guru'] ?>" name="id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Judul</label>
                                <input type="text" class="form-control" value="<?= $n['nama_notes'] ?>" name="judul" id="judul">
                            </div>
                            <div class="form-group">
                                <label for="isi">Notes</label>
                                <textarea class="form-control" placeholder="" id="isi" name="isi" rows="3"><?= $n['isi_notes'] ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>