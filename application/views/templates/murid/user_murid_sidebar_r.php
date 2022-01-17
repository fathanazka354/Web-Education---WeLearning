 <!-- Side-bar Kanan -->
 <div class="col-md-3  border-left pl-4">
     <!-- Online User -->
     <div class="row mb-3">
         <div>
             <h5 class="font-weight-bold text-dark">Online Users</h5>
             <!-- -->
             <div class="mb-2"><?= $jml_user_login ?> Online users</div>

             <table class="table table-borderless">
                 <tbody>
                     <?php foreach ($murid as $l) : ?>
                         <tr>
                             <td>
                                 <div class="circle-row d-flex justify-content-center align-item-center" style="width: 30px; height:30px; background-color:tomato; border-radius:50%;">
                                     <div class="circle text-light"><?= substr($l['username'], 0, 1) ?></div>
                                 </div>
                             </td>
                             <td>
                                 <div class="div d-flex justify-content-start align-item-center" style="font-size: 16px; text-align:start;">
                                     <?= $l['nama_lengkap'] ?>
                                 </div>
                             </td>
                             <td>
                                 <?php if ($l['is_active'] == 1) : ?>
                                     <div class="color" style="font-size: 12px;color: #179814;">
                                         <i class="fas fa-fw fa-circle"></i>
                                     <?php else : ?>
                                         <i class="fas fa-fw fa-mobile-alt"></i>
                                     <?php endif; ?>
                                     </div>
                             </td>
                         </tr>

                     <?php endforeach; ?>
                 </tbody>
             </table>
             <div class="row my-2" style="color: black;">
                 <div class="col-sm-1">

                 </div>
                 <div class="col-sm-8 mt-1"></div>
                 <div class="col-sm-2 mt-2" style="font-size: 12px;color: #179814;">


                     <!-- <div class="row my-2" style="color: black;">
                            <div class="col-sm-1">
                                <div class="circle2">FN</div>
                            </div>
                            <div class="col-sm-8 ml-4 mt-1">Fadillah Nur Istiqomah</div>
                            <div class="col-sm-2 mt-2" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                        </div>
                        <div class="row my-2" style="color: black;">
                            <div class="col-sm-1">
                                <div class="circle3">S</div>
                            </div>
                            <div class="col-sm-8 ml-4 mt-1">Siti Suharyanti</div>
                            <div class="col-sm-2 mt-2" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                        </div>
                        <div class="row my-2" style="color: black;">
                            <div class="col-sm-1">
                                <div class="circle4">Y</div>
                            </div>
                            <div class="col-sm-8 ml-4 mt-1">Yunita Nurisfa Maya S</div>
                            <div class="col-sm-2 mt-2" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                        </div> -->
                     <!-- Button trigger modal -->
                     <!-- <button type="button" class="btn btn-link text-gray-600 px-4" data-toggle="modal" data-target="#exampleModal" style="border: none;">
                            Other Users (12 Users)
                        </button> -->
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <!-- Scrollable modal -->
                         <div class="modal-dialog modal-dialog-scrollable">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Online Users</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle1">F</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Fathan Azka Pradana</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;">
                                             <?php if ($this->session->userdata()) : ?>
                                                 <i class="fas fa-fw fa-circle"></i>
                                             <?php else : ?>
                                                 <i class="fas fa-fw fa-mobile-alt"></i>
                                             <?php endif; ?>
                                         </div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle2">FN</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Fadillah Nur Istiqomah</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle3">S</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Siti Suharyanti</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle4">Y</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Yunita Nurisfa Maya S</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle5">J</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Jamal Rosid</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle6">W</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Wahyu Sudoro Murti</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle7">FK</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Fathurohman Khairid Fauzan</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle8">A</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Alvita Bonita</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle9">AP</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Agis Putri Suryadi</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle10">M</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Mahatamtama Arya Farabi</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle1">SD</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Shullun Dwisiwi Palaguna</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle2">A</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Andre</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle3">I</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Ikhsan Nur Ramadhan</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle4">FS</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Filla Setyana Junior</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle5">MF</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Muhammad Farhan Juna</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                     <div class="row my-2" style="color: black;">
                                         <div class="col-sm-1">
                                             <div class="circle6">MN</div>
                                         </div>
                                         <div class="col-sm-9 ml-2 mt-1">Muhammad Nur Rifqi A</div>
                                         <div class="col-sm-1 mt-2 ml-3" style="font-size: 12px;color: #179814;"><i class="fas fa-circle"></i></div>
                                     </div>
                                 </div>
                                 <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div> -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Calendar -->
             <div class="row my-4">
                 <div class="col" style="width: 350px;">
                     <h5 class="font-weight-bold text-dark">Calendar</h5>
                     <div class="calendar mt-3">
                         <div class="header">
                             <a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
                             <div class="text" data-render="month-year"></div>
                             <a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
                         </div>
                         <div class="months" data-flow="left">
                             <div class="month month-a">
                                 <div class="render render-a"></div>
                             </div>
                             <div class="month month-b">
                                 <div class="render render-b"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Upcoming Events
                    <div class="row my-4">

                        <div class="col-sm-10">
                            <h5 class="font-weight-bold text-dark mb-3">Upcoming Events</h5>
                            <div class="row my-2">
                                <div class="card border-left-warna-1 ml-3 mr-4">
                                    <div class="card-body">
                                        <div class="row my-2" style="color: #90e0ef;">
                                            <div class="col-1">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="col-10">Sat, 25 Dec | 23.59</div>
                                        </div>
                                        Tugas Listrik Statis (Fisika 12 IPA 7)
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="card border-left-warna-2 ml-3 mr-4">
                                    <div class="card-body">
                                        <div class="row my-2" style="color: #ffdd00;">
                                            <div class="col-1">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="col-10">Sat, 25 Dec | 23.59</div>
                                        </div>
                                        Tugas Materi Genetik (Biologi 12 IPA 7)
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="card border-left-warna-3 ml-3 mr-4">
                                    <div class="card-body">
                                        <div class="row my-2" style="color: #e0aaff;">
                                            <div class="col-1">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="col-10">Sat, 25 Dec | 23.59</div>
                                        </div>
                                        Tugas Menggambar (Seni Budaya 12 IPA 7)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
         </div>
     </div>
 </div>