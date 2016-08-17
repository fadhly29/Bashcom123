<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=pemohon"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Data Pemohon</h3> 
  </div><!-- /.box-header -->
  <div class="box-body">
    
    <!-- <form role="form" class="form-horizontal"> -->
      <!-- text input -->

      <div class="form-group">
        <div class="col-sm-4">
          <label for="nama">Nama Lengkap</label>
        </div>
        <div class="col-sm-8">
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required="required" value="{{$detail['nama']}}">
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          <label for="kewarganegaraan">Kewarganegaraan</label>
        </div>
        <div class="col-sm-8">
          <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
            <option></option>
            <option @if($detail['kewarganegaraan'] == 'WNI') selected="selected" @endif value="WNI">WNI</option>
            <option @if($detail['kewarganegaraan'] == 'WNA') selected="selected" @endif value="WNA">WNA</option>
          </select>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          @if( $detail['kewarganegaraan'] == 'WNI' )
          <label for="ktp" id="ktp_passport_label">No. KTP</label>
          @else
          <label for="ktp" id="ktp_passport_label">No. Passport</label>
          @endif
        </div>
        <div class="col-sm-8">
          <input type="text" maxlength="22" min="0" name="ktp_passport" class="form-control" id="ktp_passport" placeholder="Nomor" value="{{$detail['ktp_passport']}}">
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          @if( $detail['kewarganegaraan'] == 'WNI' )
          <label for="masaberlakuktp" id="masaberlaku_ktp_passport_label">Masa Berlaku KTP</label>
          @else
          <label for="masaberlakuktp" id="masaberlaku_ktp_passport_label">Masa Berlaku Passport</label>
          @endif
        </div>
        <div class="col-sm-8">
          <input type="date" name="masa_berlaku_ktp_passport" class="form-control" required="required">
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          <label for="jenis_kelamin">Jenis Kelamin</label>
        </div>
        <div class="col-sm-8">
          <select class="form-control" name="jk" id="jk">
            <option></option>
            <option @if($detail['jk'] == 'Laki-Laki') selected="selected" @endif value="Laki-Laki">Laki-laki</option>
            <option @if($detail['jk'] == 'Perempuan') selected="selected" @endif value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          <label for="status_perkawinan">Status Perkawinan</label>
        </div>
        <div class="col-sm-8">
          <select class="form-control" name="status_kawin">
            <option></option>
            <option @if($detail['status_kawin'] == 'Kawin') selected="selected" @endif value="Kawin">Kawin</option>
            <option @if($detail['status_kawin'] == 'Belum Kawin') selected="selected" @endif value="Belum Kawin">Belum Kawin</option>
          </select>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Pekerjaan</label>
        </div>
        <div class="col-sm-8">
          <input type="text" name="pekerjaan" class="form-control" id="ktp" placeholder="Pekerjaan" required="required" value="{{$detail['pekerjaan']}}">
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Alamat</label>
        </div>
        <div class="col-sm-8">
          <textarea name="alamat" class="form-control">{{$detail['alamat']}}</textarea>
        </div>
      </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <button class="btn btn-md btn-success">Simpan</button>
    <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
  </div>
</div><!-- /.box -->
</form>