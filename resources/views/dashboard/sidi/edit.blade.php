@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Sidi Jemaat')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Sidi Jemaat</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('sidi.update', $sidi->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_member_id">Nama Jemaat</label>
                <select name="family_member_id" id="famili_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Nama Jemaat--</option>
                    @foreach ($familyMembers as $family)
                      @if ($family->id == $sidi->family_member_id)
                        <option value="{{ $family->id }}" selected>{{ $family->nama }}</option>
                      @else
                        <option value="{{ $family->id }}">{{ $family->nama }}</option>
                      @endif
                    @endforeach
                </select>
                @error('family_member_id')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="sidi">Sidi</label>
                <select name="sidi" id="sidi" class="form-control @error('sidi') is-invalid @enderror" onchange="handleStatus()">
                  <option>--Pilih Status Sidi--</option>
                  @foreach ($sidis as $s)
                    @if ($sidi->sidi == $s)
                      <option value="{{ $s }}" selected>{{ $s }}</option>
                    @else
                      <option value="{{ $s }}">{{ $s }}</option>
                    @endif
                  @endforeach
                </select>
                @error('sidi')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tgl">Tanggal</label>
                <input type="date" name="tgl" id="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{ $sidi->tgl }}" disabled>
                @error('tgl')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="gereja">Gereja</label>
                <input type="text" name="gereja" id="gereja" class="form-control @error('gereja') is-invalid @enderror" placeholder="Input gereja sidi" value="{{ $sidi->gereja }}" disabled>
                @error('gereja')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Data Sidi</button>
              <a href="{{ route('sidi.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      function handleStatus() {
        let statusSidi = document.getElementById('sidi').value;
        if(statusSidi == 'Belum Sidi' || statusSidi == '--Pilih Status Sidi--') {
          document.getElementById('tgl').setAttribute('disabled', true);
          document.getElementById('gereja').setAttribute('disabled', true);
        } else {
          document.getElementById('tgl').removeAttribute('disabled');
          document.getElementById('gereja').removeAttribute('disabled');
        }
      }
    </script>
  @endpush
@endsection