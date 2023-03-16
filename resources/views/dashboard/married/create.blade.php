@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Data Kawin')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Data Kawin</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('kawin.store') }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="family_id">Keluarga</label>
                <select name="family_id" id="family_id" class="form-control @error('family_id') is-invalid @enderror">
                  <option value="0">--Pilih Keluarga--</option>
                  @foreach ($families as $family)
                    <option value="{{ $family->id }}">{{ $family->keluarga }}</option>
                  @endforeach
                </select>
                @error('family_id')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="family_member_id">Anggota Keluarga</label>
                <select name="family_member_id"  id="family_member_id" class="form-control @error('family_member_id') is-invalid @enderror">
                  <option value="0">--Pilih Anggota Keluarga--</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="kawin" class="form-label">Kawin</label>
                <input type="text" name="kawin" value="{{ $status }}" id="kawin" class="form-control @error('kawin') is-invalid @enderror" readonly>
                @error('kawin')
                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="nama_calon" class="form-label">Nama Calon</label>
                <input type="text" name="nama_calon" id="nama_calon" class="form-control @error('nama_calon') is-invalid @enderror" placeholder="Input nama calon">
                @error('nama_calon')
                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="asal_gereja_calon" class="form-label">Asal Gereja Calon</label>
                <input type="text" name="asal_gereja_calon" id="asal_gereja_calon" class="form-control @error('asal_gereja_calon') is-invalid @enderror" placeholder="Input asal gereja calon">
                @error('asal_gereja_calon')
                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal">Tanggal Pemberkatan</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Input tanggal">
                @error('tanggal')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="gereja">Gereja Pemberkatan</label>
                <input type="text" name="gereja" id="gereja" class="form-control @error('gereja') is-invalid @enderror" placeholder="Input gereja">
                @error('gereja')
                  <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Input keterangan"></textarea>
                @error('keterangan')
                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Kawin</button>
              <a href="{{ route('kawin') }}" class="btn btn-warning">Kembali</a>
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