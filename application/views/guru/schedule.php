 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-9" style="padding-right: 40px">
             <!-- choose lesson -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Schedules</h1>
             </div>

             <!-- Online Class -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Online Class</h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="" width="100%" cellspacing="0">
                             <thead class="text-center">
                                 <tr class="">
                                     <th>No</th>
                                     <th>Hari</th>
                                     <th>Jam</th>
                                     <th>Pelajaran</th>
                                     <th>Kelas</th>
                                     <th>Link Kelas</th>
                                     <!-- <th>Action</th> -->
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1;
                                    foreach ($jadwal_online as $j) : ?>
                                     <tr>
                                         <td class="text-center"><?= $i++ ?></td>
                                         <td><?= $j['hari'] ?></td>
                                         <td><?= $j['jam'] ?></td>
                                         <td><?= $j['nama_matpel'] ?></td>
                                         <td><?= $j['kelas'] ?></td>
                                         <td class="text-center">
                                             <a href="<?= $j['link_kelas'] ?>">
                                                 <i class="fas fa-video" style="font-size: 20px;color: #3992E4;"></i>
                                             </a>
                                         </td>
                                         <!-- <td class="text-center">
                                             <i class="fas fa-edit fa-sm mx-2"></i>
                                             <i class="fas fa-trash-alt mx-2"></i>
                                         </td> -->
                                     </tr>
                                 <?php endforeach ?>

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

             <!-- Offline Class -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Offline Class</h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="" width="100%" cellspacing="0">
                             <thead class="text-center">
                                 <tr class="">
                                     <th>No</th>
                                     <th>Hari</th>
                                     <th>Jam</th>
                                     <th>Pelajaran</th>
                                     <th>Kelas</th>
                                     <!-- <th>Action</th> -->
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1;
                                    foreach ($jadwal_online as $j) : ?>
                                     <tr>
                                         <td class="text-center"><?= $i++ ?></td>
                                         <td><?= $j['hari'] ?></td>
                                         <td><?= $j['jam'] ?></td>
                                         <td><?= $j['nama_matpel'] ?></td>
                                         <td><?= $j['kelas'] ?></td>
                                         <!-- <td class="text-center">
                                             <i class="fas fa-edit fa-sm mx-2"></i>
                                             <i class="fas fa-trash-alt mx-2"></i>
                                         </td> -->
                                     </tr>
                                 <?php endforeach ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>