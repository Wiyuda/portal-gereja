@extends('layouts.home')
@section('title', 'Tetang Developer Website')
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
            <li class="breadcrumb-item active" aria-current="page">Developer</a></li>
          </ol>
        </nav>
      </div>
    </div>
    {{-- End Breadcrumb --}}

    {{-- Abbout --}}
    <div class="developer">
      <div class="row">
        <div class="col-12">
          <div class="card card-body">
            <div class="title text-center">
              <h3>Tentang Developer Website</h3>
            </div>
            <hr>
            <div class="description mt-3">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="profile d-flex justify-content-center">
                    <img src="{{ url('assets/images/profil.jpg') }}" alt="Profil Developer" class="rounded-cricle">
                  </div>
                  <div class="abbout mt-3">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>Nama</th>
                          <td>Wiyuda Pratama</td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>Jln.Sisingamangaraja Gg. Sepakat</td>
                        </tr>
                        <tr>
                          <th>Pekerjaan</th>
                          <td>Fullstact Web Developer</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="profile d-flex justify-content-center">
                    <img src="{{ url('assets/images/profil.jpg') }}" alt="Profil Developer" class="rounded-cricle">
                  </div>
                  <div class="abbout mt-3">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>Nama</th>
                          <td>Wiyuda Pratama</td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>Jln.Sisingamangaraja Gg. Sepakat</td>
                        </tr>
                        <tr>
                          <th>Pekerjaan</th>
                          <td>Fullstact Web Developer</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- End Abbout --}}

  </div>
@endsection