@extends( 'admin.layout.layout' )
@section('content')

	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Data Gallery</h3>
			</div>
			<div class="box-body">
				<a href="#" data-toggle="modal" data-target="#CreatePermasalahan" class="btn btn-primary">Tambah Data</a>
				<br>
				<br>
				<div class="row">
					<div class="col-sm-12 table-responsive">
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>No</th>
									<th>Paket/Seksi</th>
									<th>STA Awal - STA Akhir</th>
									<th>Uraian Item Pekerjaan</th>
									<th>Status Kondisi</th>
									<th>Pengerjaan</th>
									<th>Permasalahan Teknis Fisik</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								@foreach( $data as $gallery )
								<tr>
									<td>{{$i}}</td>
									<td>{{ $gallery->paket }}</td>
									<td>{{ $gallery->sta_mulai." s.d ".$gallery->sta_akhir }}</td>
									<td>{{ $gallery->uraian_pekerjaan }} Km</td>
									<td>{{ $gallery->status_kondisi }} Km</td>
									<td>{{ $gallery->pekerjaan_mulai. " s.d " .$gallery->pekerjaan_akhir }}</td>
									<td>{{ $gallery->permasalahan_teknis_fisik }}</td>
									<td>
										<a href="{{ route( 'dashboard.detail', \Crypt::encrypt( $gallery->id ) ) }}" class="btn btn-info" title="Detail Gambar"><i class="fa fa-eye"></i></a>
										<a href="#" data-toggle="modal" data-target="#Update{{ $i }}" class="btn btn-warning" title="Perbaharui"><i class="fa fa-pencil"></i></a>
										
										<a href="#" data-toggle="modal" data-target="#Delete{{ $i }}" class="btn btn-danger" title="Hapus Data"><i class="fa fa-times"></i></a>
									</td>
								</tr>
								<?php $i++; ?>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal fade" id="CreatePermasalahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				     <form action="{{ route('dashboard.create') }}" method="POST" role="form" novalidate enctype="multipart/form-data">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Tambah Data Permasalahan</h4>
				      </div>
				      <div class="modal-body">
				        <div class="box-body">
				        	<div class="row">
										<div class="form-group">
											<label for="nama">Paket/Seksi</label>
											<input type="text" name="paket" class="form-control" id="paket" >
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label for="nama">STA Awal</label>
													<input type="text" name="sta_mulai" class="form-control" id="sta_mulai" >
												</div>
												<div class="col-md-6">
													<label for="nama">STA Akhir</label>
													<input type="text" name="sta_akhir" class="form-control" id="sta_akhir" >
												</div>
											</div>
										</div>
										<hr>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label>Uraian Item Pekerjaan</label>
													<textarea name="uraian_pekerjaan" class="form-control"></textarea>
												</div>
												<div class="col-md-12">
													<label>Status Kondisi</label>
													<div class="input-group">
														<input type="number" step="0.01" min="0" name="status_kondisi" class="form-control">
														<span class="input-group-addon">%</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Pengerjaan</label>
											<div class="row">
												<div class="col-md-12">
													<input class="form-control" id="reservation" name="pengerjaan"></input>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Permasalahan Teknis Fisik</label>
											<div class="row">
												<div class="col-md-12">
													<input class="form-control" name="permasalahan_teknik_fisik"></input>
												</div>
											</div>
										</div>
									</div>
	                <hr>
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
				<?php $i = 1; ?>
				@foreach( $data as $gallery )
				<div class="modal fade" id="Update{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				     <form action="{{ route('permasalahan.update',\Crypt::encrypt( $gallery->id )) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Perbaharui Data Permasalahan</h4>
				      </div>
				      <div class="modal-body">
				        <div class="box-body">
	                <div class="row">
										<div class="form-group">
											<label for="nama">Paket/Seksi</label>
											<input type="text" name="paket" class="form-control" id="paket" value="{{ $gallery->paket }}">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label for="nama">STA Awal</label>
													<input type="text" name="sta_mulai" class="form-control" id="sta_mulai" value="{{ $gallery->sta_mulai }}">
												</div>
												<div class="col-md-6">
													<label for="nama">STA Akhir</label>
													<input type="text" name="sta_akhir" class="form-control" id="sta_akhir" value="{{ $gallery->sta_akhir }}">
												</div>
											</div>
										</div>
										<hr>
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label>Uraian Item Pekerjaan</label>
													<textarea name="uraian_pekerjaan" class="form-control">{{ $gallery->uraian_pekerjaan }}</textarea>
												</div>
												<div class="col-md-12">
													<label>Status Kondisi</label>
													<div class="input-group">
														<input type="number" step="0.01" min="0" name="status_kondisi" class="form-control" value="{{ $gallery->status_kondisi }}">
														<span class="input-group-addon">%</span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Pengerjaan</label>
											<div class="row">
												<div class="col-md-12">
													<input class="form-control" id="reservation{{$i}}" value="{{ $gallery->pekerjaan_mulai." - ".$gallery->pekerjaan_akhir }}" name="pengerjaan"></input>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Permasalahan Teknis Fisik</label>
											<div class="row">
												<div class="col-md-12">
													<textarea name="permasalahan_teknik_fisik" class="form-control">{{ $gallery->permasalahan_teknik_fisik }}</textarea>
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
				<div class="modal fade" id="Delete{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
				      <div class="modal-header">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Hapus Data Permasalahan</h4>
				      </div>
				      <div class="modal-body">
				        <div class="box-body">
				        	Anda Yakin ingin menghapus data permasalahan paket <code>{{ $gallery->paket }}</code> ?
	              </div>
				      </div>
				      <div class="modal-footer">
				      	<input type="hidden" name="_token" value="{{csrf_token()}}">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <a href="{{ route( 'dashboard.delete', \Crypt::encrypt( $gallery->id ) ) }}" class="btn btn-danger">Hapus Data</a>
				      </div>
						</div>
					</div>
				</div>
				<?php $i++; ?>
				@endforeach
			</div>
		</div>
	</section>

@endsection

@section( 'script' )
<script type="text/javascript">
  $(function () {
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
		
		//looping  
		<?php $i = 1; ?>  
		@foreach( $data as $gallery )
    $('#reservation{{$i}}').daterangepicker();
    $('#reservationtime{{$i}}').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    <?php $i++; ?>
    @endforeach
    //Date range as a button
    $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
              },
              startDate: moment().subtract('days', 29),
              endDate: moment()
            },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );
  });
