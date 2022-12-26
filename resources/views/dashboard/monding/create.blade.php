@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Jemaat Monding')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Data Jemaat Monding</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('monding.store') }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_member_id">Nama Jemaat</label>
                <select name="family_member_id" id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Nama Jemaat--</option>
                  @foreach ($familyMembers as $family)
                    <option value="{{ $family->id }}">{{ $family->nama }}</option>
                  @endforeach
                </select>
                @error('family_member_id')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="monding">Monding</label>
                <select name="monding" id="monding" class="form-control @error('monding') is-invalid @enderror" onchange="handleStatus()">
                  <option>--Pilih Status Monding--</option>
                  @foreach ($mondings as $monding)
                    <option value="{{ $monding }}">{{ $monding }}</option>
                  @endforeach
                </select>
                @error('monding')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="tgl">Tanggal</label>
                <input type="date" name="tgl" id="tgl" class="form-control @error('tgl') is-invalid @enderror" disabled>
                @error('tgl')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Jemaat Monding</button>
              <a href="{{ route('monding.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
    <script>
      function handleStatus() {
        let statusMonding = document.getElementById('monding').value
        if(statusMonding == '--Pilih Status Monding--' || statusMonding == 'Belum Monding') {
          document.getElementById('tgl').setAttribute('disabled', 'true');
        } else {
          document.getElementById('tgl').removeAttribute('disabled');
        }
      }
    </script>
  @endpush
@endsection