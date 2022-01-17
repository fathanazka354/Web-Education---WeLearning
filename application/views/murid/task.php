<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 40px">

            <div class="row">
                <?php foreach ($task as $t) : ?>
                    <div class="col">
                        <div class="card bg-dark text-white">
                            <img src="<?= base_url('assets/img/') . $t['image'] . '.jfif' ?>" width="100%" height="200px" class="card-img" alt="...">
                            <div class="card-img-overlay" style="color: black;">
                                <h5 class="card-title font-weight-bold"><?= $t['nama_matpel'] ?> </h5>
                                <p class="card-text"><?= $t['nama_lengkap'] ?>, <?= $t['gelar'] ?></p>
                                <p class="card-text"><?= $t['kelas'] ?></p>
                                <a href="<?= base_url('murid/task_detail/') . $t['id_matpel'] ?>">See detail >></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>