@extends( 'admin.layout.layout' )
@section('content')
	<section class="content-header">
	  <h1>
	    Detail Permasalahan
	    <small>{{ $data['paket'] }}</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="{{ route( 'permasalahan.index' ) }}"> Permasalahan</a></li>
	    <li class="active">{{ $data['paket'] }}</li>
	  </ol>
	</section>
	<section class="content">
		<div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Realisasi Pembebasan Tanah</h3>
            <!-- <a href="#" data-toggle="modal" data-target="#realisasi" class="btn btn-sm btn-warning pull-right" title="Perbaharui"><i class="fa fa-pencil"></i></a> -->
            <div class="modal fade" id="realisasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <form action="{{ route('permasalahan.update', \Crypt::encrypt( $data->id )) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Perbaharui Data</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box-body">
                      <div class="row">
                        <div class="form-group">
                          <label for="nama">Paket/Seksi</label>
                          <input type="text" name="paket" class="form-control" id="paket" value="{{ $data->paket }}">
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="nama">STA Awal</label>
                              <input type="text" name="sta_mulai" class="form-control" id="sta_mulai" value="{{ $data->sta_mulai }}">
                            </div>
                            <div class="col-md-6">
                              <label for="nama">STA Akhir</label>
                              <input type="text" name="sta_akhir" class="form-control" id="sta_akhir" value="{{ $data->sta_akhir }}">
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <label>Panjang Penanganan</label>
                              <input type="text" name="panjang_penanganan" class="form-control" id="panjang_penanganan" value="{{ $data->panjang_penanganan }}">
                            </div>
                            <div class="col-md-6">
                              <label>Lahan Yang Dapat Dikerjakan</label>
                              <input type="text" name="lahan_yang_dapat_dikerjakan" class="form-control" id="lahan_yang_dapat_dikerjakan" value="{{ $data->lahan_yang_dapat_dikerjakan }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-6">
                <label>STA Awal - STA Akhir</label>
              </div>
              <div class="col-sm-6">
                <p>{{ $data->sta_mulai." s.d ".$data->sta_akhir }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Panjang Penanganan</label>
              </div>
              <div class="col-sm-6">
                <p>{{ $data->panjang_penanganan }} KM</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Lahan Yang Dapat Dikerjakan</label>
              </div>
              <div class="col-sm-6">
                <p>{{ $data->lahan_yang_dapat_dikerjakan }} KM</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <label>Lahan Bebas</label>
              </div>
              <div class="col-sm-6">
                <p>{{ $data->lahan_bebas }} KM ( <b>{{ $bebas }}%</b> )</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label>Lahan Belum Bebas</label>
              </div>
              <div class="col-sm-6">
                <p>{{ $data->lahan_belum_bebas }} KM ( <b>{{ $belum_bebas }}%</b> )</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Penanggungjawab</h3>
            <!-- <a href="#" data-toggle="modal" data-target="#penanggungjawab" class="btn btn-sm btn-warning pull-right" title="Perbaharui"><i class="fa fa-pencil"></i></a> -->
            <div class="modal fade" id="penanggungjawab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <form action="{{ route('permasalahan.update', \Crypt::encrypt( $data->id )) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Perbaharui Data</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box-body">
                      <div class="row">
                        <span class="btn btn-md btn-info" id="add_penanggungjawab">Tambahkan Data</span>
                        <hr>
                        <div id="penanggungjawab">
                          @if( $data->penanggungjawab  )
                          <?php $i = 0; ?>
                          @foreach( json_decode($data->penanggungjawab) as $penanggungjawab )
                            <div class="form-group" id="penanggungjawab{{$i}}">
                              <div class="col-sm-10">
                                <input name="penanggungjawab[]" class="form-control" required="required" value="{{ $penanggungjawab }}"></textarea>
                              </div>
                              <div class=col-md-1>
                                <span class='btn btn-danger btn-sm delete' target="penanggungjawab{{$i}}"><i class='fa fa-times'></i></span>
                              </div>
                            </div>
                          <?php $i++; ?>
                          @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <?php
                $i = 0;
                $tanggung = json_decode( $data->penanggungjawab );
              ?>
              @foreach( $tanggung as $jawab )
              <div class="col-md-12">
                <p>{{ $i+1 }} . {{ $jawab }}</p>
              </div>
              <?php $i++; ?>
              @endforeach
            </div>
          </div>
        </div>
      </div>
		</div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Permasalahan</h3>
            <!-- <a href="#" data-toggle="modal" data-target="#permasalahan" class="btn btn-sm btn-warning pull-right" title="Perbaharui"><i class="fa fa-pencil"></i></a> -->
            <div class="modal fade" id="permasalahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <form action="{{ route('permasalahan.update', \Crypt::encrypt( $data->id )) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Perbaharui Data</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box-body">
                      <div class="row">
                        <span class="btn btn-md btn-info" id="add_permasalahan">Tambahkan Data</span>
                        <hr>
                        <div id="permasalahan">
                          @if( $data->permasalahan  )
                          <?php $i = 0; ?>
                          @foreach( json_decode($data->permasalahan) as $permasalahan )
                            <div class="form-group" id="permasalahan{{$i}}">
                              <div class="col-sm-10">
                                <textarea name="permasalahan[]" class="form-control" required="required">{{ $permasalahan }}</textarea>
                              </div>
                              <div class=col-md-1>
                                <span class='btn btn-danger btn-sm delete' target="permasalahan{{$i}}"><i class='fa fa-times'></i></span>
                              </div>
                            </div>
                          <?php $i++; ?>
                          @endforeach
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <?php
                $i = 0;
                $masalah = json_decode( $data->permasalahan );
              ?>
              @foreach( $masalah as $problem )
              <div class="col-md-12">
                <p>{{ $i+1 }} . {{ $problem }}</p>
              </div>
              <?php $i++; ?>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
	</section>
@endsection
@section( 'script' )
<script type="text/javascript">
  var permasalahan = 0;
  $(document).on( 'click', '#add_permasalahan', function( event ) {
    $( '#permasalahan' ).append( "<div class=form-group id=permasalahan"+permasalahan+"><div class=col-sm-10><textarea name=permasalahan[] class=form-control></textarea></div><div class=col-md-1><span class='btn btn-danger btn-sm delete_permasahalan' target=permasalahan"+permasalahan+"><i class='fa fa-times'></i></span></div></div>" );
    permasalahan++;
    $( '#jumlah_permasalahan' ).val(permasalahan);
    });

  $(document).on( 'click', '.delete_permasahalan', function( event ) {
    var field = $(this).attr("target");
    $( "#"+field ).remove();
    permasalahan--;
    $( '#jumlah_permasalahan' ).val(permasalahan);
    });

</script>

<script type="text/javascript">
  var penanggungjawab = 0;
  $(document).on( 'click', '#add_penanggungjawab', function( event ) {
    $( '#penanggungjawab' ).append( "<div class=form-group id=penanggungjawab"+penanggungjawab+"><div class=col-sm-10><input type=text name=penanggungjawab[] class=form-control placeholder='Yang Bertanggungjawab'></div><div class=col-md-1><span class='btn btn-danger btn-sm delete_penanggungjawab' target=penanggungjawab"+penanggungjawab+"><i class='fa fa-times'></i></span></div></div>" );
    penanggungjawab++;
    $( '#jumlah_penanggungjawab' ).val(penanggungjawab);
    });

  $(document).on( 'click', '.delete_penanggungjawab', function( event ) {
    var field = $(this).attr("target");
    $( "#"+field ).remove();
    penanggungjawab--;
    $( '#jumlah_penanggungjawab' ).val(penanggungjawab);
    });

</script>
@endsection