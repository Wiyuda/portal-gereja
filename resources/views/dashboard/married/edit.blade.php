@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Kawin')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Kawin</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('kawin.update', $married->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sektor">Keluarga</label>
                <select name="sector_id" id="sektor" class="form-control @error('sector_id') is-invalid @enderror" required>
                  <option>--Pilih Keluarga--</option>
                  @foreach ($sectors as $sector)
                    @if ($married->sector_id == $sector->id)
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
                <label for="kawin">Kawin</label>
                <select name="kawin" id="kawin" value="{{ $married->kawin }}" class="form-control @error('kawin') is-invalid @enderror" required>
                  <option>--Pilih Status--</option>
                  <option value="kawin">Kawin</option>
                  <option value="single">Single</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Input tanggal" value="{{ $married->tanggal }}" required>
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="gereja">Gereja</label>
                <input type="text" name="gereja" id="gereja" class="form-control @error('gereja') is-invalid @enderror" placeholder="Input gereja" value="{{ $married->gereja }}" required>
                @error('gereja')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Keluarga</button>
              <a href="{{ route('kawin.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection