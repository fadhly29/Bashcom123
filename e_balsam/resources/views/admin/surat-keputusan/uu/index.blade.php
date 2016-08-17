@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->uu->r == true)
<section class="content-header">
  <h1>&nbsp</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Undang - undang</li>
  </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Data Peraturan / UU</h3>
		</div>
		<div class="box-body">
			@if($role->uu->c == true)
			<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah Baru</a>
			<form method="POST" action="{{ route( 'uu.create.post' ) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Tambah Baru Peraturan/UU</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-4">
												<label>Nomor Peraturan/UU</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="nomor" class="form-control" placeholder="Nomor" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Jenis Peraturan/UU</label>
											</div>
											<div class="col-sm-8">
												<select name="jenis" class="form-control">
													<option>Undang-undang(UU)</option>
													<option>Peraturan Presiden(PP)</option>
													<option>Peraturan Menteri (Permen)</option>
													<option>Surat Kesepakatan Bersama (SKB)</option>
													<option>Peraturan Kepala Badan (Perkaban)</option>
													<option>Peraturan Daerah (Perda)</option>
													<option>Peraturan Gubernur (Pergub)</option>
													<option>Peraturan Walikota (Perwal)</option>
													<option>Peraturan Bupati (Perbup)</option>
													<option>Peraturan Pemerintah (PP)</option>
													<option>Keputusan Presiden (Kepres)</option>
													<option>Keputusan Menteri (Kepmen)</option>
													<option>PERPPU</option>
												</select>
											</div>
										</div><br>
										<!--<div class="form-group">
											<div class="col-sm-4">
												<label>Tahun Surat</label>
											</div>
											<div class="col-sm-8">
												<input type="date" name="tahun" class="form-control" required="required">
											</div>
										</div><br>-->
										<div class="form-group">
											<div class="col-sm-4">
												<label>Peraturan Tentang</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="tentang" class="form-control" placeholder="Undang - undang Tentang" required="required">
											</div>
										</div><br>
									</div>
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
								<th style="width:50px;">No Peraturan/UU</th>
								<th>Jenis Peraturan/UU</th>
								<th>Tentang</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@if( count($uu) > 0 )
						<?php $i=1; ?>
						@foreach( $uu as $data )
							<tr>
								<td>{{$i}}</td>
								<td>{{ $data->nomor }}</td>
								<td>{{ $data->jenis }}</td>
								<td>{{ $data->tentang }}</td>
								<td>
									<a href="{{ route( 'uu.images', \Crypt::encrypt( $data->id ) ) }}" class="btn btn-info">Detail</a>
									@if($role->uu->u == true)
									<a data-toggle="modal" data-target="#update{{$i}}" class="btn btn-warning">Perbaharui</a>
									@endif
									@if($role->uu->d == true)
									<a data-toggle="modal" data-target="#delete{{$i}}" class="btn btn-danger">Hapus</a>
									@endif
								</td>
								@if($role->uu->u == true)
								<div class="modal fade" id="update{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
										<form method="POST" action="{{ route( 'uu.update.post', \Crypt::encrypt( $data->id ) ) }}">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Perbaharui Surat Undang - undang {{ $data->nomor }}</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<div class="col-sm-4">
																<label>Nomor Surat</label>
															</div>
															<div class="col-sm-8">
																<input type="text" value="{{$data->nomor}}" name="nomor" class="form-control" placeholder="Nomor" required="required">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Jenis Surat</label>
															</div>
															<div class="col-sm-8">
																<select name="jenis" class="form-control">
																	<option @if( $data->jenis == "Undang-undang(UU)" ) selected="" @endif>Undang-undang(UU)</option>
																	<option @if( $data->jenis == "Peraturan Presiden(PP)" ) selected="" @endif>Peraturan Presiden(PP)</option>
																	<option @if( $data->jenis == "Peraturan Menteri (Permen)" ) selected="" @endif>Peraturan Menteri (Permen)</option>
																	<option @if( $data->jenis == "Surat Kesepakatan Bersama (SKB)" ) selected="" @endif>Surat Kesepakatan Bersama (SKB)</option>
																	<option @if( $data->jenis == "Peraturan Kepala Badan (Perkaban)" ) selected="" @endif>Peraturan Kepala Badan (Perkaban)</option>
																	<option @if( $data->jenis == "Peraturan Daerah (Perda)" ) selected="" @endif>Peraturan Daerah (Perda)</option>
																	<option @if( $data->jenis == "Peraturan Gubernur (Pergub)" ) selected="" @endif>Peraturan Gubernur (Pergub)</option>
																	<option @if( $data->jenis == "Peraturan Walikota (Perwal)" ) selected="" @endif>Peraturan Walikota (Perwal)</option>
																	<option @if( $data->jenis == "Peraturan Bupati (Perbup)" ) selected="" @endif>Peraturan Bupati (Perbup)</option>
																	<option @if( $data->jenis == "Peraturan Pemerintah (PP)" ) selected="" @endif>Peraturan Pemerintah (PP)</option>
																	<option @if( $data->jenis == "Keputusan Presiden (Kepres)" ) selected="" @endif>Keputusan Presiden (Kepres)</option>
																	<option @if( $data->jenis == "Keputusan Menteri (Kepmen)" ) selected="" @endif>Keputusan Menteri (Kepmen)</option>
																	<option @if( $data->jenis == "PERPPU" ) selected="" @endif>PERPPU</option>
																</select>
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Tahun Surat</label>
															</div>
															<div class="col-sm-8">
																<input type="date" value="{{$data->tahun}}" name="tahun" class="form-control" required="required">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Surat Tentang</label>
															</div>
															<div class="col-sm-8">
																<input type="text" value="{{$data->tentang}}" name="tentang" class="form-control" placeholder="Undang - undang Tentang" required="required">
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
								@if($role->uu->d == true)
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
								        <a href="{{ route( 'uu.delete', \Crypt::encrypt( $data->id ) ) }}" class="btn btn-danger" >Ya, Hapus!</a>
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