@extends('welcome')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li class="treeview">
      <a href="{{url('/')}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
  <li class="active treeview">
    <a href="{{ url('surat')}}">
      <i class="fa fa-envelope"></i> <span>Surat</span>
    </a>
  </li>
</ul>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Tambah Surat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Tambah Surat -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Surat</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ url('surat')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                    <label>Nomor Surat</label>
                    <input type="number" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" 
                    value="{{ old('nomor_surat') }}" autofocus>
                    @error('nomor_surat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pengirim Surat</label>
                    <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" 
                    value="{{ old('pengirim') }}">
                    @error('pengirim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal_surat" class="form-control" 
                        value="{{ old('tanggal') }}">
                    </div>
                </div>
                <div class="form-group">
                  <input type="file" name="data_file" id="data_file">
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-download"></i> Simpan </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection