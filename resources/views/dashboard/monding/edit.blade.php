@extends('layouts.dashboard')
@section('title', 'Admin | Edit Jemaat Monding')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Jemaat Monding</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('monding.update', $monding->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_member_id">Nama Jemaat</label>
                <select name="family_member_id" id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Nama Jemaat--</option>
                  @foreach ($familyMembers as $family)
                    @if ($family->id == $monding->family_member_id)
                      <option value="{{ $family->id }}" selected>{{ $family->nama }}</option>  
                    @else
                      <option value="{{ $family->id }}">{{ $family->nama }}</option>
                    @endif
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
                  @foreach ($mondings as $m)
                    @if ($m == $monding->monding)
                      <option value="{{ $m }}" selected>{{ $m }}</option>  
                    @else
                      <option value="{{ $m }}">{{ $m }}</option>
                    @endif
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
                <input type="date" name="tgl" id="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{ $monding->tgl }}" disabled>
                @error('tgl')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Jemaat Monding</button>
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