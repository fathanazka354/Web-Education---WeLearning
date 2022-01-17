<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Task -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Task</h1>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('murid/task_detail/') . $task['id_matpel'] ?>"><?= $prev ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $curr ?></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body mt-3 mb-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-1">
                            <i class="fas fa-clipboard-list text-white text-center rounded-circle" style="font-size: 23px;background-color: #3992E4;width: 45px;height: 45px;padding-top: 11px;"></i>
                        </div>
                        <div class="col-11">
                            <div class="ml-3">
                                <h5 class="font-weight-bold mt-2 mb-3" style="color: black;"> <?= $task['judul'] ?></h5>
                                <div> <?= $task['nama_lengkap'] ?>, <?= $task['gelar'] ?> <sup class="mx-2"><i class="fas fa-circle" style="font-size: 5px;"></i></sup> <?= date('Y-M-d', $task['created_at']) ?></div>
                                <div class="my-3" style="color: black;">
                                    <div class="row">
                                        <div class="col-6">100 Points</div>
                                        <div class="col-6">
                                            <div class="float-right">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="background-color: #3992E4;">
                                <div>
                                    <p>
                                        <?= $task['isi'] ?>
                                    </p>
                                </div>
                                <hr style="background-color: #3992E4;">
                                <div class="mt-4">
                                    <i class="fas fa-user" style="color: black;font-size: 20px;"></i>
                                    <span class="ml-2" style="color: black;">Comments</span>
                                    <div class="mt-3">
                                        <a href="<?= base_url('murid/add_comment/') . $task['id_post'] ?>" class="bg-transparent font-weight-bold border-0 p-0" style="color: #3992E4;">Add a Comments</a>
                                    </div>
                                    <!-- <div class="row my-3 hide" style="color: black;">
                                        <div class="col-sm-1">
                                            <div class="circle1">F</div>
                                        </div>
                                        <div class="col-sm-11">
                                            <input type="komentar" class="form-control bg-light border-dark" placeholder="Ketik Comment..." id="InputKomentar" aria-describedby="komenHelp">
                                            <a href="#">
                                                <i class="send_icon far fa-paper-plane fa-lg float-right pr-3"></i>
                                            </a>
                                        </div>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <?= form_error('file') ?>
                    <div class="card m-2">
                        <div class="card-body m-3">
                            <div class="row">
                                <?php if ($score) : ?>
                                    <div class="col-6" style="font-size: 18px;color: black;"><?= $score['score'] ?>/100</div>
                                <?php else : ?>
                                    <div class="col-6" style="font-size: 18px;color: black;">-/100</div>
                                <?php endif ?>
                                <div class="col-6">
                                    <?php if ($file) : ?>
                                        <div class="float-right font-weight-bold text-success">Turned In</div>
                                    <?php else : ?>
                                        <div class="float-right font-weight-bold text-success"></div>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="mt-3 mb-2">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <?php if ($file) : ?>
                                            <?= form_open_multipart($id ? base_url('murid/deleteTugas/' . $id_post . '/' . $id_matpel . '/' . $id['id_post']) : base_url('murid/addTugas/' . $id_post . '/' . $id_matpel)) ?>
                                            <!-- <iframe src="<?= base_url('assets/file/' . $id['nama_file']) ?>" frameborder="0" height="150px" width="100%"></iframe> -->
                                            File berhasil diupload
                                        <?php else : ?>
                                            <?= form_open_multipart($id ? base_url('murid/deleteTugas/' . $id_post . '/' . $id_matpel) : base_url('murid/addTugas/' . $id_post . '/' . $id_matpel)) ?>
                                            <div class="card text-center" style="width: 100%;">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file" id="file">
                                                        <label class="custom-file-label" for="file" style="padding-left: -30px;">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <?php if ($file) : ?>
                                    <button type="submit" class="btn w-100 font-weight-bold text-center" style="background-color: red;color: white;">Cancel</button>
                                <?php else : ?>
                                    <button type="submit" class="btn w-100 font-weight-bold text-center" style="background-color: #3992E4;color: white;">Submit</button>
                                <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mb-3 ml-1"> -->
                    <!-- <div class="card m-2 mt-4">
                        <div class="card-body mx-3">
                          <i class="fas fa-user" style="color: black;font-size: 20px;"></i>
                          <span class="ml-3" style="color: black;">Comments</span>
                          <div class="text-center mt-1">
                            <button type="button" class="bg-transparent font-weight-bold border-0" style="color: #3992E4;">Add Comments</button>
                          </div>
                        </div>
                      </div> -->
                    <!-- </div> -->
                    <div class="row mb-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>