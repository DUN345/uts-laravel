<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="../posts" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                </>Data Mahasiswa</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <a href="/coba"> <!-- Ganti 'link_ke_profil.html' dengan URL halaman profil yang sesuai -->
                    <img class="rounded-circle" src="../template/dashmin/assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                </a>
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="ms-8">{{ Auth::user()->name }}</h6>

            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/dashboard" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="/posts" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Data Mahasiswa</a>
        </div>
        <!-- <div class="navbar-nav w-100">
            <a href="/produc" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Produk</a>

        </div> -->
    </nav>
</div>
<!-- Sidebar End -->