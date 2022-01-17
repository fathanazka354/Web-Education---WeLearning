<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #3992e4">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="GuruDashboard.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/') ?>img/logobaruku.png" alt="amikomLogo" href="Dashboard.html" class="mx-auto d-block my-5" width="60px" height="60px" />
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-1">We Learning</div>
    </a>
    <!-- <img src="logobaruku.png" alt="amikomLogo" href="Dashboard.html" class="mx-auto d-block my-5" width="90px" height="90px" /> -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <?php foreach ($menu as $m) : ?>
        <?php if ($m['title'] == $judul) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('' . $m['url']) ?>">
                    <i class="<?= $m['icon'] ?>" style="font-size: 20px"></i>
                    <span style="font-size: 15px"><?= $m['title'] ?></span>
                </a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('' . $m['url']) ?>">
                    <i class="<?= $m['icon'] ?>" style="font-size: 20px"></i>
                    <span style="font-size: 15px"><?= $m['title'] ?></span>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->