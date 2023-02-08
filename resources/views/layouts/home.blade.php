<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

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

  @yield('content')

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

  <script src="{{ url('./assets/library/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="{{ url('./assets/library/smoot-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

  @stack('scripts')

  <script>
    var scroll = new SmoothScroll();
    var profil = document.getElementById('#profil');
    var statistik = document.getElementById('#statistik');
    var warta = document.getElementById('#warta');
    var options = { speed: 900, easing: 'easeOutCubic' };
    scroll.animateScroll(profil, statistik, warta, options);
  </script>
</body>
</html>