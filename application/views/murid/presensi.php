<div class="container">
    <h1>Presensi</h1>
    <!-- <?= $this->session->flashdata('message_err'); ?> -->

    <form method="POST" action="<?= base_url('murid/tambahPresensi') ?>">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kelas</label>
            <select class="form-control" name="matpel" id="exampleFormControlSelect1">
                <?php foreach ($mata_pelajaran as $m) : ?>
                    <option value="<?= $m['id_matpel'] ?>"><?= $m['nama_matpel'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="password">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nis</label>
            <input type="text" name="nis" class="form-control" id="nis">
            <?= form_error('nis', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <input type="hidden" name="kelas" value="<?= $get_kelas['id_kelas'] ?>">
        <a href="<?= base_url('murid/profile') ?>" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>