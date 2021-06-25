@extends('welcome')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li class="treeview">
      <a href="{{'/'}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
  <li class="active treeview">
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
      Sampah
      <small>1 sampah baru</small>
  </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Sampah</li>
    </ol>
  </section>
  @if (session('status'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ session('status') }}
    </div>
  @endif  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              @if ($kotak_masuk->count() > 0 )    
              <li><a href="{{ url('surat/')}}"><i class="fa fa-inbox"></i> Pesan Masuk
                <span class="label label-primary pull-right">{{$kotak_masuk->count()}}</span></a></li>
                @else
                <li><a href="{{ url('surat/')}}"><i class="fa fa-inbox"></i> Pesan Masuk</a></li>
                @endif
                @if ($surat->count() > 0)
                <li class="active"><a href="{{url('surat/trash')}}"><i class="fa fa-trash-o"></i> Sampah
                  <span class="label label-warning pull-right">{{$surat->count()}}</span></a></li>
                @else
                <li class="active"><a href="{{url('surat/trash')}}"><i class="fa fa-trash-o"></i> Sampah</a></li>
                @endif
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Sampah Sementara</h3>
            <div class="box-tools pull-right">
              <div class="has-feedback">
                <a href="{{ url('surat/delete')}}" class="btn btn-danger btn-sm" 
                onclick="return confirm('Yakin Hapus Permanen Semua?')">
                  <i class="fa fa-trash"></i> Trash All
              </a>
              <a href="{{ url('surat/restore')}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-refresh"></i> Restore All
              </a>
              </div>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-controls">
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <tbody>
                  @if ($surat->count() > 0)
                  @foreach ($surat as $item)
                  <tr>
                  <td>
                    <!-- Check all button -->
                    <div class="btn-group">
                      <form action="{{ url('surat/delete/' .$item ->id) }}" method="GET" class="d-inline" 
                        onsubmit="return confirm('Yakin hapus secara permanen?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-default btn-sm">
                          <i class="fa fa-trash-o"></i>
                        </button>
                    </form>
                      <a href="{{ url('surat/restore/' .$item ->id) }}" class="btn btn-default btn-sm">
                        <i class="fa fa-refresh"></i></a>
                    </div>
                    <!-- /.btn-group -->
                  </td>
                  <td class="mailbox-name"><a href='#'>{{$item->nomor_surat}}</a></td>
                  <td class="mailbox-name"><a href='#'>{{$item->pengirim}}</a></td>
                  <td class="mailbox-subject"><b>Topik Hari Ini</b> - Random saja topik pada hari ini...
                  </td>
                  <td class="mailbox-attachment"></td>
                  <td class="mailbox-date">{{$item->tanggal_surat}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="4" class="text-center"> Tidak Ada Data Untuk Ditampilkan</td>
                </tr>
                @endif
                </tbody>
              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <div class="mailbox-controls">
              <div class="pull-right">
                {{ $surat->links() }}
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.pull-right -->
            </div>
          </div>
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection