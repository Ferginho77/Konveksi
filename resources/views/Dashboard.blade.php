<div>
   @extends('layouts.header')

    @section('title', 'Dashboard')

    @section('content')

       <div class="container-fluid mt-n22 px-6">
        {{-- <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                <button type="submit" onclick="return confirm('Ente Yakin Mau Keluar Aplikasi?')" class="nav-link btn btn-link text-light bg-danger p-2" style="text-decoration: none;">Logout <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                </form> --}}
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <!-- Page header -->
              <div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0  text-white">Produk</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card ">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0">Produk</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                      <i class="bi bi-briefcase fs-4"></i>
                       <a href="/manajemen">View More</a>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h1 class="fw-bold">{{ $barang }}</h1>
                    <p class="mb-0"><span class="text-dark me-2"></span>Produk aktif</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card ">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0">Karyawan</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                      <i class="bi bi-list-task fs-4"></i>
                       <a href="/manajemen">View More</a>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h1 class="fw-bold">{{ $karyawan }}</h1>
                    <p class="mb-0"><span class="text-dark me-2"></span>Total karyawan</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card ">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0">Stok</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                      <i class="bi bi-people fs-4"></i>
                       <a href="/manajemen">View More</a>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h1 class="fw-bold">1000</h1>
                    <p class="mb-0"><span class="text-dark me-2"></span>Item Tersedia</p>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
              <!-- card -->
              <div class="card ">
                <!-- card body -->
                <div class="card-body">
                  <!-- heading -->
                  <div class="d-flex justify-content-between align-items-center
                    mb-3">
                    <div>
                      <h4 class="mb-0">Productivity</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                      <i class="bi bi-bullseye fs-4"></i>
                       <a href="/manajemen">View More</a>
                    </div>
                  </div>
                  <!-- project number -->
                  <div>
                    <h1 class="fw-bold">90%</h1>
                    <p class="mb-0"><span class="text-success me-2"></span>Target Produksi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
    @endsection
</div>
