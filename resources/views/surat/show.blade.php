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
        Tampil Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tampil Surat</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Tampil Surat -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tampil Surat</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body table-ressponsive">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <td>{{$surat->nomor_surat}}</td>
                                </tr>
                                <tr>
                                    <th>Pengirim Surat</th>
                                    <td>{{$surat->pengirim}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat</th>
                                    <td>{{$surat->tanggal_surat}}</td>
                                </tr>
                                <th>Gambar</th>
                                <td><img src="{{ asset('storage/'.$surat->data_file) }}" height='10%' width="10%" ></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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