@extends( 'admin.layout.layout' )

@section( 'link' )
<style type="text/css">
	.iframe-container {    
	    padding-bottom: 60%;
	    padding-top: 30px; height: 0; overflow: hidden;
	}
	 
	.iframe-container iframe,
	.iframe-container object,
	.iframe-container embed{
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	}

	.modal.in .modal-dialog {
	  transform: none; /*translate(0px, 0px);*/
	}
</style>
@endsection

@section( 'content' )
<section class="content-header">
  <h1>
    Detail Surat Peraturan
    <small>{{ $data['nomor'] }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'peraturan.index' ) }}"> Peraturan</a></li>
    <li class="active">{{ $data['nomor'] }}</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box">
				@if($role->peraturan->c == true)
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Bukti Dokumen Peraturan</h3>
				</div>
				@endif
				<div class="box-body">
					<div class="form-group" id="SK">
						@if( $data['img_peraturan'] )
							@if($role->peraturan->c == true)
							<div class="col-sm-12">
								<label>Upload SK Peraturan</label>
							</div>
							<div class="col-sm-12">
								<div id="UploadSK">
			            <input type="button" id="button" />
			            <p id="queuestatus-4-3-2-1" ></p>
			            <ol id="log-31"></ol>
			         	</div>
							</div>
							@endif
						<div class="row">
							@if( isset($image) && $image )
							<div class="col-md-12">
								<h4>Dokumen Gambar ( png, jpg, jpeg )</h4>
								<hr>
								<?php $i=0; ?>
								@foreach( $image as $sk )
								<div class="col-md-2">
									<a data-target="#sk{{ $i }}" data-toggle="modal">
						    		<img src="{{ asset($sk) }}" class="img-responsive" style="margin:5px;height:60px;widht:100px;">
				        	</a>
				        	<div class="modal fade" id="sk{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				        	  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-body">
									      	<img src="{{ asset($sk)}}" class="img-responsive">
									      </div>
										    <div class="modal-footer">
													@if($role->peraturan->d == true)
								    			<a href="{{route('peraturan.image.delete',\Crypt::encrypt( $sk ) )."?loc=sk&field=img_peraturan&id=".$data->id }}" class="btn btn-md btn-danger">Hapus Gambar</a>
										    	@endif
										    </div>
									    </div>
									 	</div>
				        	</div>
								</div>
								<?php $i++; ?>
								@endforeach
							</div>
							@endif
							@if( isset($pdf) && $pdf )
							<div class="col-md-12">
								<h4>Dokumen PDF</h4>
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tbody><tr>
		                  <th>No</th>
		                  <th>Nama Dokumen</th>
		                  <th class="pull-right">Action</th>
		                </tr>
		                <?php $i = 1; ?>
		                @foreach( $pdf as $file )
		                <tr>
		                  <td>{{$i}}</td>
		                  <td>{{ end($file) }}</td>
		                  <td class="pull-right">
		                  	<a href="{{ asset(implode('/',$file)) }}" target="blank" class="btn btn-sm btn-info view-pdf">View</a>
		                  	<a href="{{ asset(implode('/',$file)) }}" download="{{end($file)}}" class="btn btn-sm btn-success">Unduh</a>
												@if($role->peraturan->d == true)
												<a data-target="#pdf{{ $i }}" data-toggle="modal" class="btn btn-sm btn-danger">Hapus</a>
												<div class="modal fade" id="pdf{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							        	  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus {{ end($file) }} ?</h4>
												      </div>
													    <div class="modal-footer">
																<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
								    						<a href="{{route('peraturan.image.delete',\Crypt::encrypt( implode('/',$file) ) )."?loc=sk&field=img_peraturan&id=".$data->id }}" class="btn btn-md btn-danger">Hapus</a>
													    </div>
												    </div>
												 	</div>
							        	</div>
							        	@endif
		                  </td>
		                </tr>
		                <?php $i++; ?>
		                @endforeach
		              </tbody></table>
		            </div>
							</div>
							@endif
							@if( isset($raw) && $raw )
							<div class="col-md-12">
								<h4>Dokumen Lainnya</h4>
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tbody><tr>
		                  <th>No</th>
		                  <th>Nama Dokumen</th>
		                  <th class="pull-right">Action</th>
		                </tr>
		                <?php $i = 1; ?>
		                @foreach( $raw as $file )
		                <tr>
		                  <td>{{$i}}</td>
		                  <td>{{ end($file) }}</td>
		                  <td class="pull-right">
		                  	<a href="{{ asset(implode('/',$file)) }}" download="{{end($file)}}" class="btn btn-sm btn-success">Unduh</a>
												@if($role->peraturan->d == true)
												<a data-target="#raw{{ $i }}" data-toggle="modal" class="btn btn-sm btn-danger">Hapus</a>
												<div class="modal fade" id="raw{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							        	  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus {{ end($file) }} ?</h4>
												      </div>
													    <div class="modal-footer">
																<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
								    						<a href="{{route('peraturan.image.delete',\Crypt::encrypt( implode('/',$file) ) )."?loc=sk&field=img_peraturan&id=".$data->id }}" class="btn btn-md btn-danger">Hapus</a>
													    </div>
												    </div>
												 	</div>
							        	</div>
							        	@endif
		                  </td>
		                </tr>
		                <?php $i++; ?>
		                @endforeach
		              </tbody></table>
		            </div>
							</div>
							@endif
						</div>
						@else
						<div class="col-sm-12">
						@if($role->peraturan->c == true)
							<label>Upload SK Peraturan</label>
						@endif
						</div>
						<div class="col-sm-12">
						@if($role->peraturan->c == true)
							<div id="UploadSK">
		            <input type="button" id="button" />
		            <p id="queuestatus-4-3-2-1" ></p>
		            <ol id="log-31"></ol>
		         	</div>
		        @endif
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Data Peraturan</h3>
					@if($role->peraturan->u == true)
					<button data-toggle="modal" data-target="#update" class="btn btn-sm btn-warning pull-right"><i class="fa fa-pencil"></i></button>
					<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
													<label>Tugas Tentang</label>
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
									<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batalkan</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
							</div>
						</div>
					</div>
					@endif
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6">
							<label>Nomor</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['nomor'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Tentang</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['judul'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Yang Mengeluarkan</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['pemberi'] }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if($data['img_peraturan'])
		<div class="col-md-4">
			<div class="alert alert-info alert-dismissible">
        <h4><i class="icon fa fa-info"></i> Info Nama Folder</h4>
        {{ str_replace(':', '.', $data['created_at']) }}
      </div>
		</div>
		@endif
	</div>
</section>

@endsection

@section('script')
<script type="text/javascript">
/*
* This is the plugin
*/
(function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog modal-lg">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
    $('.view-pdf').on('click',function(){
        var pdf_link = $(this).attr('href');
        //var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
        //var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'        
        var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="500">No Support</object>'
        $.createModal({
            title:'My Title',
            message: iframe,
            closeButton:true,
            scrollable:false
        });
        return false;        
    });    
})	
</script>

