@extends( 'admin.layout.layout' )
@section( 'content' )

<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Content Management System</h3>
		</div>
		<div class="box-body">
			<ul class="nav nav-tabs" role="tablist">
	          <li role="presentation" class="active"><a href="#banner" aria-controls="banner" role="tab" data-toggle="tab">Banner</a></li>
	          <li role="presentation"><a href="#agenda" aria-controls="agenda" role="tab" data-toggle="tab">Agenda</a></li>
	          <li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">Tentang Kami</a></li>
	        </ul>

		     <div class="box-body">   
		        <div class="tab-content">
			        <div role="tabpanel" id="banner" class="tab-pane active">
				        <form action="{{route('cms.banner.post') }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
			          		<input type="hidden" name="_token" value="{{csrf_token()}}">
			          		<div class="row">
			          			<div class="col-md-6">
			          				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#BannerModal">Add New</a>
			          			</div>
			          		</div>
			          		<br>
			          		<div class="modal fade" id="BannerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
							      </div>
							      <div class="modal-body">
							        <div class="box-body">
					                  <div class="form-group">
					                    <label>Deskripsi</label>
					                    <input name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required="required">
					                  </div>
					                  <div class="form-group">
					                    <label>Foto</label>
					                    <input type="file" min="0" name="foto">
					                  </div>
					                  <hr>
					                </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Save</button>
							      </div>
							    </div>
							  </div>
							</div>
			          		<div class="row">
			          			<div class="col-md-12">
			          				<table class="table table-striped">
			          					<tr>
			          						<th>Id</th>
			          						<th>Deskripsi</th>
			          						<th>Banner</th>
			          						<th colspan="2">Action</th>
			          					</tr>
			          					@foreach ($banner as $ban)
			          					<tr>
			          						<td>{{ $ban['id'] }}</td>
			          						<td>{{ $ban['deskripsi'] }}</td>
			          						<td><img src="{{ asset( $ban->foto )}}" width="100" height="100"></td>
			          						<td><a href="#" data-toggle="modal" data-target="#UpdateBanner{{ $ban['id']}}" class="btn btn-primary">Update</a></td>
			          						<td><a href="#" data-toggle="modal" data-target="#deleteBanner{{ $ban['id']}}" class="btn btn-danger">Delete</a></td>
			          					</tr>
			          					@endforeach
			          					
			          				</table>
		          				</div>
	          				</div>
			          	</form>
			          	@for( $i = 0; $i < $count; $i++ )
      					<div class="modal fade" id="UpdateBanner{{ $banner[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						     <form action="{{ route('cms.banner.update', \Crypt::encrypt($banner[$i]->id)) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Update {{ $banner[$i]->deskripsi }}</h4>
						      </div>
						      <div class="modal-body">
						        <div class="box-body">
				                  <div class="form-group">
				                    <label>Deskripsi</label>
				                    <input name="deskripsi" class="form-control" value="{{ $banner[$i]->deskripsi }}" required="required">
				                  </div>
				                  <div class="form-group">
				                    <label>Foto</label>
				                    <input type="file" min="0" name="foto">
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
						@endfor

						@for( $i = 0; $i < $count; $i++ )
      					<div class="modal fade" id="deleteBanner{{ $banner[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Delete {{ $banner[$i]->deskripsi }}</h4>
						      </div>
						      <div class="modal-body">
						        Yaking ingin menghapus {{ $banner[$i]->deskripsi }}?
						      </div>
						      <div class="modal-footer">
						      	<input type="hidden" name="_token" value="{{csrf_token()}}">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <a href="{{ route('cms.banner.delete', \Crypt::encrypt($banner[$i]->id)) }}" class="btn btn-danger">Delete</a>
						      </div>
						    </div>
						  </div>
						</div>
						@endfor
		          	</div>

		          	<div role="tabpanel" id="agenda" class="tab-pane">
				        <form action="{{ route('cms.agenda.post') }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
			          		<input type="hidden" name="_token" value="{{csrf_token()}}">
			          		<div class="row">
			          			<div class="col-md-6">
			          				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AgendaModal">Add New</a>
			          			</div>
			          		</div>
			          		<br>
			          		<div class="modal fade" id="AgendaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
							      </div>
							      <div class="modal-body">
							        <div class="box-body">
							          <div class="form-group">
							          	<label>Tahun</label>
							          	<input type="number" name="kategori" class="form-control" placeholder="Masukkan Kategori Agenda" required="required">
							          </div>
					                  <div class="form-group">
					                    <label>Deskripsi</label>
					                    <input name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required="required">
					                  </div>
					                  <div class="form-group">
					                    <label>Foto</label>
					                    <input type="file" min="0" name="foto">
					                  </div>
					                  <hr>
					                </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Save</button>
							      </div>
							    </div>
							  </div>
							</div>
		      				<table class="table table-striped">
		      					<tr>
		      						<th>Kategori</th>
		      						<th>Deskripsi</th>
		      						<th>Foto</th>
		      						<th colspan="2">Action</th>
		      					</tr>
		      				@foreach($agenda as $agen)
		      					<tr>
		      						<td>{{ $agen['kategori'] }}</td>
		      						<td>{{ $agen['deskripsi'] }}</td>
		      						<td><img src="{{ asset( $agen->foto )}}" width="100" height="100"></td>
		      						<td><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#UpdateAgenda{{ $agen['id']}}">Update</a></td>
		      						<td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteAgenda{{ $agen['id']}}">Delete</a></td>
		      					</tr>
		      				@endforeach
		      				</table>
			          	</form>

			          	@for( $i = 0; $i < $count2; $i++ )
      					<div class="modal fade" id="UpdateAgenda{{ $agenda[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						     <form action="{{ route('cms.agenda.update', \Crypt::encrypt($agenda[$i]->id)) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Update {{ $agenda[$i]->deskripsi }}</h4>
						      </div>
						      <div class="modal-body">
						        <div class="box-body">
						          <div class="form-group">
						          <label>Kategori</label>
						          <input type="number" name="kategori" class="form-control" value="{{ $agenda[$i]->kategori }}" required="required">
						          </div>
				                  <div class="form-group">
				                    <label>Deskripsi</label>
				                    <input name="deskripsi" class="form-control" value="{{ $agenda[$i]->deskripsi }}" required="required">
				                  </div>
				                  <div class="form-group">
				                    <label>Foto</label>
				                    <input type="file" min="0" name="foto">
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
						@endfor

						@for( $i = 0; $i < $count2; $i++ )
      					<div class="modal fade" id="deleteAgenda{{ $agenda[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Delete {{ $agenda[$i]->deskripsi }}</h4>
						      </div>
						      <div class="modal-body">
						        Yaking ingin menghapus {{ $agenda[$i]->deskripsi }}?
						      </div>
						      <div class="modal-footer">
						      	<input type="hidden" name="_token" value="{{csrf_token()}}">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <a href="{{ route('cms.agenda.delete', \Crypt::encrypt($agenda[$i]->id)) }}" class="btn btn-danger">Delete</a>
						      </div>
						    </div>
						  </div>
						</div>
						@endfor
		          	</div>

		          	<div role="tabpanel" id="about" class="tab-pane">
			          	<form action="{{ route('cms.about.post') }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
			          		<input type="hidden" name="_token" value="{{csrf_token()}}">
			          		<div class="row">
			          		@if($count3 == null)
			          			<div class="col-md-6">
			          				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#postAbout">Add New</a>
			          			</div>
			          		@else
			          			<div class="col-md-6">
			          				
			          			</div>
			          		@endif
			          		</div>
			          		<br>
			          		<div class="modal fade" id="postAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
							      </div>
							      <div class="modal-body">
							        <div class="box-body">
							          <div class="form-group">
					                    <label>Deskripsi</label>
					                    <textarea class="form-control" name="deskripsi"></textarea>
					                  </div>
				                  <div class="form-group">
				                    <label>Video</label>
				                    <input type="text" name="video" class="form-control" placeholder="Masukkan Video dari youtube">
				                  </div>
					                  <hr>
					                </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Save</button>
							      </div>
							    </div>
							  </div>
							</div>	
		      				<table class="table table-striped">
		      					<tr>
		      						<th>Deskripsi</th>
		      						<th>Video</th>
		      						<th>Action</th>
		      					</tr>
		      				@foreach($about as $bout)
		      					<tr>
		      						<td>{{ $bout['deskripsi'] }}</td>
		      						<th>{{ $bout['video'] }}</th>
		      						<td><a href="#" data-toggle="modal" data-target="#AboutModal{{ $bout['id']}}" class="btn btn-primary">Update</a></td>
		      					</tr>
		      				@endforeach
		      				</table>
		      			</form>
		      			@for( $i = 0; $i < $count3; $i++ )
      					<div class="modal fade" id="AboutModal{{ $about[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						     <form action="{{ route('cms.about.update', \Crypt::encrypt($about[$i]->id)) }}" method="POST" role="form" novalidate enctype="multipart/form-data">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Update {{ $about[$i]->deskripsi }}</h4>
						      </div>
						      <div class="modal-body">
						        <div class="box-body">
				                  <div class="form-group">
				                    <label>Deskripsi</label>
				                    <textarea class="form-control" name="deskripsi">{{ $about[$i]->deskripsi }}</textarea>
				                  </div>
				                  <div class="form-group">
				                    <label>Video</label>
				                    <input type="text" name="video" class="form-control" value="{{ $about[$i]->video }}">
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
						@endfor
		          	</div>
		        </div>
          	</div>
		</div>
	</div>
</section>

@endsection