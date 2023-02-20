@extends('layouts.dashboard')
@section('title', 'Admin | Profil Gereja')
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ url('assets/library/years/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/library/years/css/yearpicker.css') }}">
@endpush
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
                <select name="data" id="data" class="form-select @error('data') is-invalid @enderror">
                  <option>--Pilih Data--</option>
                  <option value="Jemaat">Jemaat</option>
                  <option value="Kawin">Kawin</option>
                  <option value="Sidi">Sidi</option>
                  <option value="Monding">Monding</option>
                  <option value="Baptis">Baptis</option>
                </select>
                @error('data')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="year">Tahun</label>
                <input type="text" name="year" class="yearpicker form-control my-0 py-0 @error('year') is-invalid @enderror" value="" />
                @error('year')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="sector">Sektor</label>
                <select name="sector" id="sector" class="form-select @error('sector') is-invalid @enderror">
                  <option hidden>--Pilih Sector--</option>
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
@push('scripts')
  <script src="{{ url('assets/library/years/js/yearpicker.js') }}"></script>
  <script>
    let date = new Date();
    let year = date.getFullYear();
    $(document).ready(function() {
      $(".yearpicker").yearpicker({
        year: year,
        startYear: 2010,
        endYear: 2050
      });
    });
  </script>
@endpush
@endsection