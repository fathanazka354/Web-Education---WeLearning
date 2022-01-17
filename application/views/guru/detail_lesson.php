<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 20px">
            <!-- Choose Lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h4 mb-0" style="color: black;">XII IPA 7 - Biologi</h1>
            </div>

            <!-- Begin Detail Lesson -->
            <div class="mt-3">
                <!-- Announcement -->
                <a href="#">
                    <h4 class="card text-center" style="padding: 15px; background-color: rgb(223, 240, 252);"><b>Announcement</b></h4>
                </a>
                <a href="Dashboard.html">
                    <i class="fas fa-edit fa-xs float-right mt-1" style="color: gray; margin-right: 20px; font-size: 15px;">Edit</i>
                </a>
                <div class="card" style="display: block; padding: 15px;">
                    <p style="font-size: 14px; color: black;" class="mb-2">Join Grup WA</p>
                    <a href="#">https://chat.whatsapp.com/GUkHAhbKO1cEoxk9Pb9cGg</a>
                </div>

                <!-- Pertemuan 1 -->
                <?php $i = 1;
                foreach ($detail_lesson as $d) : ?>
                    <a href="#">
                        <h4 class="card text-center mt-2" style="padding: 15px; background-color: rgb(223, 240, 252);"><b>Pertemuan <?= $i++ ?></b></h4>
                    </a>
                    <div class="card mt-2" style="display: block; padding: 20px;">
                        <a href="#" data-toggle="modal" data-target="#exampleModal<?= $d['id_pertemuan'] ?><?= $d['id_buku'] ?>">
                            <i class="fas fa-edit fa-xs float-right mt-1" style="color: gray; margin-right: 20px; font-size: 15px;">Edit</i>
                        </a>
                        <p style="font-size: 14px; color: black;" class="mb-3"><?= $d['buku'] ?></p>
                        <p style="font-size: 14px; color: black;" class="mb-3">Video</p>
                        <a href="<?= $d['link'] ?>"><?= $d['link'] ?></a>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- End Detail Lesson -->
        </div>

        <!-- Modal -->
        <?php foreach ($detail_lesson as $d) : ?>
            <div class="modal fade" id="exampleModal<?= $d['id_pertemuan'] ?><?= $d['id_buku'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Pertemuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('guru/update_pertemuan/') . $d['id_kelas'] ?>" method="POST">
                                <input type="hidden" value="<?= $d['id_pertemuan'] ?>" name="id1">
                                <input type="hidden" value="<?= $d['id_buku'] ?>" name="id2">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Materi</label>
                                        <input type="text" class="form-control" value="<?= $d['buku'] ?>" name="materi" id="materi">
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Link</label>
                                        <textarea class="form-control" id="link" name="link" rows="3"><?= $d['link'] ?></textarea>
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
            </div>
        <?php endforeach ?>