@extends('layouts.home')
@section('title', 'Baca Berita Harian Gereja HKBP Bethel Resort')
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
            <li class="breadcrumb-item"><a href="{{ route('news') }}">Baca</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $report->title }}</li>
          </ol>
        </nav>
      </div>
    </div>
    {{-- End Breadcrumb --}}

    {{-- News --}}
    <div class="read-news">
      <div class="row mt-3">
        <div class="col-md-8 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="read-news-thumbnail">
                <img src="{{ url('storage/thumbnail', $report->thumbnail) }}" class="card-img-top" alt="Thumbnail">
              </div>
              <div class="read-news-content mt-3">
                <h3 class="text-center">{{ $report->title }}</h3>
                <p>{!! $report->news !!}</p>
              </div>
              <div class="read-news-author">
                <p class="text-primary">By Admin / {{ $report->created_at }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="card">
            <div class="card-body">
              @foreach ($reports as $report)
              <div class="row mt-3">
                <div class="col-4">
                  <img src="{{ url('storage/thumbnail/'. $report->thumbnail) }}" class="card-img-top" alt="Thumbnail">
                </div>
                <div class="col-8">
                  <a href="{{ route('read.show', $report->id) }}">{{ $report->title }}</a><br>
                  <span>{{ $report->created_at }}</span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- End News --}}
  </div>
@endsection