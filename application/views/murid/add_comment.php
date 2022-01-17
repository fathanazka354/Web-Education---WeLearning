<div class="container-fluid">
    <!-- <h1>Edit data</h1> -->
    <?= $this->session->flashdata('message_err'); ?>

    <?= form_open(base_url('murid/insertComment/' . $id)) ?>

    <input type="hidden" name="id" id="id" value="<?= $id ?>">
    <input type="hidden" name="id_user" id="id_user" value="<?= $id_user ?>">

    <div class="form-group">
        <label for="comment">Add Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
    </form>
    <?php foreach ($comment_guru as $c) : ?>
        <div class="card mt-2">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-1">
                            <div class="ml-4 circle5"><?= substr($c['nama_lengkap'], 0, 1) ?></div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <?= $c['nama_lengkap'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ml-5 mt-3">
                            <?= $c['isi'] ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    <?php endforeach ?>
    <?php foreach ($comment as $c) : ?>
        <div class="card mt-2">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-1">
                            <div class="ml-4 circle5"><?= substr($c['nama_lengkap'], 0, 1) ?></div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <?= $c['nama_lengkap'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ml-5 mt-3">
                            <?= $c['isi'] ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    <?php endforeach ?>
</div>