<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="padding-right: 40px">
            <!-- choose lesson -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Students Score</h1>
            </div>

            <!-- Online Class -->
            <div class="card shadow mb-4">
                <div class="card-body">

                    <form action="<?= base_url('guru/score') ?>" method="POST">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" autocomplete="off" autofocus placeholder="Search mahasiswa" aria-describedby="button-addon2" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($score)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Data Not Found
                                    </div>
                                <?php else : ?>
                                    <?php foreach ($score as $s) : ?>
                                        <tr>
                                            <td class="text-center"><?= ++$start ?></td>
                                            <td><?= $s['nama_lengkap'] ?></td>
                                            <td><?= $s['buku'] ?></td>
                                            <td><?= $s['kelas'] ?></td>
                                            <td><?= $s['score'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>