</script>

<script type="text/javascript">
	var	permasalahan = 0;
	$(document).on( 'click', '#add_permasalahan', function( event ) {
		$( '#permasalahan' ).append( "<div class=form-group id=permasalahan"+permasalahan+"><div class=col-sm-10><textarea name=permasalahan[] class=form-control></textarea></div><div class=col-md-1><span class='btn btn-danger btn-sm delete_permasahalan' target=permasalahan"+permasalahan+"><i class='fa fa-times'></i></span></div></div>" );
		permasalahan++;
		$( '#jumlah_permasalahan' ).val(permasalahan);
  	});

	$(document).on( 'click', '.delete_permasahalan', function( event ) {
		var	field = $(this).attr("target");
		$( "#"+field ).remove();
		permasalahan--;
		$( '#jumlah_permasalahan' ).val(permasalahan);
  	});

</script>

<script type="text/javascript">
	var	penanggungjawab = 0;
	$(document).on( 'click', '#add_penanggungjawab', function( event ) {
		$( '#penanggungjawab' ).append( "<div class=form-group id=penanggungjawab"+penanggungjawab+"><div class=col-sm-10><input type=text name=penanggungjawab[] class=form-control placeholder='Yang Bertanggungjawab'></div><div class=col-md-1><span class='btn btn-danger btn-sm delete_penanggungjawab' target=penanggungjawab"+penanggungjawab+"><i class='fa fa-times'></i></span></div></div>" );
		penanggungjawab++;
		$( '#jumlah_penanggungjawab' ).val(penanggungjawab);
  	});

	$(document).on( 'click', '.delete_penanggungjawab', function( event ) {
		var	field = $(this).attr("target");
		$( "#"+field ).remove();
		penanggungjawab--;
		$( '#jumlah_penanggungjawab' ).val(penanggungjawab);
  	});

</script>
@endsection