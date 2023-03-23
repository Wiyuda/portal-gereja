@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Keluarga')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Keluarga</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('keluarga.update', $family->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="no_registrasi">Nomor Registrasi</label>
                <input type="text" name="no_registrasi" id="no_registrasi" class="form-control @error('no_registrasi') is-invalid @enderror" placeholder="Input nomor registrasi" value="{{ $family->no_registrasi }}" readonly>
                @error('no_registrasi')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="sektor">Sektor</label>
                <select name="sector_id" id="sektor" class="form-control @error('sector_id') is-invalid @enderror">
                  <option>--Pilih Sektor Gereja--</option>
                  @foreach ($sectors as $sector)
                    @if ($family->sector_id == $sector->id)
                      <option value="{{ $sector->id }}" selected>{{ $sector->nama }}</option>
                    @else
                      <option value="{{ $sector->id }}">{{ $sector->nama }}</option>
                    @endif
                  @endforeach
                </select>
                @error('sector_id')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="keluarga">Keluarga</label>
                <input type="text" name="keluarga" id="keluarga" class="form-control @error('keluarga') is-invalid @enderror" placeholder="Input nama keluarga" value="{{ $family->keluarga }}">
                @error('keluarga')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ $family->alamat }}</textarea>
                @error('alamat')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option>--Pilih Status--</option>
                  @foreach ($statuses as $status)
                    @if ($status == $family->status)
                      <option value="{{ $status }}" selected>{{ $status }}</option>  
                    @else
                      <option value="{{ $status }}">{{ $status }}</option>
                    @endif
                  @endforeach
                </select>
                @error('status')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Keluarga</button>
              <a href="{{ route('keluarga.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection