@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Baptis')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Edit Data Baptis</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('baptis.update', $baptism->id) }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sektor_id">Sektor</label>
                <select name="sector_id" id="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                  <option>--Pilih Sektor Gereja--</option>
                  @foreach ($sectors as $sector)
                    @if ($sector->id == $baptism->sector_id)
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
                  @foreach ($families as $family)
                    @if ($baptism->family_id == $family->id)
                      <option value="{{ $family->id }}" selected>{{ $family->keluarga }}</option>
                    @else
                      <option value="{{ $family->id }}">{{ $family->keluarga }}</option>
                    @endif
                  @endforeach
                </select>
                @error('family_id')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_member_id">Anggota Keluarga</label>
                <select name="family_member_id" id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Anggota Keluarga--</option>
                  @foreach ($family_members as $fm)
                    @if ($baptism->family_member_id == $fm->id)
                      <option value="{{ $fm->id }}" selected>{{ $fm->nama }}</option>
                    @else
                      <option value="{{ $fm->id }}">{{ $fm->nama }}</option>
                    @endif
                  @endforeach
                </select>
                @error('family_member_id')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="baptis">Baptis</label>
                <input type="text" name="baptis" value="{{ $status }}" id="baptis" class="form-control @error('baptis') is-invalid @enderror" readonly>
                @error('baptis')
                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $baptism->tanggal }}" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Input tanggal">
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="gereja">Gereja</label>
                <input type="text" name="gereja" value="{{ $baptism->gereja }}" id="gereja" class="form-control @error('gereja') is-invalid @enderror" placeholder="Input gereja">
                @error('gereja')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control @error('keterangan') is-invalid @enderror">{{ $baptism->keterangan }}</textarea>
              @error('keterangan')
                  <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Edit Baptis</button>
              <a href="{{ route('baptis.index') }}" class="btn btn-warning">Kembali</a>
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
    
    $(document).ready(function() {
    $('#family_id').on('change', function() {
       var categoryID = $(this).val();
       if(categoryID) {
           $.ajax({
               url: '/admin/getFamilyMember/'+categoryID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                 if(data){
                    $('#family_member_id').empty();
                    $('#family_member_id').append('<option hidden>--Pilih Anggota Keluarga--</option>'); 
                    $.each(data, function(key, family_member_id){
                        $('select[name="family_member_id"]').append('<option value="'+ family_member_id.id +'">' + family_member_id.nama+ '</option>');
                    });
                }else{
                    $('#family_member_id').empty();
                }
             }
           });
       }else{
         $('#family_member_id').empty();
       }
    });
    });
  </script>
  @endpush
@endsection