@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->tugas->r == true)
<section class="content-header">
  <!--<h1>
    Surat Keputusan
    <small>Perintah / Tugas</small>
  </h1>-->
  <ol class="breadcrumb">
    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Perintah / Tugas</li>
  </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Data Surat Perintah / Tugas</h3>
		</div>
		<div class="box-body">
			@if($role->tugas->r == true)
			<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah Baru</a>
			<form method="POST" action="{{ route( 'tugas.create.post' ) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Tambah Baru Surat Perintah / Tugas</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-4">
												<label>Nomor Perintah / Tugas</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="nomor" class="form-control" placeholder="Nomor" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Tanggal Surat</label>
											</div>
											<div class="col-sm-8">
												<input type="date" name="tanggal_surat" class="form-control" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Perintah / Tugas Tentang</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="tentang" class="form-control" placeholder="Perintah / Tugas Tentang" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Yang Mengeluarkan</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="pemberi" class="form-control" placeholder="Yang Mengeluarkan" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Isi Tugas Ringkas</label>
											</div>
											<div class="col-sm-8">
												<textarea class="form-control" name="ringkas"></textarea>
											</div>
										</div><br><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Jumlah Yang Ditugaskan</label>
											</div>
											<div class="col-sm-5">
												<input type="number" id="jml_petugas" name="jml_petugas" class="form-control" placeholder="Jumlah Petugas" disabled="">
											</div>
											<div class="col-sm-2">
												<span class="btn btn-info btn-md" id="add"><i class="fa fa-plus"></i> Tambahkan Petugas</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<hr>
									<div id="petugas"></div>	
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			@endif
			<br>
			<br>
			<div class="row">
				<div class="col-lg-12 table-responsive">
					<table class="table table-bordered table-striped" id="example1">
						<thead>
							<tr>
								<th style="width:10px;">No</th>
								<th style="width:50px;">No Surat</th>
								<th>Tanggal Surat</th>
								<th>Tentang</th>
								<th>Yang Mengeluarkan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@if( count($tugas) > 0 )
						<?php $i=1; ?>
						@foreach( $tugas as $data )
							<tr>
								<td>{{$i}}</td>
								<td>{{ $data->nomor }}</td>
								<td>{{ $data->tanggal_surat }}</td>
								<td>{{ $data->tentang }}</td>
								<td>{{ $data->pemberi }}</td>
								<td>
									<a href="{{ route( 'tugas.images', \Crypt::encrypt( $data->id ) ) }}" class="btn btn-info">Detail</a>
									@if($role->tugas->u == true)
									<a data-toggle="modal" data-target="#update{{$i}}" class="btn btn-warning">Perbaharui</a>
									@endif
									@if($role->tugas->d == true)
									<a data-toggle="modal" data-target="#delete{{$i}}" class="btn btn-danger">Hapus</a>
									@endif
								</td>
								@if($role->tugas->u == true)
								<div class="modal fade" id="update{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
										<form method="POST" action="{{ route( 'tugas.update.post', \Crypt::encrypt( $data->id ) ) }}">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Perbaharui Surat Perintah / Tugas {{ $data->nomor }}</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<div class="col-sm-4">
																<label>Nomor Perintah / Tugas</label>
															</div>
															<div class="col-sm-8">
																<input type="text" name="nomor" class="form-control" placeholder="Nomor" required="required" value="{{ $data->nomor }}">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Tanggal Surat</label>
															</div>
															<div class="col-sm-8">
																<input type="date" name="tanggal_surat" class="form-control" required="required" value="{{ $data->tanggal_surat }}">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Perintah / Tugas Tentang</label>
															</div>
															<div class="col-sm-8">
																<input type="text" name="tentang" class="form-control" placeholder="Perintah / Tugas Tentang" required="required" value="{{ $data->tentang }}">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Yang Mengeluarkan</label>
															</div>
															<div class="col-sm-8">
																<input type="text" name="pemberi" class="form-control" placeholder="Yang Mengeluarkan" required="required" value="{{ $data->pemberi }}">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Isi Tugas Ringkas</label>
															</div>
															<div class="col-sm-8">
																<textarea class="form-control" name="ringkas">{{ $data->ringkas }}</textarea>
															</div>
														</div><br>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>
										</form>
										</div>
									</div>
								</div>
								@endif
								@if($role->tugas->d == true)
								<div class="modal fade" id="delete{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Anda Yakin Ingin Menghapus Data ini?</h4>
								      </div>
								      <div class="modal-footer">
								      	<input type="hidden" name="_token" value="{{csrf_token()}}">
								        <a class="btn btn-default" data-dismiss="modal">Batalkan</a>
								        <a href="{{ route( 'tugas.delete', \Crypt::encrypt( $data->id ) ) }}" class="btn btn-danger" >Ya, Hapus!</a>
								      </div>
								    </div>
								  </div>
								</div>
								@endif
							</tr>
							<?php $i++; ?>
						@endforeach
						@else
							<tr>
								<td colspan="5">Tidak ada data tersedia</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@else
<section class="content">
	<code>Maaf anda tidak Diizinkan untuk masuk ke halaman ini, mohon minta akses ke administrator</code>
</section>
@endif
@endsection
@section ('script')
<script type="text/javascript">
	var	i = 0;
	$(document).on( 'click', '#add', function( event ) {
		$( '#petugas' ).append( "<div class=form-group id=petugas"+i+"><div class=col-sm-4><label>Nama Yang Ditugaskan</label></div><div class=col-sm-7><input type=text name=petugas[] class=form-control placeholder='Yang Ditugaskan'></div><div class=col-md-1><span class='btn btn-danger btn-sm delete' target=petugas"+i+"><i class='fa fa-times'></i></span></div></div><br>" );
		i++;
		$( '#jml_petugas' ).val(i);
  	});

	$(document).on( 'click', '.delete', function( event ) {
		var	field = $(this).attr("target");
		$( "#"+field ).remove();
		i--;
		$( '#jml_petugas' ).val(i);
  	});

</script>
@endsection