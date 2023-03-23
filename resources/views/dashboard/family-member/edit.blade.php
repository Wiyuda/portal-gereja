@extends('layouts.dashboard')
@section('title', 'Admin | Edit Anggota Keluarga')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Anggota Keluarga</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('member.update', $family->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sektor_id">Sektor</label>
                <select name="sector_id" id="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                  <option>--Pilih Sektor Gereja--</option>
                  @foreach ($sectors as $sector)
                    @if ($sector->id == $family->sector_id)
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
                <select name="family_id" id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                  <option>--Pilih Keluarga--</option>
                  @foreach ($families as $f)
                    @if ($f->keluarga == $family->families->keluarga)
                      <option value="{{ $f->id }}" selected>{{ $f->keluarga }}</option>
                    @else
                      <option value="{{ $f->id }}">{{ $f->keluarga }}</option>  
                    @endif
                  @endforeach
                </select>
                @error('family_id')
                  <div class="alert alert-danger mt-2 p-2 mb-0">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Input nama" value="{{ $family->nama }}">
                @error('nama')
                  <div class="alert alert-danger mt-2 p-2 mb-0">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Input tanggal lahir" value="{{ $family->tgl_lahir }}">
                @error('tgl_lahir')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Input tempat lahir" value="{{ $family->tempat_lahir }}">
                @error('tempat_lahir')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                  <option>--Pilih Jenis Kelamin--</option>
                  @foreach ($genders as $gender)
                    @if ($gender == $family->jenis_kelamin)
                      <option value="{{ $gender }}" selected>{{ $gender }}</option>
                    @else
                      <option value="{{ $gender }}">{{ $gender }}</option>
                    @endif
                  @endforeach
                </select>
                @error('jenis_kelamin')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="no_hp">Nomor Handphone</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="Input nomor handphone" value="{{ $family->no_hp }}">
                @error('no_hp')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="status_keluarga">Status Keluarga</label>
                <select name="status_keluarga" id="status_keluarga" class="form-control @error('status_keluarga') is-invalid @enderror" onchange="handleStatus()">
                  <option>--Pilih Status Keluarga--</option>
                  @foreach ($familyStatuses as $familyStatus)
                    @if ($familyStatus == $family->status_keluarga)
                      <option value="{{ $familyStatus }}" selected>{{ $familyStatus }}</option>  
                    @else
                      <option value="{{ $familyStatus }}">{{ $familyStatus }}</option>
                    @endif
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
                    @if ($childStatus == $family->status_anak)
                      <option value="{{ $childStatus }}" selected>{{ $childStatus }}</option>  
                    @else
                      <option value="{{ $childStatus }}">{{ $childStatus }}</option>
                    @endif
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
                    @if ($education == $family->pendidikan)
                      <option value="{{ $education }}" selected>{{ $education }}</option>  
                    @else
                      <option value="{{ $education }}">{{ $education }}</option>    
                    @endif
                  @endforeach
                </select>
                @error('pendidikan')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Anggota Keluarga</button>
              <a href="{{ route('member.index') }}" class="btn btn-warning">Kembali</a>
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
    });

    let status = '{{ $family->status_keluarga }}';
    console.log(status)
    if(status == 'Anak') {
      document.getElementById('status_anak').removeAttribute('disabled');
    }
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