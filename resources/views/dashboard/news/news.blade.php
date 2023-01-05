@extends('layouts.dashboard')
@section('title', 'Admin | Data Warta')

@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="fw-bold">Data Warta</h6>
            <a href="{{ route('news.create') }}" class="btn btn-primary">Tambah Warta</a>
            </div>
            <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Minggu</th>
                            <th>Warta</th>
                            <th>Keterangan</th>
                            <th width="11%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Minggu</th>
                            <th>Warta</th>
                            <th>Keterangan</th>
                            <th width="11%">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($news as $warta)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $warta->tanggal }}</td>
                            <td>{{ $warta->minggu }}</td>
                            <td><a href="{{ asset('storage/warta/' . $warta->warta) }}" class="text-decoration-none" target="_blank">{{ $warta->warta }}</a></td>
                            <td>{{ $warta->keterangan }}</td>
                            <td width="11%">
                            <a href="{{ route('news.edit', $warta->id) }}" class="btn btn-success">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('news.destroy', $warta->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>    
@endsection