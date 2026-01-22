<nav class="navbar-vertical navbar bg-dark navbar-expand-lg">
    <div class="nav-scroller">
        <!-- Brand -->
        <a class="navbar-brand text-white fw-bold px-4 py-3" href="{{ url('dashboard') }}">
           Konveksi Cloteh
        </a>

        <!-- Navbar -->
        <ul class="navbar-nav flex-column" id="sideNavbar">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}"
                   href="{{ url('/dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>

            <!-- Section -->
            <li class="nav-item mt-4 px-3">
                <span class="nav-label text-muted text-uppercase fs-6">
                    Layouts & Pages
                </span>
            </li>

            <!-- Pages -->
            <li class="nav-item">
                <a class="nav-link text-white"
                   data-bs-toggle="collapse"
                   href="#pagesMenu"
                   role="button"
                   aria-expanded="false"
                   aria-controls="pagesMenu">
                    <i class="bi bi-files me-2"></i>
                    Karyawan
                    <span class="ms-auto">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </a>

                <div class="collapse" id="pagesMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white-50" href="/manajemen">
                                Manajemen Karyawan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white-50" href="/pendapatan">
                                Total Pendapatan
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Components -->
            <li class="nav-item">
                <a class="nav-link text-white"
                   data-bs-toggle="collapse"
                   href="#componentsMenu"
                   role="button">
                    <i class="bi bi-box-seam me-2"></i>
                    Barang
                    <span class="ms-auto">
                        <i class="bi bi-chevron-down"></i>
                    </span>
                </a>

                <div class="collapse" id="componentsMenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white-50" href="/barang">
                                Ketersediaan Barang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white-50" href="/produk">
                                Ketersediaan Produk
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Divider -->
            <li class="nav-item my-4">
                <hr class="border-secondary">
            </li>

            <!-- Logout -->
            <li class="nav-item px-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        onclick="return confirm('Yakin ingin logout?')"
                        class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </button>
                </form>
            </li>

        </ul>
    </div>
</nav>
<style>


    .navbar-vertical {
    width: 260px;
    min-height: 100vh;
    position: fixed;
}

#page-content {
    margin-left: 260px;
}

.nav-link.active {
    background-color: rgba(255, 255, 255, 0.15);
    border-radius: 0.375rem;
}

</style>
