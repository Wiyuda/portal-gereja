@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Data Kegiatan Gereja')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Data Kegiatan Gereja</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('kegiatan.store') }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nama">Nama Kegiatan</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Input nama kegiatan">
                @error('nama')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="tgl">Tanggal</label>
                <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl" placeholder="Input tanggal kegiatan">
                @error('tgl')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="lokasi">Lokasi Kegiatan</label>
                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Input lokasi kegiatan">
                @error('lokasi')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                @error('keterangan')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Kegiatan</button>
              <a href="{{ route('kegiatan.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection