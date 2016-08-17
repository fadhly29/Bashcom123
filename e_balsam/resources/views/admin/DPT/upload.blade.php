@extends( 'admin.layout.layout' )
@section( 'content' )

<section class="content">
	<div class="row" id="pemohon">
		<div class="col-lg-12">
			<div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Data Gambar Pemohon</h3>
		    </div>
		    <div class="box-body">
					<div class="col-lg-12" id="upload">
						<div class="box-body">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-12">
											1. KTP Pemohon
											<div class="form-group">
											  <div class="col-sm-12">
										    	@if( $data->img_ktp_pemohon )
										    	<a data-target="#img_ktp_pemohon" data-toggle="modal">
										    		<img src="{{ asset($data->img_ktp_pemohon) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        		</a>
								        		<div class="modal fade" id="img_ktp_pemohon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  		<div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_ktp_pemohon)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_ktp_pemohon ) )."?loc=pemohon&field=img_ktp_pemohon&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													 </div>
								        		</div>
										    	@else
											    <div id="KTPPemohon">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-1"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											2. KTP Suami/Istri
											<div class="form-group">
											  <div class="col-sm-12">
										    	@if( $data->img_ktp_keluarga_pemohon )
										    	<a data-target="#img_ktp_keluarga_pemohon" data-toggle="modal">
										    	<img src="{{ asset($data->img_ktp_keluarga_pemohon) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_ktp_keluarga_pemohon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_ktp_keluarga_pemohon)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_ktp_keluarga_pemohon ) )."?loc=pemohon&field=img_ktp_keluarga_pemohon&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
										    	<div id="KTPKeluarga">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-2"></ol>
										    	</div>
										      @endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											3. Kartu Keluarga
											<div class="form-group">
											  <div class="col-sm-12">
										    @if( $data->img_kartu_keluarga )
										    	<a data-target="#img_kartu_keluarga" data-toggle="modal">
										    	<img src="{{ asset($data->img_kartu_keluarga) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_kartu_keluarga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_kartu_keluarga)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_kartu_keluarga ) )."?loc=pemohon&field=img_kartu_keluarga&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="KartuKeluarga">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-3"></ol>
											    </div>
													@endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											4. Surat Keterangan Domisili
											<div class="form-group">
											  <div class="col-sm-12">
										    @if( $data->img_surat_keterangan_domisili )
										    	<a data-target="#img_surat_keterangan_domisili" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat_keterangan_domisili) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat_keterangan_domisili" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat_keterangan_domisili)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_keterangan_domisili ) )."?loc=pemohon&field=img_surat_keterangan_domisili&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="SKDomisili">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-4"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											5. Akte Kelahiran Pemohon
											<div class="form-group">
											  <div class="col-sm-12">
										    	@if( $data->img_akte_kelahiran_pemohon )
										    	<a data-target="#img_akte_kelahiran_pemohon" data-toggle="modal">
										    	<img src="{{ asset($data->img_akte_kelahiran_pemohon) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_akte_kelahiran_pemohon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_akte_kelahiran_pemohon)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_akte_kelahiran_pemohon ) )."?loc=pemohon&field=img_akte_kelahiran_pemohon&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="AktePemohon">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-5"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											6. Surat Persetujuan Keluarga
											<div class="form-group">
											  <div class="col-sm-12">
										    	@if( $data->img_surat_persetujuan_keluarga )
										    	<a data-target="#img_surat_persetujuan_keluarga" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat_persetujuan_keluarga) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat_persetujuan_keluarga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat_persetujuan_keluarga)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_persetujuan_keluarga ) )."?loc=pemohon&field=img_surat_persetujuan_keluarga&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="SPKeluarga">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-6"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
									</div>

									<div class="col-md-6">

										<div class="col-md-12">
											7. Akta Cerai
											<div class="form-group">
											  <div class="col-sm-12">
										    	@if( $data->img_akta_cerai )
										    	<a data-target="#img_akta_cerai" data-toggle="modal">
										    	<img src="{{ asset($data->img_akta_cerai) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_akta_cerai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_akta_cerai)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_akta_cerai ) )."?loc=pemohon&field=img_akta_cerai&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="AkteCerai">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-7"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											8. Surat Kematian
											<div class="form-group">
											  <div class="col-sm-12">
										    	@if( $data->img_surat_kematian )
										    	<a data-target="#img_surat_kematian" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat_kematian) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat_kematian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat_kematian)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_kematian ) )."?loc=pemohon&field=img_surat_kematian&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="SuratKematian">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-8"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>

										<div class="col-md-12">
											9. Surat Kuasa
											<div class="form-group">
											  <div class="col-sm-12">
											    @if( $data->img_surat_kuasa )
										    	<a data-target="#img_surat_kuasa" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat_kuasa) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat_kuasa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat_kuasa)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_kuasa ) )."?loc=pemohon&field=img_surat_kuasa&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="SuratKuasa">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-9"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
										
										<div class="col-md-12">
											10. Surat Kuasa Waris
											<div class="form-group">
											  <div class="col-sm-12">
											    @if( $data->img_surat_kuasa_waris )
										    	<a data-target="#img_surat_kuasa_waris" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat_kuasa_waris) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat_kuasa_waris" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat_kuasa_waris)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_kuasa_waris ) )."?loc=pemohon&field=img_surat_kuasa_waris&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="SKWaris">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-10"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>

										<div class="col-md-12">
											11. Surat Pengampuan
											<div class="form-group">
											  <div class="col-sm-12">
											    @if( $data->img_surat_pengampuan )
										    	<a data-target="#img_surat_pengampuan" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat_pengampuan) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat_pengampuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat_pengampuan)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_pengampuan ) )."?loc=pemohon&field=img_surat_pengampuan&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="SuratPengampuan">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-11"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>

										<div class="col-md-12">
											12. Surat
											<div class="form-group">
											  <div class="col-sm-12">
											    @if( $data->img_surat )
										    	<a data-target="#img_surat" data-toggle="modal">
										    	<img src="{{ asset($data->img_surat) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
								        	</a>
								        	<div class="modal fade" id="img_surat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								        	  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-body">
													      	<img src="{{ asset($data->img_surat)}}" class="img-responsive">
													      </div>
														    <div class="modal-footer">
											    				<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat ) )."?loc=pemohon&field=img_surat&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
														    </div>
													    </div>
													  </div>
								        	</div>
										    	@else
											    <div id="Surat">
											      <input type="button" id="button" />
											      <p id="queuestatus-4-3-2-1" ></p>
											      <ol id="log-12"></ol>
											    </div>
										      @endif
											  </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="tanah">
		<div class="col-md-12">
			<div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Upload Data Pembayaran</h3>
		    </div>
		    <div class="box-body">
		      <div class="form-group">
		        <div class="col-md-6">
		          <div class="col-md-12">
		            1. AlasHak
              	@if( $data->img_alas_hak )
              	<div class="form-group">
              		<?php $i = 0; ?>
	              	@foreach( (json_decode($data->img_alas_hak)) as $alas )
		              <div class="col-sm-4">
		                <div id="AlasHak">
								    	<a data-target="#img_alas_hak_{{$i}}" data-toggle="modal">
								    	<img src="{{ asset($alas) }}" class="img-responsive" alt="User Image" style="margin:5px;height:100px;widht:100px;">
						        	</a>
						        	<div class="modal fade" id="img_alas_hak_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						        	  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-body">
											      	<img src="{{ asset($alas)}}" class="img-responsive">
											      </div>
												    <div class="modal-footer">
												    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $alas ) )."?loc=tanah&field=img_alas_hak&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
												    </div>
											    </div>
											  </div>
						        	</div>
						        </div>
						      </div>
	              	<?php $i++; ?>
				        	@endforeach
						    </div>
		            <div class="col-sm-12">
				        	<input type="button" id="button" />
	                <p id="queuestatus-4-3-2-1" ></p>
	                <ol id="log-16"></ol>
                </div>
					    	@else
					    	<div class="form-group">
		              <div class="col-sm-12">
		                <div id="AlasHak">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-16"></ol>
		                </div>
		              </div>
		            </div>
                @endif
		          </div>

		          <div class="col-md-12">
		            2. Buku Rekening Bank
		            @if( $data->img_rekening )
              	<div class="form-group">
              		<?php $i = 0; ?>
	              	@foreach( (json_decode($data->img_rekening)) as $rekening )
		              <div class="col-sm-4">
		                <div id="Rekening">
								    	<a data-target="#img_rekening_{{$i}}" data-toggle="modal">
								    	<img src="{{ asset($rekening) }}" class="img-responsive" alt="User Image" style="margin:5px;height:100px;widht:100px;">
						        	</a>
						        	<div class="modal fade" id="img_rekening_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						        	  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-body">
											      	<img src="{{ asset($rekening)}}" class="img-responsive">
											      </div>
												    <div class="modal-footer">
												    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $rekening ) )."?loc=tanah&field=img_rekening&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
												    </div>
											    </div>
											  </div>
						        	</div>
						        </div>
						      </div>
	              	<?php $i++; ?>
				        	@endforeach
						    </div>
		            <div class="col-sm-12">
				        	<input type="button" id="button" />
	                <p id="queuestatus-4-3-2-1" ></p>
	                <ol id="log-28"></ol>
                </div>
					    	@else
					    	<div class="form-group">
		              <div class="col-sm-12">
		                <div id="Rekening">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-28"></ol>
		                  </div>
		              </div>
		            </div>
                @endif
		          </div>

		          <div class="col-md-12">
		            3. Nominatif
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_nominatif )
							    	<a data-target="#img_nominatif" data-toggle="modal">
							    	<img src="{{ asset($data->img_nominatif) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_nominatif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_nominatif)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_nominatif ) )."?loc=tanah&field=img_nominatif&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="Nominatif">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-13"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>

		          <div class="col-md-12">
		            4. Kwitansi
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_kwitansi )
							    	<a data-target="#img_kwitansi" data-toggle="modal">
							    	<img src="{{ asset($data->img_kwitansi) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_kwitansi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_kwitansi)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_kwitansi ) )."?loc=tanah&field=img_kwitansi&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="Kwitansi">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-17"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>

		          <div class="col-md-12">
		            5. SPPT
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_SPPT )
							    	<a data-target="#img_SPPT" data-toggle="modal">
							    	<img src="{{ asset($data->img_SPPT) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_SPPT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_SPPT)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_SPPT ) )."?loc=tanah&field=img_SPPT&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="SPPT">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-18"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>

		          <div class="col-md-12">
		            6. STTS
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_STTS )
							    	<a data-target="#img_STTS" data-toggle="modal">
							    	<img src="{{ asset($data->img_STTS) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_STTS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_STTS)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_STTS ) )."?loc=tanah&field=img_STTS&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="STTS">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-19"></ol>
	                	</div>
	                  @endif
		              </div>
		            </div>
		          </div>

		          <div class="col-md-12">
		            7. Surat Pernyataan Tidak Sengketa
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_surat_pernyataan_tidak_sengketa )
							    	<a data-target="#img_surat_pernyataan_tidak_sengketa" data-toggle="modal">
							    	<img src="{{ asset($data->img_surat_pernyataan_tidak_sengketa) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_surat_pernyataan_tidak_sengketa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_surat_pernyataan_tidak_sengketa)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_pernyataan_tidak_sengketa ) )."?loc=tanah&field=img_surat_pernyataan_tidak_sengketa&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="SuratPernyataanTidakSengketa">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-20"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="col-md-6">
		          <div class="col-md-12">
		            8. Surat Pernyataan Pengosongan Lahan
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_surat_pernyataan_pengosongan_lahan )
							    	<a data-target="#img_surat_pernyataan_pengosongan_lahan" data-toggle="modal">
							    	<img src="{{ asset($data->img_surat_pernyataan_pengosongan_lahan) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_surat_pernyataan_pengosongan_lahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_surat_pernyataan_pengosongan_lahan)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_pernyataan_pengosongan_lahan ) )."?loc=tanah&field=img_surat_pernyataan_pengosongan_lahan&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="SuratPernyataanPengosonganLahan">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-21"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            9. Peta Bidang ( Max 2 )
              	@if( $data->img_peta_bidang )
              	<div class="form-group">
              		<?php $i = 0; ?>
	              	@foreach( (json_decode($data->img_peta_bidang)) as $bidang )
		              <div class="col-sm-4">
		                <div id="PetaBidang">
								    	<a data-target="#img_peta_bidang_{{$i}}" data-toggle="modal">
								    	<img src="{{ asset($bidang) }}" class="img-responsive" alt="User Image" style="margin:5px;height:100px;widht:100px;">
						        	</a>
						        	<div class="modal fade" id="img_peta_bidang_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						        	  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-body">
											      	<img src="{{ asset($bidang)}}" class="img-responsive">
											      </div>
												    <div class="modal-footer">
												    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $bidang ) )."?loc=tanah&field=img_peta_bidang&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
												    </div>
											    </div>
											  </div>
						        	</div>
						        </div>
						      </div>
	              	<?php $i++; ?>
				        	@endforeach
						    </div>
						    @if( $i <= 1 )
		            <div class="col-sm-12">
				        	<input type="button" id="button" />
	                <p id="queuestatus-4-3-2-1" ></p>
	                <ol id="log-22"></ol>
                </div>
                @endif
					    	@else
					    	<div class="form-group">
		              <div class="col-sm-12">
		                <div id="PetaBidang">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-22"></ol>
		                  </div>
		              </div>
		            </div>
                @endif
		          </div>
		          <div class="col-md-12">
		            10. Surat Pernyataan Jual Beli Tanah
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_surat_pernyataan_jual_beli_tanah )
							    	<a data-target="#img_surat_pernyataan_jual_beli_tanah" data-toggle="modal">
							    	<img src="{{ asset($data->img_surat_pernyataan_jual_beli_tanah) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_surat_pernyataan_jual_beli_tanah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_surat_pernyataan_jual_beli_tanah)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_pernyataan_jual_beli_tanah ) )."?loc=tanah&field=img_surat_pernyataan_jual_beli_tanah&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="SuratPernyataanJualBeliTanah">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-23"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            11. Berita Acara Pemeriksaan Lapangan
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_berita_acara_pemeriksaan_lapangan )
							    	<a data-target="#img_berita_acara_pemeriksaan_lapangan" data-toggle="modal">
							    	<img src="{{ asset($data->img_berita_acara_pemeriksaan_lapangan) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_berita_acara_pemeriksaan_lapangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_berita_acara_pemeriksaan_lapangan)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_berita_acara_pemeriksaan_lapangan ) )."?loc=tanah&field=img_berita_acara_pemeriksaan_lapangan&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="BeritaAcaraPemeriksaanLapangan">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-24"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            12. Berita Acara Penetapan Harga Ganti Rugi
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_ba_penetapan_harga_ganti_rugi )
							    	<a data-target="#img_ba_penetapan_harga_ganti_rugi" data-toggle="modal">
							    	<img src="{{ asset($data->img_ba_penetapan_harga_ganti_rugi) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_ba_penetapan_harga_ganti_rugi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_ba_penetapan_harga_ganti_rugi)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_ba_penetapan_harga_ganti_rugi ) )."?loc=tanah&field=img_ba_penetapan_harga_ganti_rugi&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="BAPenetapanHargaGantiRugi">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-25"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            13. Surat Pelepasan Hak (SPH)
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_surat_pelepasan_hak )
							    	<a data-target="#img_surat_pelepasan_hak" data-toggle="modal">
							    	<img src="{{ asset($data->img_surat_pelepasan_hak) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_surat_pelepasan_hak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_surat_pelepasan_hak)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_pelepasan_hak ) )."?loc=tanah&field=img_surat_pelepasan_hak&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="SPH">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-26"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            14. Surat Pernyataan Persetujuan Harga
		            <div class="form-group">
		              <div class="col-sm-12">
		                @if( $data->img_surat_pernyataan_persetujuan_harga )
							    	<a data-target="#img_surat_pernyataan_persetujuan_harga" data-toggle="modal">
							    	<img src="{{ asset($data->img_surat_pernyataan_persetujuan_harga) }}" class="img-responsive" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_surat_pernyataan_persetujuan_harga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($data->img_surat_pernyataan_persetujuan_harga)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $data->img_surat_pernyataan_persetujuan_harga ) )."?loc=tanah&field=img_surat_pernyataan_persetujuan_harga&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
							    	@else
		                <div id="SuratPernyataanPersetujuanHarga">
		                  <input type="button" id="button" />
		                  <p id="queuestatus-4-3-2-1" ></p>
		                  <ol id="log-27"></ol>
		                </div>
	                  @endif
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
			</div>
		</div>
	</div>
	@if( $data->status_pembayaran == "fasos" )
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-body">

				  <div class="form-group">
				    <div class="col-md-12">
				      <h4>Upload Gambar Backup Dokumen Fasos</h4>
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-md-12">
				      1. Backup Dokumen (Maks 8 Image)
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-md-12">
            	@if( $data->fasos_backup )
            	<div class="form-group">
            		<?php $i = 0; ?>
              	@foreach( (json_decode($data->fasos_backup)) as $alas )
	              <div class="col-sm-4">
				      		<div id="BackupDokumenFasosFasum">
							    	<a data-target="#img_backup_dokumen_fasos_{{$i}}" data-toggle="modal">
							    	<img src="{{ asset($alas) }}" class="img-responsive" alt="User Image" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_backup_dokumen_fasos_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($alas)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $alas ) )."?loc=fasos&field=img_backup_dokumen&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
					        </div>
					      </div>
              	<?php $i++; ?>
			        	@endforeach
					    </div>
	            <div class="col-sm-12">
			        	<input type="button" id="button" />
                <p id="queuestatus-4-3" ></p>
                <ol id="log-14"></ol>
              </div>
				    	@else
				    	<div class="form-group">
	              <div class="col-sm-12">
	                <div id="BackupDokumenFasosFasum">
	                  <input type="button" id="button" />
	                  <p id="queuestatus-4-3" ></p>
	                  <ol id="log-14"></ol>
	                </div>
	              </div>
	            </div>
              @endif
	          </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
	@endif

	@if( $data->status_pembayaran == "wakaf" )
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-body">

				  <div class="form-group">
				    <div class="col-md-12">
				      <h4>Upload Gambar Backup Dokumen Wakaf</h4>
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-md-12">
				      1. Backup Dokumen (Maks 8 Image)
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-12">
				      <div id="BackupDokumenWakaf">
				        <input type="button" id="button" />
				        <p id="queuestatus-4" ></p>
				        <ol id="log-15"></ol>
				      </div>
				    </div>
				    <div class="col-md-12">
            	@if( $data->wakaf_backup )
            	<div class="form-group">
            		<?php $i = 0; ?>
              	@foreach( (json_decode($data->wakaf_backup)) as $alas )
	              <div class="col-sm-4">
				      		<div id="BackupDokumenWakaf">
							    	<a data-target="#img_backup_dokumen_wakaf_{{$i}}" data-toggle="modal">
							    	<img src="{{ asset($alas) }}" class="img-responsive" alt="User Image" style="margin:5px;height:100px;widht:100px;">
					        	</a>
					        	<div class="modal fade" id="img_backup_dokumen_wakaf_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					        	  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-body">
										      	<img src="{{ asset($alas)}}" class="img-responsive">
										      </div>
											    <div class="modal-footer">
											    	<a href="{{route('dpt.img.del',\Crypt::encrypt( $alas ) )."?loc=wakaf&field=img_backup_dokumen&id=".$data->id }}" class="btn btn-md btn-warning">Hapus Gambar</a>
											    </div>
										    </div>
										  </div>
					        	</div>
					        </div>
					      </div>
              	<?php $i++; ?>
			        	@endforeach
					    </div>
	            <div class="col-sm-12">
			        	<input type="button" id="button" />
                <p id="queuestatus-4" ></p>
                <ol id="log-15"></ol>
              </div>
				    	@else
				    	<div class="form-group">
	              <div class="col-sm-12">
	                <div id="BackupDokumenWakaf">
	                  <input type="button" id="button" />
	                  <p id="queuestatus-4" ></p>
	                  <ol id="log-15"></ol>
	                </div>
	              </div>
	            </div>
              @endif
	          </div>
				  </div>

				</div>
			</div>
		</div>
	</div>
	@endif
