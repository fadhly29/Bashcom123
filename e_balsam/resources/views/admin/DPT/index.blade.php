@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->dpt->r == true)
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Index Detail Pembebasan Tanah</h3>
		</div>

		<div class="box-body">
	        <div class="tab-content">
                <div class="box-body">
                	<div class="row">
						<div class="col-xs-12 table-responsive">
						  <table class="table table-striped" id="example1">
						    <thead>
								@if($role->dpt->c == true)
						    	<tr>
						    		<td><a href="{{ route('dpt.create') }}" class="btn btn-primary btn-md">Add New</td>
						    		<td>
						    			<div class="form-group">
							    			<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
												    <option @if( \Input::get( 'sort' ) == "all" ) selected="" @endif value="?sort=all">Tampilkan Semua</option>
												    <option @if( \Input::get( 'sort' ) == "biasa" ) selected="" @endif value="?sort=biasa">Pembayaran Biasa</option>
												    <option @if( \Input::get( 'sort' ) == "fasos" ) selected="" @endif value="?sort=fasos">Fasos / Fasum</option>
												    <option @if( \Input::get( 'sort' ) == "wakaf" ) selected="" @endif value="?sort=wakaf">Wakaf</option>
												</select>
						    			</div>
						    		</td>
						    	</tr>
						    	@endif
							    <tr>
							        <th style="width:1px;">No</th>
							        <th style="width:30px;">Nama</th>
							        <th>Alamat</th>
							        <th>Luas Terkena</th>
							        <th>Total Ganti Tanah</th>
							        <th>Harga Tanaman</th>
							        <th>Harga Bangunan</th>
							        <th>Total Ganti Rugi</th>
							        <th>Tanggal Pembayaran</th>
							        <th>Action</th>
							    </tr>
						    </thead>
						    <tbody>
						    <?php $no = 1; ?>
						    @if( $detail != null )
						    @foreach ($detail as $data)
						      <tr>
						        <td>{{$no}}</td>
						        <td>{{ $data->nama }}</td>
						        <td>{{ $data->kelurahan }}</td>
						        <td>{{ $data->luas_terkena}} m2</td>
						        <td>Rp.{{ number_format($data->total_harga)}}</td>
						        <td>Rp.{{ number_format($data->harga_tanaman)}}</td>
						        <td>Rp.{{ number_format($data->harga_bangunan)}}</td>
						        <td>Rp.{{ number_format($data->total_ganti_rugi )}}</td>
						        <td>{{ $data->tanggal_pembayaran }}</td>
						        <td>
											@if($role->dpt->u == true)
						        	<a href="{{ route('dpt.update', \Crypt::encrypt( $data->id )) }}" class="btn btn-warning btn-sm" title="Pebaharui"><i class="fa fa-edit"></i></a>
						        	@endif
						        	<a href="{{ route('dpt.detail', \Crypt::encrypt( $data->id )) }}" class="btn btn-info btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
						        	<a href="{{ route('dpt.create.upload', \Crypt::encrypt( $data->id )) }}" class="btn btn-success btn-sm" title="Detail Gambar"><i class="fa fa-eye"></i></a>
						        	<!-- <a href="{{ route('dpt.detail', \Crypt::encrypt( $data->id )) }}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-eye"></i></a> -->
											@if($role->dpt->d == true)
						        	<a href="{{ route('dpt.delete', \Crypt::encrypt( $data->id )) }}" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-times"></i></a>
						        	@endif
						        </td>
						      </tr>
						      <?php $no++; ?>
						    @endforeach
						    @else
						    	<tr>
						    		<td colspan="10">Belum ada data tersedia</td>
						    	</tr>
						   	@endif
						    </tbody>
						    <tfoot>
						    	
						    </tfoot>
						  </table>
						</div><!-- /.col -->
					</div><!-- /.row -->
                </div>
	        </div>
		</div>


	</div>
</section>
@else
<code>Maaf anda tidak diizinkan melihat halaman ini, mohon hubungi administrator jika anda ingin meminta akses</code>
@endif
@endsection
