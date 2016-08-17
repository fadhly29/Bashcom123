@extends( 'admin.layout.layout' )
@section( 'content' )
@if($role->dpt->c == true)
<section class="content-header">
  <h1>Detail Pembebasan Tanah </h1><small>Tambah Data Baru</small>
  <ol class="breadcrumb">
    <li><a href="{{route('system.index')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('dpt.index')}}"></i> DPT</a></li>
    <li class="active">Tambah Data</li>
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
  <form action="{{ route( 'dpt.create.post' ) }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="ktp_passport" id="ktp_passport_label">No. KTP</label>
              </div>
              <div class="col-sm-8">
                <input type="text" maxlength="22" min="0" name="ktp_passport" class="form-control" id="ktp_passport" placeholder="Nomor KTP / Passport" maxlength="22">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="masa_berlaku_ktp_passport" id="masaberlaku_ktp_passport_label">Masa Berlaku KTP</label>
              </div>
              <div class="col-sm-8">
                <input type="date" name="masa_berlaku_ktp_passport" class="form-control" id="masa_berlaku_ktp_passport" data-toggle="tooltip" title="Kosongkan Jika Menggunakan 'E-KTP', maka masa berlaku KTP akan dianggap Seumur Hidup">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="pekerjaan">Pekerjaan</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="status_kawin">Status Perkawinan</label>
              </div>
              <div class="col-sm-8">
                <select class="form-control" name="status_kawin">
                  <option></option>
                  <option>Kawin</option>
                  <option>Belum Kawin</option>
                  <option>Cerai</option>
                  <option>Cerai Mati</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="kewarganegaraan">Kewarganegaraan</label>
              </div>
              <div class="col-sm-8">
                <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                  <option value="null"></option>
                  <option value="WNI">WNI</option>
                  <option value="WNA">WNA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="ktp">Alamat</label>
              </div>
              <div class="col-sm-8">
                <textarea name="alamat" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
              </div>
              <div class="col-sm-8">
                <select class="form-control" name="jk" id="jk">
                  <option></option>
                  <option value="Laki-Laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
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
                <input type="text" name="keluarga_nama" class="form-control" id="keluarga_nama" placeholder="Nama Keluarga">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_ktp_passport" id="keluarga_ktp_passport">No. KTP</label>
              </div>
              <div class="col-sm-8">
                <input type="text" maxlength="22" min="0" name="keluarga_ktp_passport" class="form-control" id="keluarga_ktp_passport" placeholder="Nomor KTP / Passport">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_masa_berlaku_ktp_passport" id="keluarga_masa_berlaku_ktp_passport">Masa Berlaku KTP</label>
              </div>
              <div class="col-sm-8">
                <input type="date" name="keluarga_masa_berlaku_ktp_passport" class="form-control" id="keluarga_masa_berlaku_ktp_passport" data-toggle="tooltip" title="Kosongkan Jika Menggunakan 'E-KTP', maka masa berlaku KTP akan dianggap Seumur Hidup">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_pekerjaan">Pekerjaan</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="keluarga_pekerjaan" class="form-control" id="keluarga_pekerjaan" placeholder="Pekerjaan Keluarga">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_status_kawin">Status Perkawinan</label>
              </div>
              <div class="col-sm-8">
                <select class="form-control" name="keluarga_status_kawin">
                  <option></option>
                  <option>Kawin</option>
                  <option>Belum Kawin</option>
                  <option>Cerai</option>
                  <option>Cerai Mati</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_kewarganegaraan">Kewarganegaraan</label>
              </div>
              <div class="col-sm-8">
                <select class="form-control" name="keluarga_kewarganegaraan" id="keluarga_kewarganegaraan">
                  <option value="null"></option>
                  <option value="WNI">WNI</option>
                  <option value="WNA">WNA</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_alamat">Alamat</label>
              </div>
              <div class="col-sm-8">
                <textarea name="keluarga_alamat" class="form-control"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label for="keluarga_jk">Jenis Kelamin</label>
              </div>
              <div class="col-sm-8">
                <select class="form-control" name="keluarga_jk" id="keluarga_jk">
                  <option></option>
                  <option value="Laki-Laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
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
                <select class="form-control" name="alas_hak" id="alas_hak">
                  <option></option>
                  @foreach( $alas as $alashak )
                  <option value="{{ $alashak->id }}">{{ $alashak->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-2">
                <label>Nomor Alas Hak</label>
              </div>
              <div class="input-group col-md-9">
                <input class="form-control" placeholder="Nomor Alas Hak" name="nomor_alas_hak">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-2">
                <label>Nomor Peta Bidang</label>
              </div>
              <div class="input-group col-md-9">
                <input class="form-control" placeholder="Nomor Peta Bidang" name="nomor_peta_bidang">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-2">
                <label>Atas Nama Bidang</label>
              </div>
              <div class="input-group col-md-9">
                <input class="form-control" placeholder="Atas Nama Bidang" name="atas_nama_bidang">
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
                  <input type="number" min="0" name="luas_tanah" class="form-control format" id="luas_tanah" placeholder="Luas Tanah" required="required">
                  <span class="input-group-addon">M2</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Luas Tanah Terkena Tol</label>
                <div class="input-group">
                  <input type="number" min="0" name="luas_terkena" class="form-control" id="luas_terkena" placeholder="Luas Terkena Tol" required="required">
                  <span class="input-group-addon">M2</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Harga Tanah Permeter2</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input type="number" min="0" name="harga_tanah" class="form-control" id="harga_tanah" placeholder="Harga Tanah" required="required">
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
                        <input type="number" min="0" name="total_harga" class="form-control" id="total_harga" placeholder="Jumlah Tanah Dibayar" disabled>
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
                    <input type="number" min="0" name="harga_bangunan" class="form-control" id="harga_bangunan" placeholder="Nilai Ganti Bangunan" required="required">
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
                    <input type="number" min="0" name="harga_tanaman" class="form-control" id="harga_tanaman" placeholder="Nilai Ganti Tanaman" required="required">
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
                        <input type="number" min="0" name="total_ganti_rugi" id="total_ganti_rugi" class="form-control" id="total_ganti_rugi" placeholder="Jumlah Tanah Keseluruhan Dibayar" disabled>
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
                      <input type="number" min="0" name="luas_tanah_sisa" class="form-control" id="luas_tanah_sisa" placeholder="Luas Tanah Sisa" disabled>
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
                <input type="text" name="kondisi_tanah" class="form-control" placeholder="Kondisi Tanah">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label>Harga Tanah Sisa Permeter2</label>
                <div class="input-group">
                  <span class="input-group-addon">Rp.</span>
                    <input type="number" min="0" name="harga_tanah_sisa" class="form-control" id="harga_tanah_sisa" placeholder="Harga Tanah">
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
                        <input type="number" min="0" name="total_harga_sisa" class="form-control" id="total_harga_sisa" placeholder="Jumlah Tanah Sisa Dibayar" disabled>
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
                    <input type="number" name="harga_bangunan_sisa" id="harga_bangunan_sisa" class="form-control" placeholder="Nilai Ganti Kerugian Bangunan">
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
                    <input type="number" name="harga_tanaman_sisa" id="harga_tanaman_sisa" class="form-control" placeholder="Nilai Ganti Kerugian Tanaman">
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
                      <input type="text" name="total_ganti_rugi_sisa" id="total_ganti_rugi_sisa" class="form-control" placeholder="Total Ganti Rugi Tanah Sisa" disabled="">
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
                        <input type="text" name="total_ganti_rugi_semua" id="total_ganti_rugi_semua" class="form-control" placeholder="Total Ganti Rugi" disabled="">
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
                <input type="date" name="tanggal_pembayaran" class="form-control">
              </div>
              <div class="col-md-6">
                <label>Status</label>
                <select class="form-control" name="dibayar" id="dibayar" required="required">
                  <option></option>
                  <option value="sudah">Sudah Dibayar</option>
                  <option value="belum">Belum Dibayar</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="kelurahan" name="kelurahanlabel" id="kelurahanlabel" class="control-label">Desa/Kelurahan</label>
                    <select name="kelurahan" id="kelurahan" class="form-control">
                      <option value="kosong"></option>
                      @foreach( $desa as $des )
                      <option value="{{$des->id}}"> {{ $des->name }} </option>
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
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="kabupaten" name="kabupatenlabel" id="kabupatenlabel" class="control-label">Kabupaten/Kota</label>
                    <select name="kabupaten" id="kabupaten" class="form-control" disabled>
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="provinsi" name="provinsilabel" id="provinsilabel"  class="control-label">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control" disabled>
                      <option value="kosong"></option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="status-tanah" class="control-label">Status Pembayaran Tanah</label>
                    <select name="status-tanah" id="status-tanah" class="form-control">
                      <option></option>
                      <option value="biasa">Pembayaran Biasa</option>
                      <option value="fasos">Fasos / Fasum</option>
                      <option value="wakaf">Wakaf</option>
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
                <label for="bentuk_fasos">Bentuk Fasos/Fasum</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="bentuk_fasos" class="form-control" id="Fasos" placeholder="Bentuk Fasos/Fasum">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="status_fasos">Status</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="status_fasos" class="form-control" id="status" placeholder="Status">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="bentuk_pergantian_fasos">Bentuk Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="bentuk_pergantian_fasos" class="form-control" id="bentuk_pergantian" placeholder="Bentuk Pergantian">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="penerima_pergantian_fasos">Penerima Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="penerima_pergantian_fasos" class="form-control" id="penerima_pergantian" placeholder="Penerima Pergantian">
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
                <input type="text" name="bentuk_wakaf" class="form-control" id="wakaf" placeholder="Bentuk Wakaf">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Status</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="status_wakaf" class="form-control" id="status2" placeholder="Status">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Nadzir</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="nadzir_wakaf" class="form-control" id="nadzir" placeholder="Nadzir">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="jenis_kelamin">Bentuk Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="bentuk_pergantian_wakaf" class="form-control" id="bentuk_pergantian2" placeholder="Bentuk Pergantian">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3">
                <label for="ktp">Penerima Pergantian</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="penerima_pergantian_wakaf" class="form-control" id="penerima_pergantian2" placeholder="Penerima Pergantian">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12" id="footer">
        <div class="box box-primary">
          <div class="box-body">
            <input type="submit" class="btn btn-success btn-md pull-left" value="Simpan Data">
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
@else
<code>Maaf Anda tidak mempunyai akses ke halaman ini, hubungi administrator untuk info lebih lanjut!</code>
@endif

	<!-- JS FOR MULTIPLE UPLOAD -->
@section('script')
<script>
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })
</script>
<script type="text/javascript">
  $( '#provinsi' ).hide();
  $( '#kabupaten' ).hide();
  $( '#kecamatan' ).hide();
  $( '#provinsilabel' ).hide();
  $( '#kabupatenlabel' ).hide();
  $( '#kecamatanlabel' ).hide();

  $(document).on( 'change', '#kelurahan', function( event ) {
    var value = $('#kelurahan').val();
    if( value == 'kosong' ){
      $( '#provinsi' ).hide();
      $( '#kabupaten' ).hide();
      $( '#kecamatan' ).hide();
      $( '#provinsilabel' ).hide();
      $( '#kabupatenlabel' ).hide();
      $( '#kecamatanlabel' ).hide();
    } else {

      $.get("{{ route('dpt.data')}}", 
      { data: $(this).val() }, 
      function(data) {
          var provinsi = $('#provinsi');
          var kabupaten = $('#kabupaten');
          var kecamatan = $('#kecamatan');
          provinsi.empty();
          kabupaten.empty();
          kecamatan.empty();
            provinsi.append("<option>" + JSON.parse( data.provinsi ).name + "</option>");
            kabupaten.append("<option>" + JSON.parse( data.kabupaten ).name + "</option>");
            kecamatan.append("<option>" + JSON.parse( data.kecamatan ).name + "</option>");
      });
      $( '#provinsi' ).show();
      $( '#kabupaten' ).show();
      $( '#kecamatan' ).show();
      $( '#provinsilabel' ).show();
      $( '#kabupatenlabel' ).show();
      $( '#kecamatanlabel' ).show();
    }
  });
</script>
<script type="text/javascript" src="{{asset('js/dpt.js')}}"></script>
@endsection
@endsection