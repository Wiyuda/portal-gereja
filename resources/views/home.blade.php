<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>

  <link rel="stylesheet" href="{{url('./assets/library/bootstrap/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{url('./assets/css/style.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  
  {{-- Header --}}
  <div class="header" id="header">
    <div class="card">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-3 d-md-block d-none">
              <img src="{{ url('./assets/images/logo.png') }}" alt="Logo Gereja">
            </div>
            <div class="col-md-9 col-sm-12 col-12 text-center">
              <h4 class="fw-bold">HURIA KRISTEN BATAK PROTESTAN (HKBP)</h4>
              <h5>BETHEL RESORT PADANG BULAN DISTRIK X-MA</h5>
              <p>Jl. Besar Tj, Selamat No. 168, Deli Serdang</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Header --}}

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand d-md-none d-block" href="{{ route('home') }}">
        <img src="{{ url('./assets/images/logo.png') }}" alt="Logo Gereja" class="w-25">
      </a>
      <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-bold me-4" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold me-4" href="#profil">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold me-4" href="#statistik">Statistik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold me-4" href="#warta">Warta Gereja</a>
          </li>
        </ul>
        <div class="d-flex">
          <a href="{{ route('login') }}" class="btn btn-login btn-primary fw-bold px-3">Login</a>
        </div>
      </div>
    </div>
  </nav>
  {{-- End Navbar --}}

  {{-- Banner --}}
  <div class="banner mt-5 mb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ url('storage/banner/', $banner->image_1) }}" class="d-block w-100 rounded" alt="">
                <div class="carousel-caption d-none d-md-block fw-bold">
                  <h5>{{ $banner->title_1 }}</h5>
                  <p>{{ $banner->deskripsi_1 }}</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ url('storage/banner/', $banner->image_2) }}" class="d-block w-100 rounded" alt="">
                <div class="carousel-caption d-none d-md-block fw-bold">
                  <h5>{{ $banner->title_2 }}</h5>
                  <p>{{ $banner->deskripsi_2 }}</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ url('storage/banner/', $banner->image_3) }}" class="d-block w-100 rounded" alt="">
                <div class="carousel-caption d-none d-md-block fw-bold">
                  <h5>{{ $banner->title_3 }}</h5>
                  <p>{{ $banner->deskripsi_3 }}</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Banner --}}

  {{-- Profil --}}
  <div class="profil mt-5 mb-5" id="profil">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="fw-bold">PROFIL GEREJA</h3>
              <hr>
              <div class="row g-0">
                <div class="col-md-5 col-sm-12 mt-2">
                  <img src="{{ url('storage/profile/', $profile->image) }}" class="img-fluid rounded-start" alt="Gereja">
                </div>
                <div class="col-md-7 col-sm-12 mt-2">
                  <div class="card-body pt-1">
                    <h5 class="card-title text-center fw-bold">{{ $profile->nama }}</h5>
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th>Pendiri </th>
                          <td>{{ $profile->pendiri }}</td>
                        </tr>
                        <tr>
                          <th>Tahun Berdiri </th>
                          <td>{{ $profile->tahun }}</td>
                        </tr>
                        <tr>
                          <th>Alamat </th>
                          <td>Jl. Besar Tj, Selamat No. 168, Deli Serdang</td>
                        </tr>
                        <tr>
                          <th>Pendeta Besar </th>
                          <td>{{ $profile->pendeta_resort }}</td>
                        </tr>
                        <tr>
                          <th>Pendeta Jemaat </th>
                          <td>{{ $profile->pendeta_jemaat }}</td>
                        </tr>
                        <tr>
                          <th>Guru Huria </th>
                          <td>{{ $profile->guru_huria }}</td>
                        </tr>
                        <tr>
                          <th>Sintua </th>
                          <td class="sintua">
                            <ul>
                              @foreach ($sintuas as $s)
                                <li>{{ $s }}</li>
                              @endforeach
                            </ul>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Profil --}}

  {{-- News --}}
  <div class="news mt-5 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="fw-bold">BERITA HARIAN</h3>
              <hr>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="card shadow">
                    <div class="card-body p-0">
                      <img src="{{ url('assets/images/gereja.jpg') }}" alt="Thumbnail" class="rounded card-img-top">
                      <a href="#">
                        <div class="news-title text-center">
                          <h5>Berita Pertama Kami Gereja HKBP Medan Huria Copyrigt With Wiyuda Pratama Mahardika MEdan Sumatera Utara</h5>
                        </div>
                      </a>
                        <div class="news-time">
                          <p>By <span>Admin</span> 07-02-2023, 18.00</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="card shadow">
                    <div class="card-body p-0">
                      <img src="{{ url('assets/images/gereja.jpg') }}" alt="Thumbnail" class="rounded card-img-top">
                      <a href="#">
                        <div class="news-title text-center">
                          <h5>Berita Pertama Kami Gereja HKBP Medan Huria Copyrigt With Wiyuda Pratama Mahardika MEdan Sumatera Utara</h5>
                        </div>
                      </a>
                        <div class="news-time">
                          <p>By <span>Admin</span> 07-02-2023, 18.00</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="card shadow">
                    <div class="card-body p-0">
                      <img src="{{ url('assets/images/gereja.jpg') }}" alt="Thumbnail" class="rounded card-img-top">
                      <a href="#">
                        <div class="news-title text-center">
                          <h5>Berita Pertama Kami Gereja HKBP Medan Huria Copyrigt With Wiyuda Pratama Mahardika MEdan Sumatera Utara</h5>
                        </div>
                      </a>
                        <div class="news-time">
                          <p>By <span>Admin</span> 07-02-2023, 18.00</p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End News --}}

  {{-- Statistik --}}
  <div class="statistik mt-5 mb-5" id="statistik">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="fw-bold">STATISTIK GEREJA</h3>
              <hr>
              <div class="row">
                <div class="col-md-4 col-sm-12 col-12 mt-2">
                  <div class="card shadow">
                    <div class="card-body pb-3">
                      <h5 class="fw-bold pb-3">Jumlah Jemaat</h5>
                      <div class="row d-flex">
                        <div class="col-6 text-start">
                          <i class="fa-solid fa-users fa-2x"></i>
                        </div>
                        <div class="col-6 text-end align-items-center">
                          <p class="fw-bold">{{ $family_member }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 mt-2">
                  <div class="card shadow">
                    <div class="card-body pb-3">
                      <h5 class="fw-bold pb-3">Jumlah Keluarga</h5>
                      <div class="row">
                        <div class="col-6 text-start">
                          <i class="fa-solid fa-people-roof fa-2x"></i>
                        </div>
                        <div class="col-6 text-end">
                          <p class="fw-bold">{{ $family }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 mt-2">
                  <div class="card shadow">
                    <div class="card-body pb-3">
                      <h5 class="fw-bold pb-3">Jumlah Sintua</h5>
                      <div class="row">
                        <div class="col-6 text-start">
                          <i class="fa-solid fa-church fa-2x"></i>
                        </div>
                        <div class="col-6 text-end">
                          <p class="fw-bold">{{ $sintua }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Endstatistik --}}

  {{-- Warta --}}
  <div class="warta mt-5 mb-5" id="warta">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="fw-bold">WARTA GEREJA</h3>
              <hr>
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>
                      <th>Warta</th>
                      <th>Minggu</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($news as $warta)
                    <tr>
                      <th>{{ $no++ }}</th>
                      <td>{{ $warta->keterangan }}</td>
                      <td>{{ $warta->warta }}</td>
                      <td>{{ $warta->minggu }}</td>
                      <td>{{ $warta->tanggal }}</td>
                      <td>
                        <a href="{{ url('storage/warta/' , $warta->warta) }}" target="_blank" rel="noopener noreferrer">Download</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End Warta --}}

  {{-- Footer --}}
  <footer class="text-white mt-5">
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <a href="#">
            <img src="{{ url('./assets/images/logo.png') }}" alt="Logo" class="logo-gereja">
          </a>
        </div>
        <div class="col-md-4 col-sm-6">
          <h3 class="fw-bold">Powered By</h3>
          <img src="{{ url('./assets/images/logo_ubd.png') }}" alt="Logo UBD" class="logo-ubd mt-2">
        </div>
        <div class="col-md-4 col-sm-12 col-12">
          <div class="social-media">
            <h3 class="fw-bold mb-2">Sosial Media</h3>
            <a href="#">
              <img src="{{ url('./assets/images/icon/facebook.png') }}" alt="Facebook">
            </a>
            <a href="#">
              <img src="{{ url('./assets/images/icon/instagram.png') }}" alt="Instragram">
            </a>
            <a href="#">
              <img src="{{ url('./assets/images/icon/twitter.png') }}" alt="Twitter">
            </a>
            <a href="#">
              <img src="{{ url('./assets/images/icon/youtube.png') }}" alt="Youtube">
            </a>
          </div>
        </div>
        <div class="row text-center mt-5">
          <div class="col-12">
            <p class="text-muted">Powered By Universitas Budi Darma Medan &copy; 2022 HKBP BETHEL RESORT PADANG BULAN DISTRIK X-MA</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  {{-- End Footer --}}

  {{-- Back to top --}}
  {{-- <div class="back-to-top">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <a href="#header">
            <i class="fa-solid fa-arrow-up fa-2x"></i>
          </a>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- End Back to top --}}

  <script src="{{ url('./assets/library/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="{{ url('./assets/library/smoot-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

  <script>
    const ctx = document.getElementById('myChart');

    Chart.defaults.font.size = 15;
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: [
          'Jemaat',
          'Keluarga',
          'Sintua'
        ],
        datasets: [{
          label: 'Jumlah Statistik',
          data: [{{ $family_member }}, {{ $family }}, {{ $sintua }}],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      },
    });

    var scroll = new SmoothScroll();
    var profil = document.getElementById('#profil');
    var statistik = document.getElementById('#statistik');
    var warta = document.getElementById('#warta');
    var options = { speed: 900, easing: 'easeOutCubic' };
    scroll.animateScroll(profil, statistik, warta, options);
    // var easeInQuad = new SmoothScroll('[data-easing="easeInQuad"]', {easing: 'easeInQuad'});
  </script>
</body>
</html>