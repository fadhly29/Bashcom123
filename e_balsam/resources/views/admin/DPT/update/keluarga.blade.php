<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=pemohon"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Data Keluarga</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="form-group">
      <div class="col-sm-4">
        <label for="keluarga_nama">Nama Suami/Istri</label>
      </div>
      <div class="col-sm-8">
        <input type="text" name="keluarga_nama" class="form-control" id="keluarga_nama" placeholder="Nama Keluarga" value="{{$detail['keluarga_nama']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="kewarganegaraan2" >Kewarganegaraan</label>
      </div>
      <div class="col-sm-8">
        <select class="form-control" name="keluarga_kewarganegaraan" id="kewarganegaraan2">
          <option></option>
          <option @if($detail['keluarga_kewarganegaraan'] == "WNI") selected="" @endif>WNI</option>
          <option @if($detail['keluarga_kewarganegaraan'] == "WNA") selected="" @endif>WNA</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
      @if($detail['keluarga_kewarganegaraan'] == "WNI")
        <label for="ktp_keluarga" id="keluarga_ktp_passport_label">No. KTP</label>
      @else
        <label for="ktp_keluarga" id="keluarga_ktp_passport_label">No. Passport</label>
      @endif
      </div>
      <div class="col-sm-8">
        <input type="text" maxlength="22" min="0" name="keluarga_ktp_passport" class="form-control" id="ktp_keluarga" placeholder="No. KTP" value="{{$detail['keluarga_ktp_passport']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
      @if($detail['keluarga_kewarganegaraan'] == "WNI")
        <label for="ktp" id="keluarga_masaberlaku_ktp_passport_label">Masa Berlaku KTP</label>
      @else
        <label for="ktp" id="keluarga_masaberlaku_ktp_passport_label">Masa Berlaku Passport</label>
      @endif
      </div>
      <div class="col-sm-8">
        <input type="date" name="keluarga_masa_berlaku_ktp_passport" class="form-control" id="ktp" placeholder="Pekerjaan" value="{{$detail['keluarga_masa_berlaku_ktp_passport']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="jenis_kelamin2">Jenis Kelamin</label>
      </div>
      <div class="col-sm-8">
        <select class="form-control" name="keluarga_jk" id="jk2">
          <option></option>
          <option @if($detail['keluarga_jk'] == "Laki-Laki") selected="selected" @endif value="Laki-Laki">Laki-laki</option>
          <option @if($detail['keluarga_jk'] == "Perempuan") selected="selected" @endif value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="status_kawin">Status Perkawinan</label>
      </div>
      <div class="col-sm-8">
        <select class="form-control" name="keluarga_status_kawin">
          <option></option>
          <option @if($detail['keluarga_status_kawin'] == "Kawin") selected="" @endif>Kawin</option>
          <option @if($detail['keluarga_status_kawin'] == "Belum Kawin") selected="" @endif>Belum Kawin</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="pekerjaan">Pekerjaan</label>
      </div>
      <div class="col-sm-8">
        <input type="text" name="keluarga_pekerjaan" class="form-control" id="ktp" placeholder="Pekerjaan" value="{{$detail['keluarga_pekerjaan']}}">
      </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Alamat</label>
        </div>
        <div class="col-sm-8">
          <textarea name="keluarga_alamat" class="form-control">{{$detail['keluarga_alamat']}}</textarea>
        </div>
      </div>
  </div>
  <div class="box-footer">
    <button class="btn btn-md btn-success">Simpan</button>
    <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
  </div>
</div>
</form>