<script type="text/javascript">
$(function(){
	$('#UploadSK').swfupload({
		upload_url: "../create/{{\Crypt::encrypt($data->id)}}/{{\Crypt::encrypt($path)}}",
		file_post_name: 'UploadSK',
		file_size_limit : "1024000",
		file_types : "*.jpg;*.png;*.jpeg;*.pdf;*.doc;*.docx;*.ppt;*.pptx;*.xls;*.xlsx",
		file_types_description : "Image files",
		file_upload_limit : 8,
		flash_url : "../../../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../../../adminlte/js/multiple_upload/swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024000)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-31').append(listitem);
			$('li#'+file.id+' .cancel').bind('click', function(){
				var swfu = $.swfupload.getInstance('#swfupload-control');
				swfu.cancelUpload(file.id);
				$('li#'+file.id).slideUp('fast');
			});
			// start the upload since it's queued
			$(this).swfupload('startUpload');
		})
		.bind('fileQueueError', function(event, file, errorCode, message){
			alert('Size of the file '+file.name+' is greater than limit');
		})
		.bind('uploadStart', function(event, file){
			$('#log-31 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-31 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-31 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-31 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-31 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-31 li#'+file.id);
			item.find('div.progress').css('width', '100%');
			item.find('span.progressvalue').text('100%');
			var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >view &raquo;</a>';
			item.addClass('success').find('p.status').html('Done!!!');
		})
		.bind('uploadComplete', function(event, file){
			// upload has completed, try the next one in the queue
			$(this).swfupload('startUpload');
		})
	
});
</script>
@endsection