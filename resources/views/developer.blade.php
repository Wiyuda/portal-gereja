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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold me-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Buku
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" target="_blank" href="https://batakpedia.org/daftar-lagu-buku-ende/">Lagu Buku Ende</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://bukunyanyianhkbp.com/daftar-lagu/">Nyanyian HKBP</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://alkitabtoba.wordpress.com/">Alkitab Bahasa Batak</a></li>
              <li><a class="dropdown-item" target="_blank" href="https://www.sabda.org/alkitab/">Alkitab Bahasa Indonesia</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold me-4" href="{{ route('activity') }}">Kegiatan</a>
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
              <hr>
              <h4 class="fs-6">Aplikasi Pendataan Jemaat HKBP Bethel Tanjung Selamat Merupakan Bentuk Pengabdian Kepada Masyarakat (PKM) Dosen Universitas Budi Darma Yang di Wujudkan Dalam Bentuk Produk Yang di Gunakan Oleh Masyarakat.</h4>
            </div>
            <div class="description mt-3">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="profile d-flex justify-content-center">
                    <img src="{{ url('assets/images/yuda.jpg') }}" alt="Profil Developer" class="rounded-cricle">
                  </div>
                  <div class="abbout mt-3">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tbody>
                          <tr>
                            <th>Nama</th>
                            <td>Wiyuda Pratama Mahardika, S.Kom</td>
                          </tr>
                          <tr>
                            <th>Jabatan</th>
                            <td>Programmer</td>
                          </tr>
                          <tr>
                            <th>Alumni</th>
                            <td>Teknik Informatika Univ. Budi Darma</td>
                          </tr>
                          <tr>
                            <th>Email/WA</th>
                            <td>wiyudapratama310@gmail.com/082284578426</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="profile d-flex justify-content-center">
                    <img src="{{ url('assets/images/efori.jpeg') }}" alt="Profil Developer" class="rounded-cricle">
                  </div>
                  <div class="abbout mt-3">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tbody>
                          <tr>
                            <th>Nama</th>
                            <td>Efori Bu'ulolo, M.Kom</td>
                          </tr>
                          <tr>
                            <th>Jabatan</th>
                            <td>Analis</td>
                          </tr>
                          <tr>
                            <th>Dosen</th>
                            <td>Univ. Budi Darma</td>
                          </tr>
                          <tr>
                            <th>Email/WA</th>
                            <td>buuloloefori21@gmail.com/081397959704</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="abbout mt-3">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tbody>
                          <tr>
                            <th>Nama</th>
                            <td>Rian Syahputra, M.Kom</td>
                          </tr>
                          <tr>
                            <th>Jabatan</th>
                            <td>Fasilitator</td>
                          </tr>
                          <tr>
                            <th>Dosen</th>
                            <td>Univ. Budi Darma</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="abbout mt-3">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tbody>
                          <tr>
                            <th>Nama</th>
                            <td>St. J.R.S Pasaribu,M.Kom</td>
                          </tr>
                          <tr>
                            <th>Jabatan</th>
                            <td>Narahubung</td>
                          </tr>
                          <tr>
                            <th>Sintua</th>
                            <td>Sintuan</td>
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
    </div>
    {{-- End Abbout --}}

  </div>
@endsection