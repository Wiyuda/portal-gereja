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
                <label for="family_id">Keluarga</label>
                <select name="family_id" id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                  <option>--Pilih Keluarga--</option>
                  @foreach ($families as $family)
                    <option value="{{ $family->id }}">{{ $family->keluarga }}</option>
                  @endforeach
                </select>
                @error('family_id')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="family_member_id">Anggota Jemaat</label>
                <select name="family_member_id" id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option>--Pilih Anggota Jemaat--</option>
                </select>
                @error('family_member_id')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="monding">Monding</label>
                <input type="text" name="monding" value="{{ $monding }}" id="monding" class="form-control @error('monding') is-invalid @enderror" readonly>
                @error('monding')
                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                @error('keterangan')
                    <div class="alert alert-danger mt-2 mb-2 p-2">{{ $message }}</div>
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