</section>

@endsection

@section('script')
<script type="text/javascript">
	$(function(){
	$('#KTPPemohon').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'KTPPemohon',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-1').append(listitem);
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
			$('#log-1 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-1 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-1 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-1 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-1 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-1 li#'+file.id);
			item.find('div.progress').css('width', '100%');
			item.find('span.progressvalue').text('100%');
			var pathtofile='<a href="../../uploads/images/'+file.name+'" target="_blank" >view &raquo;</a>';
			item.addClass('success').find('p.status').html('Done!!!');
		})
		.bind('uploadComplete', function(event, file){
			// upload has completed, try the next one in the queue
			$(this).swfupload('startUpload');
		})
	
});	




$(function(){
	$('#KTPKeluarga').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'KTPKeluarga',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-2').append(listitem);
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
			$('#log-2 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-2 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-2 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-2 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-2 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-2 li#'+file.id);
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
	$('#KartuKeluarga').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'KartuKeluarga',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-3').append(listitem);
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
			$('#log-3 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-3 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-3 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-3 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-3 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-3 li#'+file.id);
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
	$('#SKDomisili').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SKDomisili',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-4').append(listitem);
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
			$('#log-4 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-4 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-4 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-4 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-4 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-4 li#'+file.id);
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
	$('#AktePemohon').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'AktePemohon',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-5').append(listitem);
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
			$('#log-5 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-5 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-5 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-5 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-5 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-5 li#'+file.id);
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
	$('#SPKeluarga').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SPKeluarga',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-6').append(listitem);
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
			$('#log-6 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-6 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-6 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-6 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-6 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-6 li#'+file.id);
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
	$('#AkteCerai').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'AkteCerai',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-7').append(listitem);
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
			$('#log-7 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-7 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-7 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-7 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-7 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-7 li#'+file.id);
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
	$('#SuratKematian').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratKematian',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-8').append(listitem);
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
			$('#log-8 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-8 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-8 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-8 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-8 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-8 li#'+file.id);
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
	$('#SuratKuasa').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratKuasa',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-9').append(listitem);
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
			$('#log-9 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-9 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-9 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-9 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-9 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-9 li#'+file.id);
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
	$('#SKWaris').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SKWaris',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-10').append(listitem);
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
			$('#log-10 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-10 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-10 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-10 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-10 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-10 li#'+file.id);
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
	$('#SuratPengampuan').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratPengampuan',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-11').append(listitem);
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
			$('#log-11 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-11 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-11 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-11 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-11 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-11 li#'+file.id);
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
	$('#Surat').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'Surat',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-12').append(listitem);
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
			$('#log-12 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-12 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-12 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-12 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-12 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-12 li#'+file.id);
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
	$('#AlasHak').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'AlasHak',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 100,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-16').append(listitem);
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
			$('#log-16 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-16 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-16 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-16 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-16 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-16 li#'+file.id);
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
	$('#Rekening').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'Rekening',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 100,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-28').append(listitem);
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
			$('#log-28 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-28 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-28 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-28 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-28 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-28 li#'+file.id);
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
	$('#Nominatif').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'Nominatif',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-13').append(listitem);
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
			$('#log-13 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-13 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-13 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-13 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-13 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-13 li#'+file.id);
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
	$('#Kwitansi').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'Kwitansi',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-17').append(listitem);
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
			$('#log-17 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-17 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-17 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-17 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-17 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-17 li#'+file.id);
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
	$('#SPPT').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SPPT',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-18').append(listitem);
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
			$('#log-18 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-18 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-18 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-18 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-18 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-18 li#'+file.id);
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
	$('#STTS').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'STTS',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-19').append(listitem);
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
			$('#log-19 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-19 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-19 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-19 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-19 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-19 li#'+file.id);
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
	$('#SuratPernyataanTidakSengketa').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratPernyataanTidakSengketa',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-20').append(listitem);
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
			$('#log-20 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-20 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-20 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-20 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-20 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-20 li#'+file.id);
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
	$('#SuratPernyataanPengosonganLahan').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratPernyataanPengosonganLahan',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-21').append(listitem);
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
			$('#log-21 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-21 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-21 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-21 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-21 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-21 li#'+file.id);
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
	$('#PetaBidang').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'PetaBidang',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 2 ,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-22').append(listitem);
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
			$('#log-22 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-22 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-22 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-22 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-22 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-22 li#'+file.id);
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
	$('#SuratPernyataanJualBeliTanah').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratPernyataanJualBeliTanah',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-23').append(listitem);
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
			$('#log-23 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-23 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-23 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-23 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-23 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-23 li#'+file.id);
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
	$('#BeritaAcaraPemeriksaanLapangan').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'BeritaAcaraPemeriksaanLapangan',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-24').append(listitem);
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
			$('#log-24 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-24 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-24 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-24 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-24 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-24 li#'+file.id);
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
	$('#BAPenetapanHargaGantiRugi').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'BAPenetapanHargaGantiRugi',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-25').append(listitem);
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
			$('#log-25 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-25 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-25 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-25 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-25 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-25 li#'+file.id);
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
	$('#SPH').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SPH',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-26').append(listitem);
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
			$('#log-26 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-26 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-26 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-26 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-26 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-26 li#'+file.id);
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
	$('#SuratPernyataanPersetujuanHarga').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'SuratPernyataanPersetujuanHarga',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 1,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-27').append(listitem);
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
			$('#log-27 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-27 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-27 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-27 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-27 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-27 li#'+file.id);
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
	$('#BackupDokumenFasosFasum').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'BackupDokumenFasosFasum',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 8,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-14').append(listitem);
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
			$('#log-14 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-14 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-14 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-14 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-14 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-14 li#'+file.id);
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
	$('#BackupDokumenWakaf').swfupload({
		upload_url: "../upload/{{\Crypt::encrypt($data->id)}}",
		file_post_name: 'BackupDokumenWakaf',
		file_size_limit : "1024",
		file_types : "*.jpg;*.png;*.gif",
		file_types_description : "Image files",
		file_upload_limit : 8,
		flash_url : "../../../adminlte/js/multiple_upload/swfupload/swfupload.swf",
		button_image_url : '../../../adminlte/js/multiple_upload//swfupload/wdp_buttons_upload_114x29.png',
		button_width : 114,
		button_height : 29,
		button_placeholder : $('#button')[0],
		debug: false
	})
		.bind('fileQueued', function(event, file){
			var listitem='<li id="'+file.id+'" >'+
				'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
				'<div class="progressbar" ><div class="progress" ></div></div>'+
				'<p class="status" >Pending</p>'+
				'<span class="cancel" >&nbsp;</span>'+
				'</li>';
			$('#log-15').append(listitem);
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
			$('#log-15 li#'+file.id).find('p.status').text('Uploading...');
			$('#log-15 li#'+file.id).find('span.progressvalue').text('0%');
			$('#log-15 li#'+file.id).find('span.cancel').hide();
		})
		.bind('uploadProgress', function(event, file, bytesLoaded){
			//Show Progress
			var percentage=Math.round((bytesLoaded/file.size)*100);
			$('#log-15 li#'+file.id).find('div.progress').css('width', percentage+'%');
			$('#log-15 li#'+file.id).find('span.progressvalue').text(percentage+'%');
		})
		.bind('uploadSuccess', function(event, file, serverData){
			var item=$('#log-15 li#'+file.id);
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