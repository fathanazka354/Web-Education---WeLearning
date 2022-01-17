<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- NAMA -->
            <h5 class="mt-3" style="color: black; margin-left: 10px;"><b>Hi, <?= $user['username'] ?>!</b></h5>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- TEACHER -->
                <div class="collapse navbar-collapse mr-2" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="<?= base_url('murid/teacher') ?>">
                            <i class="fas fa-user-tie fa-lg" style="color: #C4C4C4;"></i>
                        </a>
                    </div>
                </div>
                <!-- END TEACHER -->

                <!-- Nav Item - Alerts -->
                <!-- <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-bell fa-lg" style="color: #C4C4C4;"></i> -->
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-danger badge-counter">3+</span>
                    </a> -->
                <!-- Dropdown - Alerts -->
                <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Notification
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-tasks text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">November 13, 2021</div>
                                <span class="font-weight-bold">TUGAS KIMIA is Assigned by Suyanti, S.Pd. </span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-tasks text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">November 7, 2021</div>
                                SOAL LATIHAN VIRUS is Assigned by Irawati, S.Pd.
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">November 2, 2021</div>
                                Joko Haryanto, S.pd. have uploaded MATERI PUISI
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div> -->
                <!-- </li> -->
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span> -->
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/') . $user['image'] ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('murid/profile') ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->