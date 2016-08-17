@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->notulen->r == true)
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Data Notulen</h3>
		</div>
		<div class="box-body">
			@if($role->notulen->c == true)
				<a href="#" data-toggle="modal" data-target="#CreateNotulen" class="btn btn-primary">Tambah Data</a>
    	@endif
			<br>
			<br>
			<div class="row">
				<div class="col-sm-12 table-responsive">
					<table class="table table-bordered table-striped" id="example1">
						<thead>
							<tr>
								<th>No</th>
								<th>Hari/Tanggal</th>
								<th>Waktu</th>
								<th>Tempat</th>
								<th>Agenda Rapat</th>
								<th>Pemimpin Rapat</th>
								<th>Notulis</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; ?>
						@foreach ($notulen as $laporan)
							<tr>
								<td>{{ $no }}</td>
								<td>{{ $laporan['tanggal'] }}</td>
								<td>{{ $laporan['waktu'] }}</td>
								<td>{{ $laporan['tempat'] }}</td>
								<td>{{ $laporan['agenda'] }}</td>
								<td>{{ $laporan['pemimpin'] }}</td>
								<td>{{ $laporan['notulis'] }}</td>
								<td>
									<a href="{{ route( 'notulen.upload', \Crypt::encrypt($laporan['id']) ) }}" class="btn btn-info">Detail Gambar</a>
									@if($role->notulen->u == true)
									<a href="#" data-toggle="modal" data-target="#UpdateNotulen{{ $laporan['id']}}" class="btn btn-warning">Perbaharui</a>
									@endif
									@if($role->notulen->d == true)
									<a href="#" data-toggle="modal" data-target="#DeleteNotulen{{ $laporan['id']}}" class="btn btn-danger">Hapus Data</a>
									@endif
								</td>
							</tr>
						<?php $no++; ?>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@if($role->notulen->c == true)
			<div class="modal fade" id="CreateNotulen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			     <form action="{{ route('notulen.post') }}" method="POST" role="form" novalidate enctype="multipart/form-data">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Tambah Data Notulen</h4>
			      </div>
			      <div class="modal-body">
			        <div class="box-body">
			        	<div class="row">
									<div class="form-group">
										<div class="col-sm-4">
											<label for="nama">Hari/Tanggal Rapat</label>
										</div>
										<div class="col-sm-8">
											<input type="date" name="tanggal" class="form-control" id="tanggal" >
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Waktu</label>
										</div>
										<div class="col-sm-5">
											<input type="text" name="waktu" class="form-control" id="waktu">
										</div>
										<div class="col-sm-3">
											<select name="bagian" class="form-control">
												<option>WIB</option>
												<option>WITA</option>
												<option>WIT</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Tempat</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="tempat" class="form-control" placeholder="Tempat">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Agenda Rapat</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="agenda" class="form-control" placeholder="Agenda Rapat">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Pemimpin Rapat</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="pemimpin" class="form-control" placeholder="Pemimpin Rapat">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Notulis</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="notulis" class="form-control" placeholder="Notulis">
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
			@if($role->notulen->u == true)
			<div class="modal fade" id="UpdateNotulen{{ $notulen[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			     <form action="{{ route('notulen.update.post', \Crypt::encrypt($notulen[$i]->id)) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Update {{ $notulen[$i]->agenda }}</h4>
			      </div>
			      <div class="modal-body">
			        <div class="box-body">
			        	<div class="row">
									<div class="form-group">
										<div class="col-sm-4">
											<label for="nama">Hari/Tanggal Rapat</label>
										</div>
										<div class="col-sm-8">
											<input type="date" name="tanggal" class="form-control" id="tanggal"  value="{{ $notulen[$i]->tanggal}}">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Waktu</label>
										</div>
										<div class="col-sm-5">
											<input type="text" name="waktu" class="form-control" id="waktu" value="{{ $notulen[$i]->waktu }}">
										</div>
										<div class="col-sm-3">
											<select name="bagian" class="form-control">
												<option @if( $notulen[$i]->bagian == 'WIB' ) selected="" @endif>WIB</option>
												<option @if( $notulen[$i]->bagian == 'WITA' ) selected="" @endif>WITA</option>
												<option @if( $notulen[$i]->bagian == 'WIT' ) selected="" @endif>WIT</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Tempat</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="tempat" class="form-control" placeholder="Tempat" value="{{ $notulen[$i]->tempat }}">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Agenda Rapat</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="agenda" class="form-control" placeholder="Agenda Rapat" value="{{ $notulen[$i]->agenda }}">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Pemimpin Rapat</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="pemimpin" class="form-control" placeholder="Pemimpin Rapat" value="{{ $notulen[$i]->pemimpin }}">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-4">
											<label>Notulis</label>
										</div>
										<div class="col-sm-8">
											<input type="text" name="notulis" class="form-control" placeholder="Notulis" value="{{ $notulen[$i]->notulis }}">
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
			@endfor

			@for( $i = 0; $i < $count; $i++ )
			@if($role->notulen->d == true)
			<div class="modal fade" id="DeleteNotulen{{ $notulen[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Delete {{ $notulen[$i]->agenda }}</h4>
			      </div>
			      <div class="modal-body">
			        Yaking ingin menghapus {{ $notulen[$i]->agenda }}?
			      </div>
			      <div class="modal-footer">
			      	<input type="hidden" name="_token" value="{{csrf_token()}}">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <a href="{{ route('notulen.delete', \Crypt::encrypt($notulen[$i]->id)) }}" class="btn btn-danger">Delete</a>
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