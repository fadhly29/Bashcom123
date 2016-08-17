@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->peraturan->r == true)
<section class="content-header">
  <!--<h1>
    Surat Keputusan
    <small>Peraturan</small>
  </h1>-->
  <ol class="breadcrumb">
    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Peraturan</li>
  </ol>
</section>
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Surat Keputusan</h3>
		</div>
		<div class="box-body">
			@if($role->peraturan->c == true)
			<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah Baru</a>
			<form method="POST" action="{{ route( 'peraturan.create.post' ) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Surat Keputusan</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<div class="col-sm-4">
												<label>Nomor SK</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="nomor" class="form-control" placeholder="Nomor" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>SK Tentang</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="judul" class="form-control" placeholder="Tugas Tentang" required="required">
											</div>
										</div><br>
										<div class="form-group">
											<div class="col-sm-4">
												<label>Yang Mengeluarkan</label>
											</div>
											<div class="col-sm-8">
												<input type="text" name="pemberi" class="form-control" placeholder="Yang Mengeluarkan" required="required">
											</div>
										</div>
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
								<th>No</th>
								<th>Nomor SK</th>
								<th>Tentang</th>
								<th>Yang Mengeluarkan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@if( count($peraturan) > 0 )
						<?php $i=1; ?>
						@foreach( $peraturan as $data )
							<tr>
								<td>{{$i}}</td>
								<td>{{ $data->nomor }}</td>
								<td>{{ $data->judul }}</td>
								<td>{{ $data->pemberi }}</td>
								<td>
									<a href="{{ route( 'peraturan.images', \Crypt::encrypt( $data->id ) ) }}" class="btn btn-info">Detail</a>
									@if($role->peraturan->u == true)
									<a data-toggle="modal" data-target="#update{{$i}}" class="btn btn-warning">Perbaharui</a>
									@endif
									@if($role->peraturan->d == true)
									<a data-toggle="modal" data-target="#delete{{$i}}" class="btn btn-danger">Hapus</a>
									@endif
								</td>
								@if($role->peraturan->u == true)
								<div class="modal fade" id="update{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
										<form method="POST" action="{{ route( 'peraturan.update.post', \Crypt::encrypt( $data->id ) ) }}">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Perbaharui Surat Peraturan {{ $data->nomor }}</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-lg-12">
														<div class="form-group">
															<div class="col-sm-4">
																<label>Nomor Tugas</label>
															</div>
															<div class="col-sm-8">
																<input value="{{ $data->nomor }}" type="text" name="nomor" class="form-control" placeholder="Nomor" required="required">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Peraturan Tentang</label>
															</div>
															<div class="col-sm-8">
																<input value="{{ $data->judul }}" type="text" name="judul" class="form-control" placeholder="Tugas Tentang" required="required">
															</div>
														</div><br>
														<div class="form-group">
															<div class="col-sm-4">
																<label>Yang Mengeluarkan</label>
															</div>
															<div class="col-sm-8">
																<input value="{{ $data->pemberi }}" type="text" name="pemberi" class="form-control" placeholder="Yang Mengeluarkan" required="required">
															</div>
														</div>
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
								@if($role->peraturan->d == true)
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
								        <a href="{{ route( 'peraturan.delete', \Crypt::encrypt( $data->id ) ) }}" class="btn btn-danger" >Ya, Hapus!</a>
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
								<td colspan="8">Tidak ada data tersedia</td>
								<td></td>
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