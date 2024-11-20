
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dewangga</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">I Putu Ari Dewangga    </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table Mahasiswa</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data  as $d )
                      <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>
                            <a href="{{ route('admin.user.edit',['id' => $d->id]) }}" class="btn btn-primary"><i class = "fas fa-pen"></i>Edit</a>
                            <a data-toggle="modal" data-target="#modal-default" class="btn btn-danger"><i class = "fas fa-trash-alt"></i>Hapus</a>
                        </td>
                      </tr>
                      {{-- Konfirmasi jika ingin menghapus data --}}
                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Konfirmasi Menghapus Data</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p><b>Apakah Anda Yakin Ingin Menghapus Data </b>{{$d->name}}</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <form action="{{route('admin.user.delete',['id'=> $d->id]) }}" method="POST">
                                    @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </div>
@endsection

