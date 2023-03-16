@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Data Jemaat Pindah Gereja')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Data Jemaat Pindah Gereja</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('pindah.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="sector_id">Sektor</label>
                  <select name="sector_id" id="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                    <option value="0">--Pilih Sektor--</option>
                    @foreach ($sectors as $sector)
                      <option value="{{ $sector->id }}">{{ $sector->nama }}</option>
                    @endforeach
                  </select>
                  @error('sector_id')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="family_id">Keluarga</label>
                  <select name="family_id"  id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                    <option>--Pilih Keluarga--</option>
                  </select>
                  @error('family_id')
                      <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_member_id">Anggota Keluarga</label>
                <select name="family_member_id"  id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Anggota Keluarga--</option>
                </select>
                @error('family_member_id')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="pindah" readonly>
                @error('status')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="tgl">Tanggal Pindah</label>
                  <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl" placeholder="Input tanggal pindah">
                  @error('tgl')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="gereja">Gereja</label>
                  <input type="text" name="gereja" class="form-control @error('gereja') is-invalid @enderror" id="gereja" placeholder="Input gereja tujuan">
                  @error('gereja')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                @error('keterangan')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Jemaat Pindah</button>
              <a href="{{ route('pindah.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    {{-- Axios --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

      <script>
        $(function() {
            $('#sector_id').on('change', function() {
                axios.post('{{ route('family') }}', {id: $(this).val()})
                .then(function(response) {
                    $('#family_id').empty();
                    $('#family_id').append(new Option('--Pilih Keluarga--'));
                    $.each(response.data, function(id, keluarga) {
                        $('#family_id').append(new Option(keluarga, id));
                    });
                });
            });
            $('#family_id').on('change', function() {
                axios.post('{{ route('family_member') }}', {id: $(this).val()})
                .then(function(response) {
                    $('#family_member_id').empty();
                    $('#family_member_id').append(new Option('--Pilih Anggota Keluarga--'));
                    $('#family_member_id').append(new Option('All', 'All'));
                    $.each(response.data, function(id, nama) {
                        $('#family_member_id').append(new Option(nama, id));
                    });
                });
            });
        });
      </script>
  @endpush
@endsection