@extends('layouts.dashboard')
@section('title', 'Admin | Update Profil Gereja')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Update Profil Gereja</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('profil.update', $profile->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="pendeta_resort">Pendeta Resort</label>
              <input type="text" name="pendeta_resort" class="form-control @error('pendeta_resort') is-invalid @enderror" id="pendeta_resort" value="{{ $profile->pendeta_resort }}" placeholder="Input pendeta resort gereja">
              @error('pendeta_resort')
                <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="pendeta_jemaat">Pendeta Jemaat</label>
              <input type="text" name="pendeta_jemaat" class="form-control @error('pendeta_jemaat') is-invalid @enderror" id="pendeta_jemaat" value="{{ $profile->pendeta_jemaat }}" placeholder="Input pendeta jemaat gereja">
              @error('pendeta_jemaat')
                <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="guru_huria">Guru Huria</label>
              <input type="text" name="guru_huria" class="form-control @error('guru_huria') is-invalid @enderror" id="guru_huria" value="{{ $profile->guru_huria }}" placeholder="Input guru huria gereja">
              @error('guru_huria')
                <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="sintua">Sintua</label>
              <input type="text" name="sintua" class="form-control @error('sintua') is-invalid @enderror" id="sintua" value="{{ $profile->sintua }}" placeholder="Input pendeta sintua gereja">
              @error('sintua')
                <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Update Profil Gereja</button>
              <a href="{{ route('profil.index') }}" class="btn btn-warning">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection