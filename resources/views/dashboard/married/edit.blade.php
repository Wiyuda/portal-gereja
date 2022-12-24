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
                <label for="family">Keluarga</label>
                <select name="family_id" id="family" class="form-control @error('family_id') is-invalid @enderror" required>
                  <option>--Pilih Keluarga--</option>
                  @foreach ($families as $family)
                    @if ($married->family_id == $family->id)
                      <option value="{{ $family->id }}" selected>{{ $family->keluarga }}</option>
                    @else
                      <option value="{{ $family->id }}">{{ $family->nama }}</option>
                    @endif
                  @endforeach
                </select>
                @error('family_id')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="kawin">Kawin</label>
                <select name="kawin" id="kawin" value="{{ $married->kawin }}" class="form-control @error('kawin') is-invalid @enderror" required>
                  <option>--Pilih Status--</option>
                  @foreach ($statuses as $status)
                    @if ($status == $married->kawin)
                      <option value="{{ $status }}" selected>{{ $status }}</option>
                    @else
                      <option value="{{ $status }}">{{ $status }}</option>
                    @endif                     
                  @endforeach
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
              <button type="submit" class="btn btn-primary mr-3">Edit Kawin</button>
              <a href="{{ route('kawin.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection