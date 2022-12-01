@extends('layouts.dashboard')
@section('title', 'Admin | Tambah Data Admin')

@section('content')
  <div class="row">
    <div class="col-12">  
      <div class="card shadow">
        <div class="card-header">
          <h6 class="fw-bold">Tambah Admin</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Input username">
              @error('username')
                <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Input password">
              @error('password')
                <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
              @enderror
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mr-3">Tambah Admin</button>
              <a href="{{ route('admin.index') }}" class="btn btn-warning">Kembali</a>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection