 <!-- Begin Page Content -->
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-9" style="padding-right: 40px">
             <!-- Choose Lesson -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Choose Lesson</h1>
             </div>

             <!-- Content Row 1 -->
             <div class="row">
                 <!-- Lesson 14 -->
                 <?php foreach ($lessons as $l) : ?>
                     <div class="col-xl-4 col-md-7 mb-4">
                         <a href="<?= base_url('guru/detail_lesson/') . $l['id_kelas'] ?>" class="text-decoration-none">
                             <div class="card shadow h-100 pb-2">
                                 <div class="card-header py-3 text-light" style="height: 135px;background-color: <?= $l['color'] ?>">
                                     <div class="h6 font-weight-bold"><?= $l['nama_matpel'] ?></div>
                                     <p class="mt-2"><?= $l['kelas'] ?></p>
                                 </div>
                                 <div class="card-body" style="height: 100px;">
                                     <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">

                                 </div>
                             </div>
                         </a>
                     </div>
                 <?php endforeach ?>


                 <!-- Lesson 2
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #00b4d8;">
                                 <div class="h6 mb-0 font-weight-bold">Biologi 10 IPA 2</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 3
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #e76f51">
                                 <div class="h6 mb-0 font-weight-bold">Biologi 10 IPA 3</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 5
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #dda15e">
                                 <div class="h6 font-weight-bold">Biologi 10 IPA 4</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 7
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #8e9aaf">
                                 <div class="h6 font-weight-bold">Biologi 11 IPA 3</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 8
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #ff595e">
                                 <div class="h6 font-weight-bold">Biologi 11 IPA 5</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 9
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #9c89b8">
                                 <div class="h6 font-weight-bold">Biologi 11 IPA 6</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 10
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #489fb5">
                                 <div class="h6 font-weight-bold">Biologi 12 IPA 4</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 11
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #5e548e">
                                 <div class="h6 font-weight-bold">Biologi 12 IPA 5</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 12
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #d88c9a">
                                 <div class="h6 font-weight-bold">Biologi 12 IPA 6</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div>

                 Lesson 13
                 <div class="col-xl-4 col-md-7 mb-4">
                     <a href="#" class="text-decoration-none">
                         <div class="card shadow h-100 pb-2">
                             <div class="card-header py-3 text-light" style="height: 135px;background-color: #d8a48f">
                                 <div class="h6 font-weight-bold">Biologi 12 IPA 7</div>
                                 <p class="mt-2">Irawati, S.Pd</p>
                             </div>
                             <div class="card-body" style="height: 100px;">
                                 <img class="rounded-circle float-right" src="https://png.pngtree.com/png-vector/20190225/ourlarge/pngtree-vector-avatar-icon-png-image_702436.jpg" alt="" style="width: 60px;height: 60px;margin-top: -50px;">
                                 <div class="progress" style="margin-top: 30px;height: 8px;">
                                     <div class="progress-bar " role="progressbar" style="width: 50%;background-color: #3992E4;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <div class="my-2 text-dark" style="font-size: 13px;">50% Complete</div>
                             </div>
                         </div>
                     </a>
                 </div> -->
             </div>
         </div>