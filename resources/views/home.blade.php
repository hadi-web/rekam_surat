@extends('welcome')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active treeview">
      <a href="{{'/'}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
  <li class="treeview">
    <a href="{{'surat'}}">
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$surat->count()}}</h3>

              <p>Pesan Baru</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{'surat'}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection