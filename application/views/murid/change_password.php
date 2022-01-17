<div class="container">
    <h1>Edit data</h1>
    <?= $this->session->flashdata('message_err'); ?>

    <?= form_open_multipart('murid/updateProfile') ?>

    <input type="hidden" name="id" id="id" value="<?= $profile['id_user'] ?>">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" name="negara" id="exampleFormControlSelect1">
            <?php foreach ($negara as $n) : ?>
                <?php if ($n == $jml_negara['negara']) : ?>
                    <option value="<?= $n['negara'] ?>" selected><?= $n['negara'] ?></option>
                <?php else : ?>
                    <option value="<?= $n['negara'] ?>"><?= $n['negara'] ?></option>
                <?php endif; ?>
            <?php endforeach;  ?>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="<?= $profile['email'] ?>" disabled>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" value="<?= $profile['username'] ?>">
        <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Current Password</label>
        <input type="password" name="current_password" class="form-control" id="password">
        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" name="password2" class="form-control" id="password2">
        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Confirm Password</label>
        <input type="password" name="password3" class="form-control" id="password3">
        <?= form_error('password3', '<small class="text-danger pl-3">', '</small>') ?>
    </div>

    <div class="input-group mb-3 mt-5">
        <div class="row">
            <div class="col">
                <img src="<?= base_url('assets/img/') . $profile['image'] ?>" class="img-thumbnail" alt="">
            </div>
            <div class="col">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>
        </div>
    </div>

    <a href="<?= base_url('murid/profile') ?>" class="btn btn-secondary" data-dismiss="modal">Close</a>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>