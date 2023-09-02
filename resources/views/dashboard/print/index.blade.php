@extends('layouts.dashboard')
@section('title', 'Admin | Profil Gereja')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Cetak Laporan Gereja</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('print-data') }}" method="POST" target="_blank">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="data">Data</label>
                <select name="data" id="data" class="form-control @error('data') is-invalid @enderror">
                  <option value="Jemaat">Jemaat</option>
                </select>
                @error('data')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="sector">Sektor</label>
                <select name="sector" id="sector" class="form-control @error('sector') is-invalid @enderror">
                  <option value="All">All</option>
                  @foreach ($sectors as $sector)
                      <option value="{{ $sector->id }}">{{ $sector->nama }}</option>
                  @endforeach
                  @error('sector')
                    <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                  @enderror
                </select>
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Cetak</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection