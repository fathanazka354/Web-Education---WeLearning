 <!-- Begin Page Content -->
 <div class="container-fluid">
     <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="<?= base_url('murid/task') ?>">Task</a></li>
             <li class="breadcrumb-item active"><?= $prev ?></li>
         </ol>
     </nav>
     <div class="row">
         <div class="col-md-9" style="padding-right: 40px">
             <!-- Choose Lesson -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Task</h1>
             </div>

             <!-- Begin Task -->
             <div class="border border-secondary p-2 mt-3">
                 <!-- 1 -->
                 <?php if (!isset($task)) : ?>
                     <div class="card shadow h-100 pb-2">
                         <div class="card-body d-flex justify-content-center align-item-center">
                             <div class="row ">
                                 <div class="col">
                                     <div class="h6 font-weight-bold">No Lesson result</div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php else : ?>
                     <?php $i = 1;
                        foreach ($task as $t) : ?>

                         <div class="card border-secondary bg-light mb-2 mt-2 ml-1">
                             <div class="row my-2" style="color: black;">
                                 <div class="col-sm-1">
                                     <div style="margin-top: 12px;" class="ml-4 circle5">IR</div>
                                 </div>
                                 <h5 class="col-sm-11 mt-1 pr-5 p-2">
                                     <?= $t['nama_lengkap'] ?>, <?= $t['gelar'] ?><br>
                                 </h5>
                                 <small class="ml-5">Created on <?= date('Y-M-d', $t['created_at']) ?></small>
                                 <p class="card-text" style="padding:22px;"><?= $t['isi'] ?></p>
                             </div>
                             <a href="<?= base_url('murid/post_tugas/') . $t['id_post'] . '/' . $id_matpel ?>" class="text-decoration-none">
                                 <div class="col-12 mt-1">
                                     <div class="card mb-0 mt-1" style="margin-left: 20px; display: block;">
                                         <div class="row my-2" style="color: black;">
                                             <div class="col-md-1">
                                                 <i class="fas fa-tasks fa-lg circle11" style="margin-left: 30px; margin-top: 6px;"></i>
                                             </div>
                                             <div class="col">
                                                 <div class="col-sm-9 ml-1 mt-0" style="font-size: 20px; display: block;">
                                                     Tugas (<?= $i++ ?>)<br>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                             <!-- comments -->
                             <!-- Button trigger modal -->
                             <div class="row mt-2 mb-0" style="color: black;">
                                 <div class="col-sm-1">
                                     <i class="com-icon fas fa-comments fa-lg" style="margin-left: 80px; margin-top: 8px;"></i>
                                 </div>
                                 <a href="<?= base_url('guru/add_comment/') . $t['id_post'] ?>" class="btn btn-link px-2 text-gray-800" style="margin-left: 60px; margin-top: 8px;">
                                     Add a comment
                                 </a>
                             </div>

                         </div>
                     <?php endforeach ?>
                 <?php endif ?>
                 <!-- End Task -->
             </div>
         </div>