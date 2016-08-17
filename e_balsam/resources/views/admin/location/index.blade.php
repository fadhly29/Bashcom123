@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->location->r == true)
<section class="content-header">
  <h1>
    Manajemen
    <small>Lokasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Lokasi</li>
  </ol>
</section>
@if( $errors->all() != null )
  <div class="row">
    <div class="col-md-3"></div>
    <div class="alert alert-danger alert-dismissable col-md-6">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Whoops, looks like something went wrong.</h4>
      @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
      @endforeach
    </div>  
    <div class="col-md-3"></div>
  </div>
@endif

<section class="content">
  <div class="box">
    <div class="box-header">
      @if( !isset ( $parent ) )
        <h1 class="box-title">List Provinsi</h1>
      @elseif( $parent['table'] == 'provinsi' )
        <h1 class="box-title">List Kabupaten / Kota di Provinsi {{ $parent->name }}</h1>
      @elseif( $parent['table'] == 'kabupaten_kota' )
        <h1 class="box-title">List Kecamatan di Kabupaten / Kota {{ $parent->name }}</h1>
      @elseif( $parent['table'] == 'kecamatan' )
        <h1 class="box-title">List Desa / Kelurahan di Kecamatan {{ $parent->name }}</h1>
      @endif


    </div><!-- /.box-header -->
    <div class="col-md-12">
      @if($role->location->c == true)
      <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#create">
        Create
      </button>
      @endif
    </div>
    <br>
    <br>
    <div class="box-body">
      <div class="box-group" id="accordion">
        <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr role="row">
              <th>
                Name
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
          @if( !empty( $lokasi->toArray() ) )
            @for( $a = 0; $a < $count; $a++ )
              <tr role="row" class="odd">
                <td class="sorting_1">{{$lokasi->toArray()[$a]['name']}}</td>
                <td align="center">
                  @if( !isset( $bottom ) )
                  <a href="{{route( 'location.detail', \Crypt::encrypt( $lokasi[$a] ) )}}" class="btn btn-md btn-info">
                    Detail
                  </a>
                  @endif
                  @if($role->location->u == true)
                  <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#update{{$lokasi[$a]['id']}}">
                    Update
                  </button>
                  @endif
                  @if($role->location->d == true)
                  <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete{{$lokasi[$a]['id']}}">
                    Delete
                  </button>
                  @endif
                </td>
              </tr>
            @endfor
          @else
            <tr role="row" class="odd">
              <td colspan="2">Tidak ada data yang tersedia</td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
    </div><!-- /.box-body -->
  </div>
</section>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    @if( !isset( $parent ) )
      <form role="form" action="{{route('location.create' )}}" method="POST" novalidate enctype="multipart/form-data">
    @else
      <form role="form" action="{{route('location.create', \Crypt::encrypt( $parent ) )}}" method="POST" novalidate enctype="multipart/form-data">
    @endif
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Buat Data Baru </h4> @if( isset ( $parent ) ) <small>Untuk {{ $parent->name }}</small> @endif
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" placeholder="Enter Name" required>
          </div>
        </div>
        <div class="modal-footer">
        <div class="pull-right">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@if( !empty( $lokasi->toArray() ) )

@for( $a = 0; $a < $count; $a++ )
<div class="modal fade" id="update{{$lokasi[$a]['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" action="{{route('location.update', \Crypt::encrypt( $lokasi[$a] ) )}}" method="POST" novalidate enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Data</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" placeholder="Enter Name" value="{{$lokasi[$a]['name']}}" required>
          </div>
        </div>
        <div class="modal-footer">
        <div class="pull-right">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delete{{$lokasi[$a]['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure want to delete {{ $lokasi[$a]->name }} ?</h4>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="{{ route( 'location.delete', \Crypt::encrypt( $lokasi[$a] ) ) }}" class="btn btn-danger">Delete</a> 
      </div>
    </div>
  </div>
</div>
@endfor

@endif

@else
<code>Maaf anda tidak diizinkan melihat halaman ini, mohon hubungi administrator jika anda ingin meminta akses</code>
@endif
@endsection

@section ( 'datatablejs' )
    <script src="{{ asset( 'AdminLTE/plugins/datatables/jquery.dataTables.min.js' ) }}" type="text/javascript"></script>
    <script src="{{ asset( 'AdminLTE/plugins/datatables/dataTables.bootstrap.min.js' ) }}" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(function () {
        $('#example2').dataTable();
      });
    </script>
@endsection