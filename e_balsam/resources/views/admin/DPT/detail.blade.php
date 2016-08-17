@extends( 'admin.layout.layout' )
@section( 'content' )
<section class="content-header">
  <h1>Detail Pembebasan Tanah </h1><small>Detail Data</small>
  <ol class="breadcrumb">
    <li><a href="{{route('system.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('dpt.index')}}"></i> DPT</a></li>
    <li class="active">Detail Data</li>
  </ol>
</section>

<section class="content">
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
  <form action="{{ route( 'dpt.update.post', \Crypt::encrypt( $detail->id ) ) }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
  <input disabled="" type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="row">

      <div class="col-lg-6" id="pemohon">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pemohon</h3> 
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-4">
                <label for="nama">Nama Lengkap</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{$detail->nama}}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="ktp_passport" id="ktp_passport_label">No. @if($detail->kewarganegaraan == "WNI") KTP @else Passport @endif</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" maxlength="22" min="0" name="ktp_passport" class="form-control" id="ktp_passport" placeholder="Nomor @if($detail->kewarganegaraan == 'WNI') KTP @else Passport @endif / Passport" maxlength="22" value="{{$detail->ktp_passport}}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="masa_berlaku_ktp_passport" id="masaberlaku_ktp_passport_label">Masa Berlaku @if($detail->kewarganegaraan == "WNI") KTP @else Passport @endif</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="date" name="masa_berlaku_ktp_passport" class="form-control" id="masa_berlaku_ktp_passport" value="{{$detail->masa_berlaku_ktp_passport}}" data-toggle="tooltip" title="Kosongkan Jika Menggunakan 'E-KTP', maka masa berlaku KTP akan dianggap Seumur Hidup">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="pekerjaan">Pekerjaan</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" value="{{$detail->pekerjaan}}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="status_kawin">Status Perkawinan</label>
              </div>
              <div class="col-sm-8">
                <select disabled="" class="form-control" name="status_kawin">
                  <option></option>
                  <option @if( $detail->status_kawin == "Kawin" ) selected="" @endif>Kawin</option>
                  <option @if( $detail->status_kawin == "Belum Kawin" ) selected="" @endif>Belum Kawin</option>
                  <option @if( $detail->status_kawin == "Cerai" ) selected="" @endif>Cerai</option>
                  <option @if( $detail->status_kawin == "Cerai Mati" ) selected="" @endif>Cerai Mati</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="kewarganegaraan">Kewarganegaraan</label>
              </div>
              <div class="col-sm-8">
                <select disabled="" class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                  <option value="null"></option>
                  <option @if( $detail->kewarganegaraan == "WNI" ) selected="" @endif value="WNI">WNI</option>
                  <option @if( $detail->kewarganegaraan == "WNA" ) selected="" @endif value="WNA">WNA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="ktp">Alamat</label>
              </div>
              <div class="col-sm-8">
                <textarea disabled="" name="alamat" class="form-control">{{$detail->alamat}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
              </div>
              <div class="col-sm-8">
                <select disabled="" class="form-control" name="jk" id="jk">
                  <option></option>
                  <option @if( $detail->jk == "Laki-Laki" ) selected="" @endif value="WNI" value="Laki-Laki">Laki-laki</option>
                  <option @if( $detail->jk == "Perempuan" ) selected="" @endif value="WNI" value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>

      <div class="col-lg-6" id="keluarga">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Keluarga</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_nama">Nama Suami / Istri</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="keluarga_nama" class="form-control" id="keluarga_nama" placeholder="Nama Keluarga" value="{{$detail->keluarga_nama}}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_ktp_passport" id="keluarga_ktp_passport">No. @if($detail->keluarga_kewarganegaraan == "WNI") KTP @else Passport @endif</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" maxlength="22" min="0" name="keluarga_ktp_passport" class="form-control" id="keluarga_ktp_passport" placeholder="Nomor KTP / Passport" value="{{$detail->keluarga_ktp_passport}}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_masa_berlaku_ktp_passport" id="keluarga_masa_berlaku_ktp_passport">Masa Berlaku @if($detail->keluarga_kewarganegaraan == "WNI") KTP @else Passport @endif</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="date" name="keluarga_masa_berlaku_ktp_passport" class="form-control" id="keluarga_masa_berlaku_ktp_passport" data-toggle="tooltip" title="Kosongkan Jika Menggunakan 'E-KTP', maka masa berlaku KTP akan dianggap Seumur Hidup">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_pekerjaan">Pekerjaan</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="keluarga_pekerjaan" class="form-control" id="keluarga_pekerjaan" placeholder="Pekerjaan Keluarga" value="{{$detail->keluarga_pekerjaan}}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_status_kawin">Status Perkawinan</label>
              </div>
              <div class="col-sm-8">
                <select disabled="" class="form-control" name="keluarga_status_kawin">
                  <option></option>
                  <option @if( $detail->keluarga_status_kawin =="Kawin" ) selected="" @endif>Kawin</option>
                  <option @if( $detail->keluarga_status_kawin =="Belum Kawin" ) selected="" @endif>Belum Kawin</option>
                  <option @if( $detail->keluarga_status_kawin =="Cerai" ) selected="" @endif>Cerai</option>
                  <option @if( $detail->keluarga_status_kawin =="Cerai Mati" ) selected="" @endif>Cerai Mati</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_kewarganegaraan">Kewarganegaraan</label>
              </div>
              <div class="col-sm-8">
                <select disabled="" class="form-control" name="keluarga_kewarganegaraan" id="keluarga_kewarganegaraan">
                  <option value="null"></option>
                  <option @if( $detail->keluarga_kewarganegaraan == "WNI" ) selected="" @endif value="WNI">WNI</option>
                  <option @if( $detail->keluarga_kewarganegaraan == "WNA" ) selected="" @endif value="WNA">WNA</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_alamat">Alamat</label>
              </div>
              <div class="col-sm-8">
                <textarea disabled="" name="keluarga_alamat" class="form-control">{{$detail->keluarga_alamat}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_jk">Jenis Kelamin</label>
              </div>
              <div class="col-sm-8">
                <select disabled="" class="form-control" name="keluarga_jk" id="keluarga_jk">
                  <option></option>
                  <option @if( $detail->keluarga_jk == "Laki-Laki" ) selected="" @endif value="Laki-Laki">Laki-laki</option>
                  <option @if( $detail->keluarga_jk == "Perempuan" ) selected="" @endif value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12" id="administrasi">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data Administrasi</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <div class="col-md-2">
                <label>Alas Hak</label>
              </div>
              <div class="input-group col-md-9">
                <select disabled="" class="form-control" name="alas_hak" id="alas_hak">
                  <option></option>
                  @foreach( $alas as $alashak )
                  <option @if( $detail->alas_hak_id == $alashak->id ) selected="" @endif value="{{ $alashak->id }}">{{ $alashak->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-2">
                <label>Nomor Alas Hak</label>
              </div>
              <div class="input-group col-md-9">
                <input disabled="" class="form-control" placeholder="Nomor Alas Hak" name="nomor_alas_hak" value="{{$detail->nomor_alas_hak}}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-2">
                <label>Nomor Peta Bidang</label>
              </div>
              <div class="input-group col-md-9">
                <input disabled="" class="form-control" placeholder="Nomor Peta Bidang" name="nomor_peta_bidang" value="{{$detail->nomor_peta_bidang}}">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-2">
                <label>Atas Nama Bidang</label>
              </div>
              <div class="input-group col-md-9">
                <input disabled="" class="form-control" placeholder="Atas Nama Bidang" name="atas_nama_bidang" value="{{$detail->atas_nama_bidang}}">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-6 tanah" id="tanah">
        <div class="box box-primary">
          <div class="box-header">
              <div class="col-md-12">
                <h4>Data Tanah</h4>
              </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="col-md-12">
                <label>Luas Tanah</label>
                <div class="input-group">
                  <input disabled="" type="number" min="0" name="luas_tanah" class="form-control format" id="luas_tanah" placeholder="Luas Tanah" required="required" value="{{ $detail->luas_tanah }}">
                  <span class="input-group-addon">M2</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Luas Tanah Terkena Tol</label>
                <div class="input-group">
                  <input disabled="" type="number" min="0" name="luas_terkena" class="form-control" id="luas_terkena" placeholder="Luas Terkena Tol" required="required" value="{{ $detail->luas_terkena }}">
                  <span class="input-group-addon">M2</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Harga Tanah Permeter2</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input disabled="" type="number" min="0" name="harga_tanah" class="form-control" id="harga_tanah" placeholder="Harga Tanah" required="required" value="{{ $detail->harga_tanah }}">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Jumlah Tanah Terkena Dibayar</label>
                <div class="row">
                  <div class="col-md-11">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                        <input disabled="" type="number" min="0" name="total_harga" class="form-control" id="total_harga" placeholder="Jumlah Tanah Dibayar" disabled value="{{ $detail->total_harga }}">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="col-md-1">
                  <a class="pull-right btn btn-sm btn-warning" data-target="#jumlahtanah" data-toggle="modal">?</a>
                    <div class="modal fade" id="jumlahtanah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Kenapa Data Ini Tidak Bisa Saya isi?</h4>
                          </div>
                          <div class="modal-body">
                            Data ini akan terisi otomatis oleh hasil <b>perkalian</b> dari Data <code>"Luas Tanah Terkena Tol"</code> dan Data <code>"Harga Tanah Permeter2"</code>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-12">
                <h4>Data Bangunan</h4>
              </div>
              <div class="col-md-12">
                <label>Nilai Ganti Bangunan</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input disabled="" type="number" min="0" name="harga_bangunan" class="form-control" id="harga_bangunan" placeholder="Nilai Ganti Bangunan" required="required" value="{{ $detail->harga_bangunan }}">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-12">
                <h4>Data Tanaman</h4>
              </div>
              <div class="col-md-12">
                <label>Nilai Ganti tanaman</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input disabled="" type="number" min="0" name="harga_tanaman" class="form-control" id="harga_tanaman" placeholder="Nilai Ganti Tanaman" required="required" value="{{ $detail->harga_tanaman }}">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-12">
                <label>Total Ganti Rugi Tanah</label>
                <div class="row">
                  <div class="col-md-11">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                        <input disabled="" type="number" min="0" name="total_ganti_rugi" id="total_ganti_rugi" class="form-control" id="total_ganti_rugi" placeholder="Jumlah Tanah Keseluruhan Dibayar" disabled value="{{ $detail->total_ganti_rugi }}">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="col-md-1">
                  <a class="pull-right btn btn-sm btn-warning" data-target="#jumlahtanahkeseluruhandibayar" data-toggle="modal">?</a>
                    <div class="modal fade" id="jumlahtanahkeseluruhandibayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Kenapa Data Ini Tidak Bisa Saya isi?</h4>
                          </div>
                          <div class="modal-body">
                            Data ini akan terisi otomatis oleh hasil <b>pertambahan</b> dari Data <code>"Jumlah Tanah Terkena Dibayar"</code>, Data <code>"Nilai Ganti Bangunan"</code> dan Data <code>"Nilai Ganti tanaman"</code>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
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

      <div class="col-lg-6" id="tanah-sisa">
        <div class="box box-primary">
          <div class="box-header">
            <a class="pull-right btn btn-sm btn-warning" data-target="#helpTanahSisa" data-toggle="modal">?</a>
            <div class="modal fade" id="helpTanahSisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Kenapa Form Ini Muncul?</h4>
                  </div>
                  <div class="modal-body">
                    Form ini muncul dikarenakan ada sisa dalam pengurangan Data <code>"Luas Tanah"</code> dan Data <code>"Luas Tanah Terkena Tol"</code>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <h4>Data Sisa Tanah</h4>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="col-md-12">
                <label>Luas Tanah Sisa</label>
                <div class="row">
                  <div class="col-md-10">
                    <div class="input-group">
                      <input disabled="" type="number" min="0" name="luas_tanah_sisa" class="form-control" id="luas_tanah_sisa" placeholder="Luas Tanah Sisa" disabled value="{{$detail->luas_tanah_sisa}}">
                      <span class="input-group-addon">M2</span>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <a class="pull-right btn btn-sm btn-warning" data-target="#helpLuasTanahSisa" data-toggle="modal">?</a>
                    <div class="modal fade" id="helpLuasTanahSisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Kenapa Data Ini Tidak Bisa Saya isi?</h4>
                          </div>
                          <div class="modal-body">
                            Data ini akan terisi otomatis oleh hasil <b>pengurangan</b> dari Data <code>"Luas Tanah"</code> dan Data <code>"Luas Tanah Terkena Tol"</code>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Kondisi Tanah Sisa</label>
                <input disabled="" type="text" name="kondisi_tanah" class="form-control" placeholder="Kondisi Tanah" value="{{$detail->kondisi_tanah}}">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Harga Tanah Sisa Permeter2</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input disabled="" type="number" min="0" name="harga_tanah_sisa" class="form-control" id="harga_tanah_sisa" placeholder="Harga Tanah" value="{{$detail->harga_tanah_sisa}}">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Jumlah Tanah Sisa Terkena Dibayar</label>
                <div class="row">
                  <div class="col-md-10">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                        <input disabled="" type="number" min="0" name="total_harga_sisa" class="form-control" id="total_harga_sisa" placeholder="Jumlah Tanah Sisa Dibayar" disabled value="{{$detail->total_harga_sisa}}">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <a class="pull-right btn btn-sm btn-warning" data-target="#helpjumlahtanahsisadibayar" data-toggle="modal">?</a>
                    <div class="modal fade" id="helpjumlahtanahsisadibayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Kenapa Data Ini Tidak Bisa Saya isi?</h4>
                          </div>
                          <div class="modal-body">
                            Data ini akan terisi otomatis oleh hasil <b>perkalian</b> dari Data <code>"Luas Tanah Sisa"</code> dan Data <code>"Harga Tanah Sisa Permeter2"</code>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-12">
                <h4>Data Bangunan Tanah Sisa</h4>
              </div>
              <div class="col-md-12">
                <label>Nilai Ganti Kerugian Bangunan Tanah Sisa</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input disabled="" type="number" name="harga_bangunan_sisa" id="harga_bangunan_sisa" class="form-control" placeholder="Nilai Ganti Kerugian Bangunan" value="{{$detail->harga_bangunan_sisa}}">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-12">
                <h4>Data Tanaman Tanah Sisa</h4>
              </div>
              <div class="col-md-12">
                <label>Nilai Ganti Kerugian Tanaman Tanah Sisa</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input disabled="" type="number" name="harga_tanaman_sisa" id="harga_tanaman_sisa" class="form-control" placeholder="Nilai Ganti Kerugian Tanaman" value="{{$detail->harga_tanaman_sisa}}">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-12">
                <label>Total Ganti Rugi Tanah Sisa</label>
                <div class="col-md-10">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                      <input disabled="" type="text" name="total_ganti_rugi_sisa" id="total_ganti_rugi_sisa" class="form-control" placeholder="Total Ganti Rugi Tanah Sisa" disabled="" value="{{$detail->total_ganti_rugi_sisa}}">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
                <div class="col-md-1">
                  <a class="pull-right btn btn-sm btn-warning" data-target="#helptotalgantirugitanahsisa" data-toggle="modal">?</a>
                  <div class="modal fade" id="helptotalgantirugitanahsisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Kenapa Data Ini Tidak Bisa Saya isi?</h4>
                        </div>
                        <div class="modal-body">
                          Data ini akan terisi otomatis oleh hasil <b>pertambahan</b> dari Data <code>"Jumlah Tanah Sisa Terkena Dibayar"</code>, Data <code>"Nilai Ganti Bangunan Tanah Sisa"</code> dan Data <code>"Nilai Ganti Tanaman Tanah Sisa"</code>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
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

      <div class="col-lg-12" id="detail-pembayaran">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Pembayaran & Administrasi Tanah</h3> 
          </div><!-- /.box-header -->
          <div class="box-body">

            <div class="form-group">
              <div class="col-md-12">
                <label>Total Ganti Rugi</label>
                <div class="row">
                  <div class="col-md-11">
                    <div class="input-group">
                      <span class="input-group-addon">Rp.</span>
                        <input disabled="" type="text" name="total_ganti_rugi_semua" id="total_ganti_rugi_semua" class="form-control" placeholder="Total Ganti Rugi" disabled="" value="{{ $detail->total_ganti_rugi + $detail->total_ganti_rugi_sisa }}">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <a class="pull-right btn btn-sm btn-warning" data-target="#helptotalsemua" data-toggle="modal">?</a>
                    <div class="modal fade" id="helptotalsemua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Kenapa Data Ini Tidak Bisa Saya isi?</h4>
                          </div>
                          <div class="modal-body">
                            Data ini akan terisi otomatis oleh hasil <b>pertambahan</b> dari Data <code>"Total Ganti Rugi Tanah"</code>dan Data <code>"Total Ganti Rugi Tanah Sisa"</code>
                            <br>
                            <br>
                            <b></b>Jika Tidak ada <code>"Tanah Sisa"</code>, Data ini akan terisi sama dengan Data <code>"Total Ganti Rugi Tanah"</code>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <div class="col-md-6">
                <label>Tanggal Pembayaran</label>
                <input disabled="" type="date" name="tanggal_pembayaran" class="form-control" value="{{$detail->tanggal_pembayaran}}">
              </div>
              <div class="col-md-6">
                <label>Status</label>
                <select disabled="" class="form-control" name="dibayar" id="dibayar">
                  <option @if( $detail->dibayar == "sudah" ) selected="" @endif value="sudah">Sudah Dibayar</option>
                  <option @if( $detail->dibayar == "belum" ) selected="" @endif value="belum">Belum Dibayar</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="kelurahan" name="kelurahanlabel" id="kelurahanlabel" class="control-label">Desa/Kelurahan</label>
                    <select disabled="" name="kelurahan" id="kelurahan" class="form-control">
                      <option value="kosong"></option>
                      @foreach( $desa as $des )
                      <option @if( $detail->kelurahan_id == $des->id ) selected="" @endif value="{{$des->id}}"> {{ $des->name }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="kecamatan" name="kecamatanlabel" id="kecamatanlabel" class="control-label">Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-control" disabled>
                      <option>{{$kecamatan->name}}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="kabupaten" name="kabupatenlabel" id="kabupatenlabel" class="control-label">Kabupaten/Kota</label>
                    <select name="kabupaten" id="kabupaten" class="form-control" disabled>
                      <option>{{$kota->name}}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="provinsi" name="provinsilabel" id="provinsilabel"  class="control-label">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control" disabled>
                      <option>{{$provinsi->name}}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="status-tanah" class="control-label">Status Pembayaran Tanah</label>
                    <select disabled="" name="status-tanah" id="status-tanah" class="form-control">
                      <option @if( $detail->status_pembayaran == 'biasa' ) selected="" @endif value="biasa">Pembayaran Biasa</option>
                      <option @if( $detail->status_pembayaran == 'fasos' ) selected="" @endif value="fasos">Fasos / Fasum</option>
                      <option @if( $detail->status_pembayaran == 'wakaf' ) selected="" @endif value="wakaf">Wakaf</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>

      <div class="col-md-12" id="fasos">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Fasos/Fasum</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-3">
                <label for="nama">Bentuk Fasos/Fasum</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="bentuk_fasos" class="form-control" id="Fasos" placeholder="Bentuk Fasos/Fasum">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Status</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="status_fasos" class="form-control" id="status" placeholder="Status">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="jenis_kelamin">Bentuk Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="bentuk_pergantian_fasos" class="form-control" id="bentuk_pergantian" placeholder="Bentuk Pergantian">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Penerima Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="penerima_pergantian_fasos" class="form-control" id="penerima_pergantian" placeholder="Penerima Pergantian">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12" id="wakaf">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Wakaf</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-3">
                <label for="nama">Bentuk Wakaf</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="bentuk_wakaf" class="form-control" id="wakaf" placeholder="Bentuk Wakaf">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Status</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="status_wakaf" class="form-control" id="status2" placeholder="Status">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Nadzir</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="nadzir_wakaf" class="form-control" id="nadzir" placeholder="Nadzir">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="jenis_kelamin">Bentuk Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="bentuk_pergantian_wakaf" class="form-control" id="bentuk_pergantian2" placeholder="Bentuk Pergantian">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Penerima Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input disabled="" type="text" name="penerima_pergantian_wakaf" class="form-control" id="penerima_pergantian2" placeholder="Penerima Pergantian">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>

  <!-- JS FOR MULTIPLE UPLOAD -->
@section('script')
<script type="text/javascript">
  var fnf = document.getElementsByClassName("format");
  fnf.addEventListener('keyup', function(evt){
      var n = parseInt(this.value.replace(/\D/g,''),10);
      fnf.value = n.toLocaleString();
  }, false);
</script>
<script>
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>
<script type="text/javascript" src="{{asset('js/dpt.js')}}"></script>
@if( \Route::currentRouteName() == 'dpt.update' )
  @if( $detail->luas_tanah - $detail->luas_terkena != 0 )
  <script type="text/javascript">
    $( '#tanah-sisa' ).show();
  </script>
  @endif

<script type="text/javascript">
  $( '#provinsi' ).show();
  $( '#kabupaten' ).show();
  $( '#kecamatan' ).show();
  $( '#provinsilabel' ).show();
  $( '#kabupatenlabel' ).show();
  $( '#kecamatanlabel' ).show();
</script>
@endif

@if( $detail->status_pembayaran == 'fasos' )
<script type="text/javascript">
  $( '#fasos' ).show();
</script>
@elseif ( $detail->status_pembayaran == 'wakaf' )
<script type="text/javascript">
  $( '#wakaf' ).show();
</script>
@endif

@endsection
@endsection