@extends('layouts.home')
@section('title', 'Data Anggota Keluarga Gereja HKBP Bethel Resort')
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
            <li class="breadcrumb-item active" aria-current="page">Keluarga</a></li>
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
                <h3 class="fw-bold">Data Anggota Keluarga</h3>
                <hr>
                <div class="row">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Keluarga</th>
                          <th>Sektor</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Tempat Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Status Keluarga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($families as $family)
                        <tr>
                          <th>{{ $no++ }}</th>
                          <td>{{ $family->families->keluarga }}</td>
                          <td>{{ $family->families->sectors->sektor }} / {{ $family->families->sectors->nama }}</td>
                          <td>{{ $family->nama }}</td>
                          <td>{{ $family->tgl_lahir }}</td>
                          <td>{{ $family->tempat_lahir }}</td>
                          <td>{{ $family->jenis_kelamin }}</td>
                          <td>{{ $family->status_keluarga }}</td>
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
    </div>
    {{-- End News --}}
  </div>
@endsection