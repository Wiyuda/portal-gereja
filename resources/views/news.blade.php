@extends('layouts.home')
@section('title', 'Berita Harian Gereja HKBP Bethel Resort')
@section('content')
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
            <a class="nav-link fw-bold me-4" href="{{ route('news') }}">Berita</a>
          </li>
        </ul>
        <div class="d-flex">
          <a href="{{ route('login') }}" class="btn btn-login btn-primary fw-bold px-3">Login</a>
        </div>
      </div>
    </div>
  </nav>
  {{-- End Navbar --}}

  <div class="container">

    {{-- Breadcrumb --}}
    <div class="row mt-4">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</a></li>
          </ol>
        </nav>
      </div>
    </div>
    {{-- End Breadcrumb --}}

    {{-- News --}}
    <div class="news">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h3 class="fw-bold">BERITA HARIAN</h3>
                <hr>
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <div class="card shadow">
                      <div class="card-body p-0">
                        <img src="{{ url('assets/images/gereja.jpg') }}" alt="Thumbnail" class="rounded card-img-top">
                        <a href="{{ route('read') }}">
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
                  <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
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
                  <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
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
  </div>
@endsection