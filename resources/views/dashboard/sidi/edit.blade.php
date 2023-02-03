@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Sidi Jemaat')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold"> Edit Sidi Jemaat</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('sidi.update', $sidi->id) }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_id">Keluarga</label>
                <select name="family_id" id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                  <option>--Pilih Keluarga--</option>
                  @foreach ($families as $family)
                    @if ($sidi->family_id == $family->id)
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
              <div class="form-group col-md-6">
                <label for="family_member_id">Anggota Keluarga</label>
                <select name="family_member_id" id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Anggota Keluarga--</option>
                  @foreach ($family_members as $fm)
                    @if ($sidi->family_member_id == $fm->id)
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
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sidi">Sidi</label>
                <input type="text" name="sidi" id="sidi" value="{{ $sidiStatus }}" class="form-control @error('sidi') is-invalid @enderror" readonly>
                @error('sidi')
                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $sidi->tanggal }}" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="gereja">Gereja</label>
                <input type="text" name="gereja" value="{{ $sidi->gereja }}" id="gereja" class="form-control @error('gereja') is-invalid @enderror" placeholder="Input gereja sidi">
                @error('gereja')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Input keterangan">{{ $sidi->keterangan }}</textarea>
                @error('keterangan')
                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
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
                    $('#family_member_id').append('<option hidden>--Pilih Anggota Jemaat--</option>'); 
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