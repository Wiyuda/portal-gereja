@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Jemaat Pindah Gereja')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Jemaat Pindah Gereja</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('pindah.update', $shift->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="sector_id">Sektor</label>
                  <select name="sector_id" id="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                    <option>--Pilih Sektor--</option>
                    @foreach ($sectors as $sector)
                      @if ($sector->id == $shift->sector_id)
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
                <div class="form-group col-md-6">
                  <label for="family_id">Keluarga</label>
                  <select name="family_id"  id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                    <option>--Pilih Keluarga--</option>
                    @foreach ($families as $family)
                      @if ($family->id == $shift->family_id)
                        <option value="{{ $family->id }}" selected>{{ $family->keluarga }}</option>  
                      @else
                        <option value="{{ $family->id }}">{{ $family->keluarga }}</option>
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
                <label for="family_member_id">Anggota Keluarga</label>
                <select name="family_member_id"  id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Anggota Keluarga--</option>
                  @foreach ($members as $member)
                      @if ($member->id == $shift->family_member_id)
                        <option value="{{ $member->id }}" selected>{{ $member->nama }}</option>  
                      @else
                        <option value="{{ $member->id }}">{{ $member->nama }}</option>
                      @endif
                    @endforeach
                </select>
                @error('family_member_id')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
                @if (session('status'))
                  <div class="alert alert-danger alert-dismissible fade show py-2 mt-2" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
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
                  <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl" placeholder="Input tanggal pindah" value="{{ $shift->tgl }}">
                  @error('tgl')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="gereja">Gereja</label>
                  <input type="text" name="gereja" class="form-control @error('gereja') is-invalid @enderror" id="gereja" placeholder="Input gereja tujuan" value="{{ $shift->gereja }}">
                  @error('gereja')
                    <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ $shift->keterangan }}</textarea>
                @error('keterangan')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Jemaat Pindah</button>
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
                    $.each(response.data, function(id, nama) {
                        $('#family_member_id').append(new Option(nama, id));
                    });
                });
            });
        });
      </script>
  @endpush
@endsection