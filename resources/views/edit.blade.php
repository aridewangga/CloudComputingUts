
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.user.update',['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6 ">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Form Tambah Mahasiswa</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $data->email }}" placeholder="Enter email">
                          @error('email')
                            <small>{{ $message }} </small>
                          @enderror  
                          </div>
                          <div class="form-group">
                            <label for="exampleInputNama1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputName1" value="{{ $data->name }}" placeholder="Enter Name" value="{{ old('nama') }}">
                            @error('nama')
                                <small>{{ $message }} </small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                            @error('password')
                                <small>{{ $message }} </small>
                            @enderror
                          </div>
                          <div class="form-group">
                        </div>
                        <!-- /.card-body -->
                        @if ($errors->any())
                             <div class="alert alert-danger">
                                <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                            @endif
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--/.col (left) -->
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>
@endsection

