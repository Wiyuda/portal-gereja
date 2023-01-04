@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Data Baptis')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Data Baptis</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('baptis.store') }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_member_id">Keluarga</label>
                <select name="family_member_id" id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror" required>
                  <option>--Pilih Keluarga--</option>
                  @foreach ($family_members as $fm)
                    <option value="{{ $fm->id }}">{{ $fm->nama }}</option>
                  @endforeach
                </select>
                @error('family_member_id')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="baptis">Baptis</label>
                <select name="baptis"  id="baptis" class="form-control @error('baptis') is-invalid @enderror">
                  <option>--Pilih Status--</option>
                  @foreach ($statuses as $baptism)
                  <option value="{{ $baptism }}">{{ $baptism }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Input tanggal">
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="gereja">Gereja</label>
                <input type="text" name="gereja" id="gereja" class="form-control @error('gereja') is-invalid @enderror" placeholder="Input gereja">
                @error('gereja')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Baptis</button>
              <a href="{{ route('baptis.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection