@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Anggota Keluarga')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Anggota Keluarga</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('member.store') }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_id">Keluarga</label>
                <select name="family_id" id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                  <option>--Pilih Keluarga--</option>
                  @foreach ($families as $family)
                    <option value="{{ $family->id }}">{{ $family->keluarga }}</option>
                  @endforeach
                </select>
                @error('family_id')
                  <div class="alert alert-danger mt-2 p-2 mb-0">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Input nama">
                @error('nama')
                  <div class="alert alert-danger mt-2 p-2 mb-0">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Input tanggal lahir">
                @error('tgl_lahir')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Input tempat lahir">
                @error('tempat_lahir')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                  <option>--Pilih Jenis Kelamin--</option>
                  @foreach ($genders as $gender)
                    <option value="{{ $gender }}">{{ $gender }}</option>
                  @endforeach
                </select>
                @error('jenis_kelamin')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="no_hp">Nomor Handphone</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Input nomor handphone">
                @error('no_hp')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                @error('alamat')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="status_keluarga">Status Keluarga</label>
                <select name="status_keluarga" id="status_keluarga" class="form-control @error('status_keluarga') is-invalid @enderror" onchange="handleStatus()">
                  <option>--Pilih Status Keluarga--</option>
                  @foreach ($familyStatuses as $familyStatus)
                    <option value="{{ $familyStatus }}">{{ $familyStatus }}</option>
                  @endforeach
                </select>
                @error('status_keluarga')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="status_anak">Status Anak</label>
                <select name="status_anak" id="status_anak" class="form-control @error('status_anak') is-invalid @enderror" disabled>
                  <option>--Pilih Status Anak--</option>
                  @foreach ($childStatuses as $childStatus)
                    <option value="{{ $childStatus }}">{{ $childStatus }}</option>
                  @endforeach
                </select>
                @error('status_anak')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="pendidikan">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror">
                  <option>--Pilih Pendidikan--</option>
                  @foreach ($educations as $education)
                    <option value="{{ $education }}">{{ $education }}</option>
                  @endforeach
                </select>
                @error('pendidikan')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                  <option>--Pilih Status--</option>
                  @foreach ($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                  @endforeach
                </select>
                @error('status')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Anggota Keluarga</button>
              <a href="{{ route('member.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
      <script>
        function handleStatus() {
          let statusKeluarga = document.getElementById('status_keluarga').value;
          if(statusKeluarga == 'Ayah' || statusKeluarga == "Ibu" || statusKeluarga == '--Pilih Status Keluarga--') {
            document.getElementById('status_anak').setAttribute('disabled', true);
          } else {
            document.getElementById('status_anak').removeAttribute('disabled');
          }
        }
      </script>
  @endpush
@endsection