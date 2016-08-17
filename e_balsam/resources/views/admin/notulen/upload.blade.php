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
    Detail Notulen
    <small>{{ $data['nomor'] }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route( 'system.index' ) }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'notulen' ) }}"> Notulen</a></li>
    <li class="active">{{ $data['nomor'] }}</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header with-border">
					@if($role->notulen->c == true)
					<h3 class="box-title">Tambah Bukti Dokumen Notulen</h3>
					@endif
				</div>
				<div class="box-body">
					<div class="form-group" id="SK">
						@if( $data['img_notulen'] )
						@if($role->notulen->c == true)
						<div class="col-sm-12">
							<label>Upload Notulen</label>
						</div>
						<div class="col-sm-12">
							<div id="UploadNotulen">
		            <input type="button" id="button" />
		            <p id="queuestatus-4-3-2-1" ></p>
		            <ol id="log-29"></ol>
		         	</div>
						</div>
						@endif
						<div class="row">
							@if( isset($image_notulen) && $image_notulen )
							<div class="col-md-12">
								<h4>Dokumen Gambar ( png, jpg, jpeg )</h4>
								<hr>
								<?php $i=0; ?>
								@foreach( $image_notulen as $sk )
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
													@if($role->notulen->d == true)
								    			<a href="{{route('notulen.image.delete',\Crypt::encrypt( $sk ) )."?loc=sk&field=img_notulen&id=".$data->id }}" class="btn btn-md btn-danger">Hapus Gambar</a>
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
							@if( isset($pdf_notulen) && $pdf_notulen )
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
		                @foreach( $pdf_notulen as $pdf )
		                <tr>
		                  <td>{{$i}}</td>
		                  <td>{{ end($pdf) }}</td>
		                  <td class="pull-right">
		                  	<a href="{{ asset(implode('/',$pdf)) }}" class="btn btn-sm btn-info view-pdf">View</a>
		                  	<a href="{{ asset(implode('/',$pdf)) }}" download="{{end($pdf)}}" class="btn btn-sm btn-success">Unduh</a>
												@if($role->notulen->d == true)
												<a data-target="#pdf{{ $i }}" data-toggle="modal" class="btn btn-sm btn-danger">Hapus</a>
												<div class="modal fade" id="pdf{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							        	  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus {{ end($pdf) }} ?</h4>
												      </div>
													    <div class="modal-footer">
																<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
								    						<a href="{{route('notulen.image.delete',\Crypt::encrypt( implode('/',$pdf) ) )."?loc=sk&field=img_notulen&id=".$data->id }}" class="btn btn-md btn-danger">Hapus</a>
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
							@if( isset($raw_notulen) && $raw_notulen )
							<div class="col-md-12">
								<h4>Dokumen Lainnya ( Selain Gambar )</h4>
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tbody><tr>
		                  <th>No</th>
		                  <th>Nama Dokumen</th>
		                  <th class="pull-right">Action</th>
		                </tr>
		                <?php $i = 1; ?>
		                @foreach( $raw_notulen as $raw )
		                <tr>
		                  <td>{{$i}}</td>
		                  <td>{{ end($raw) }}</td>
		                  <td class="pull-right">
		                  	<a href="{{ asset(implode('/',$raw)) }}" download="{{end($raw)}}" class="btn btn-sm btn-success">Unduh</a>
												@if($role->notulen->d == true)
												<a data-target="#raw{{ $i }}" data-toggle="modal" class="btn btn-sm btn-danger">Hapus</a>
												<div class="modal fade" id="raw{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							        	  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus {{ end($raw) }} ?</h4>
												      </div>
													    <div class="modal-footer">
																<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
								    						<a href="{{route('notulen.image.delete',\Crypt::encrypt( implode('/',$raw) ) )."?loc=sk&field=img_notulen&id=".$data->id }}" class="btn btn-md btn-danger">Hapus</a>
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
							<label>Upload Notulen</label>
						</div>
						<div class="col-sm-12">
							<div id="UploadNotulen">
		            <input type="button" id="button" />
		            <p id="queuestatus-4-3-2-1" ></p>
		            <ol id="log-29"></ol>
		         	</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Data Notulen</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6">
							<label>Tanggal</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['tanggal'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Waktu</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['waktu'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Tempat</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['tempat'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Agenda</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['agenda'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Pemimpin</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['pemimpin'] }}</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<label>Notulis</label>
						</div>
						<div class="col-sm-6">
							<p>{{ $data['notulis'] }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@if($data['img_notulen'])
		<div class="col-md-4">
			<div class="alert alert-info alert-dismissible">
        <h4><i class="icon fa fa-info"></i> Info Nama Folder</h4>
        {{ str_replace(':', '.', $data['created_at']) }}
      </div>
		</div>
		@endif
		<div class="col-md-8">
			<div class="box">
				<div class="box-header with-border">
					@if($role->notulen->c == true)
					<h3 class="box-title">Tambah Bukti Dokumen Daftar Hadir</h3>
					@endif
				</div>
				<div class="box-body">
					<div class="form-group" id="SK">
						@if( $data['img_daftar_hadir'] )
						@if($role->notulen->c == true)
						<div class="col-sm-12">
							<label>Upload Daftar Hadir</label>
						</div>
						<div class="col-sm-12">
							<div id="DaftarHadir">
		            <input type="button" id="button" />
		            <p id="queuestatus-4-3-2-1" ></p>
		            <ol id="log-30"></ol>
		         	</div>
						</div>
						@endif
						<div class="row">
							@if( isset($image_daftar_hadir) && $image_daftar_hadir )
							<div class="col-md-12">
								<h4>Dokumen Gambar ( png, jpg, jpeg )</h4>
								<hr>
								<?php $i=0; ?>
								@foreach( $image_daftar_hadir as $sk )
								<div class="col-md-2">
									<a data-target="#dh{{ $i }}" data-toggle="modal">
						    		<img src="{{ asset($sk) }}" class="img-responsive" style="margin:5px;height:60px;widht:100px;">
				        	</a>
				        	<div class="modal fade" id="dh{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				        	  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-body">
									      	<img src="{{ asset($sk)}}" class="img-responsive">
									      </div>
										    <div class="modal-footer">
												@if($role->notulen->d == true)
								    			<a href="{{route('notulen.image.delete',\Crypt::encrypt( $sk ) )."?loc=sk&field=img_daftar_hadir&id=".$data->id }}" class="btn btn-md btn-danger">Hapus Gambar</a>
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
							@if( isset($pdf_daftar_hadir) && $pdf_daftar_hadir )
							<div class="col-md-12">
								<h4>Dokumen Lainnya ( Selain Gambar )</h4>
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tbody><tr>
		                  <th>No</th>
		                  <th>Nama Dokumen</th>
		                  <th class="pull-right">Action</th>
		                </tr>
		                <?php $i = 1; ?>
		                @foreach( $pdf_daftar_hadir as $file )
		                <tr>
		                  <td>{{$i}}</td>
		                  <td>{{ end($file) }}</td>
		                  <td class="pull-right">
		                  	<a href="{{ asset(implode('/',$file)) }}" class="btn btn-sm btn-info view-pdf">View</a>
		                  	<a href="{{ asset(implode('/',$file)) }}" download="{{end($file)}}" class="btn btn-sm btn-success">Unduh</a>
												@if($role->notulen->d == true)
												<a data-target="#pdf_dh{{ $i }}" data-toggle="modal" class="btn btn-sm btn-danger">Hapus</a>
												<div class="modal fade" id="pdf_dh{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							        	  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus {{ end($file) }} ?</h4>
												      </div>
													    <div class="modal-footer">
																<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
								    						<a href="{{route('notulen.image.delete',\Crypt::encrypt( implode('/',$file) ) )."?loc=sk&field=img_daftar_hadir&id=".$data->id }}" class="btn btn-md btn-danger">Hapus</a>
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
							@if( isset($raw_daftar_hadir) && $raw_daftar_hadir )
							<div class="col-md-12">
								<h4>Dokumen Lainnya ( Selain Gambar )</h4>
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tbody><tr>
		                  <th>No</th>
		                  <th>Nama Dokumen</th>
		                  <th class="pull-right">Action</th>
		                </tr>
		                <?php $i = 1; ?>
		                @foreach( $raw_daftar_hadir as $file )
		                <tr>
		                  <td>{{$i}}</td>
		                  <td>{{ end($file) }}</td>
		                  <td class="pull-right">
		                  	<a href="{{ asset(implode('/',$file)) }}" download="{{end($file)}}" class="btn btn-sm btn-success">Unduh</a>
												@if($role->notulen->d == true)
												<a data-target="#raw_dh{{ $i }}" data-toggle="modal" class="btn btn-sm btn-danger">Hapus</a>
												<div class="modal fade" id="raw_dh{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							        	  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<h4 class="modal-title" id="myModalLabel">Yakin ingin menghapus {{ end($file) }} ?</h4>
												      </div>
													    <div class="modal-footer">
																<button type="button" class="btn btn-default btn-md" data-dismiss="modal" aria-label="Close">Batal</button>
								    						<a href="{{route('notulen.image.delete',\Crypt::encrypt( implode('/',$file) ) )."?loc=sk&field=img_daftar_hadir&id=".$data->id }}" class="btn btn-md btn-danger">Hapus</a>
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
							<label>Upload Notulen</label>
						</div>
						<div class="col-sm-12">
							<div id="DaftarHadir">
		            <input type="button" id="button" />
		            <p id="queuestatus-4-3-2-1" ></p>
		            <ol id="log-30"></ol>
		         	</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
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
	$('#UploadNotulen').swfupload({
		upload_url: "../create-upload/{{\Crypt::encrypt($data->id)}}/{{\Crypt::encrypt($path)}}",
		file_post_name: 'UploadNotulen',
		file_size_limit : "1024000",
		file_types : "*.jpg;*.png;*.jpeg;*.pdf;*.doc;*.docx;*.ppt;*.pptx;*.xls;*.xlsx",
		file_types_description : "Image files",
		file_upload_limit : 999,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
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
			$('#log-29').append(listitem);
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
			$('#log-29 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-29 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-29 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-29 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-29 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-29 li#'+file.id);
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

$(function(){
	$('#DaftarHadir').swfupload({
		upload_url: "../create-upload/{{\Crypt::encrypt($data->id)}}/{{\Crypt::encrypt($path)}}",
		file_post_name: 'DaftarHadir',
		file_size_limit : "1024000",
		file_types : "*.jpg;*.png;*.jpeg;*.pdf;*.doc;*.docx;*.ppt;*.pptx;*.xls;*.xlsx",
		file_types_description : "Image files",
		file_upload_limit : 999,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
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
			$('#log-30').append(listitem);
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
			$('#log-30 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-30 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-30 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-30 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-30 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-30 li#'+file.id);
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