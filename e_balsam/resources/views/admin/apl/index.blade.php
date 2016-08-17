@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->apl->r == true)
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Data Instansional</h3>
		</div>
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
		<div class="box-body">
			@if($role->apl->c == true)
				<a href="#" data-toggle="modal" data-target="#Create" class="btn btn-primary">Tambah Data</a>
    	@endif
			<br>
			<br>
			<div class="row">
				<div class="col-sm-12 table-responsive">
					<table class="table table-bordered table-striped" id="example1">
						<thead>
							<tr>
								<th>No</th>
								<th>Penanggung Jawab</th>
								<th>Bentuk Pergantian</th>
								<th>Jenis Pergantian</th>
								<th>Kawasan / Objek Terkena</th>
								<th>Luas Terkena</th>
								<th>Nilai Pergantian</th>
								<th>Tanggal Pergantian</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; ?>
						@foreach ($apl as $data)
							<tr>
								<td>{{ $no }}</td>
								<td>{{$data->penanggungjawab}}</td>
								<td>{{ App\Models\Bentuk::find($data->bentuk_pergantian)->name}}</td>
								<td>{{ App\Models\Jenis::find($data->jenis_pergantian)->name}}</td>
								<td>{{ App\Models\Kabupaten::find($data->kawasan)->name }}</td>
								<td>{{$data->luas_terkena_tol}}</td>
								<td>{{$data->nilai_pergantian}}</td>
								<td>{{$data->tanggal_pergantian}}</td>
								<td>
									<a href="{{ route( 'apl.upload', \Crypt::encrypt($data['id']) ) }}" class="btn btn-info">Detail</a>
									@if($role->apl->u == true)
									<a href="#" data-toggle="modal" data-target="#Update{{ $data['id']}}" class="btn btn-warning">Perbaharui</a>
									@endif
									@if($role->apl->d == true)
									<a href="#" data-toggle="modal" data-target="#Delete{{ $data['id']}}" class="btn btn-danger">Hapus</a>
									@endif
								</td>
							</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@if($role->apl->c == true)
			<div class="modal fade" id="Create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			     <form action="{{ route('apl.create') }}" method="POST" role="form" novalidate enctype="multipart/form-data">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Tambah Data Instansional</h4>
			      </div>
			      <div class="modal-body">
			        <div class="box-body">
			        	<div class="row">
									<div class="form-group">
										<label for="nama">Penanggung Jawab</label>
										<input type="text" name="penanggungjawab" class="form-control" id="penanggungjawab" >
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="nama">Bentuk Penggantian</label>
												<select class="form-control" name="bentuk_pergantian">
													@foreach( $bentuk as $bentuk_pergantian )
													<option value="{{ $bentuk_pergantian->id }}">{{ $bentuk_pergantian->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-6">
												<label for="nama">Jenis Penggantian</label>
												<select class="form-control" name="jenis_pergantian">
													@foreach( $jenis as $jenis_pergantian )
													<option value="{{ $jenis_pergantian->id }}">{{ $jenis_pergantian->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<label>Kawasan / Objek Terkena</label>
												<select name="kawasan" class="form-control">
													@foreach( $lokasi as $loc )
													<option value="{{ $loc->id }}">{{ $loc->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-12">
												<label>Luas Terkena Tol</label>
												<div class="input-group">
													<input type="number" step="0.01" min="0" name="luas_terkena_tol" class="form-control">
													<span class="input-group-addon">M2</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Nilai Penggantian Setara Dalam Rupiah</label>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" step="0.01" min="0" name="nilai_pergantian" class="form-control">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Nilai Ganti Bangunan</label>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" step="0.01" min="0" name="nilai_ganti_bangunan" class="form-control">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Nilai Ganti Tanaman</label>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" step="0.01" min="0" name="nilai_ganti_tanaman" class="form-control">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Tanggal Penggantian</label>
												<input type="date" name="tanggal_pergantian" class="form-control" id="tanggal_pergantian" required="required">
											</div>
											<div class="col-md-12">
												<label>Uraian Penerimaan</label>
												<textarea class="form-control" name="uraian_penerimaan"></textarea>
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
			@endif
			@for( $i = 0; $i < $count; $i++ )
			@if($role->apl->u == true)
			<div class="modal fade" id="Update{{ $apl[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			     <form action="{{ route('apl.update', \Crypt::encrypt( $apl[$i]->id )) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Perbaharui Data Instansional</h4>
			      </div>
			      <div class="modal-body">
			        <div class="box-body">
			        	<div class="row">
									<div class="form-group">
										<label for="nama">Penanggung Jawab</label>
										<input type="text" name="penanggungjawab" class="form-control" id="penanggungjawab" value="{{ $apl[$i]->penanggungjawab }}">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="nama">Bentuk Penggantian</label>
												<select class="form-control" name="bentuk_pergantian">
													@foreach( $bentuk as $bentuk_pergantian )
													<option @if( $apl[$i]->bentuk_pergantian == $bentuk_pergantian->id ) selected="" @endif value="{{ $bentuk_pergantian->id }}">{{ $bentuk_pergantian->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-6">
												<label for="nama">Jenis Penggantian</label>
												<select class="form-control" name="jenis_pergantian">
													@foreach( $jenis as $jenis_pergantian )
													<option @if( $apl[$i]->jenis_pergantian == $jenis_pergantian->id ) selected="" @endif value="{{ $jenis_pergantian->id }}">{{ $jenis_pergantian->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<hr>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<label>Kawasan / Objek Terkena</label>
												<select name="kawasan" class="form-control">
													@foreach( $lokasi as $loc )
													<option @if( $apl[$i]->kawasan == $loc->id ) selected="" @endif value="{{ $loc->id }}">{{ $loc->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-12">
												<label>Luas Terkena Tol</label>
												<div class="input-group">
													<input type="number" step="0.01" min="0" name="luas_terkena_tol" class="form-control" value="{{ $apl[$i]->luas_terkena_tol }}">
													<span class="input-group-addon">M2</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Nilai Penggantian Setara Dalam Rupiah</label>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" step="0.01" min="0" name="nilai_pergantian" class="form-control" value="{{ $apl[$i]->nilai_pergantian }}">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Nilai Ganti Bangunan</label>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" step="0.01" min="0" name="nilai_ganti_bangunan" class="form-control" value="{{ $apl[$i]->nilai_ganti_bangunan }}">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Nilai Ganti Tanaman</label>
												<div class="input-group">
													<span class="input-group-addon">Rp.</span>
													<input type="number" step="0.01" min="0" name="nilai_ganti_tanaman" class="form-control" value="{{ $apl[$i]->nilai_ganti_tanaman }}">
													<span class="input-group-addon">.00</span>
												</div>
											</div>
											<div class="col-md-12">
												<label>Tanggal Penggantian</label>
												<input type="date" name="tanggal_pergantian" class="form-control" id="tanggal_pergantian" required="required" value="{{ $apl[$i]->tanggal_pergantian }}">
											</div>
											<div class="col-md-12">
												<label>Uraian Penerimaan</label>
												<textarea class="form-control" name="uraian_penerimaan">{{ $apl[$i]->uraian_penerimaan }}</textarea>
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
			        <button type="submit" class="btn btn-warning">Perbaharui</button>
			      </div>
			     </form>
			    </div>
			  </div>
			</div>
			@endif
			@endfor

			@for( $i = 0; $i < $count; $i++ )
			@if($role->apl->d == true)
			<div class="modal fade" id="Delete{{ $apl[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Delete {{ $apl[$i]->penanggungjawab }}</h4>
			      </div>
			      <div class="modal-body">
			        Yaking ingin menghapus {{ $apl[$i]->penanggungjawab }}?
			      </div>
			      <div class="modal-footer">
			      	<input type="hidden" name="_token" value="{{csrf_token()}}">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <a href="{{ route('apl.delete', \Crypt::encrypt($apl[$i]->id)) }}" class="btn btn-danger">Delete</a>
			      </div>
			    </div>
			  </div>
			</div>
			@endif
			@endfor
		</div>
	</div>
</section>
@else
<section class="content">
	<code>Maaf anda tidak Diizinkan untuk masuk ke halaman ini, mohon minta akses ke administrator</code>
</section>
@endif
@endsection