<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=wakaf"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="box box-primary">
  <div class="box-body">

    <div class="form-group">
      <div class="col-sm-4">
        <label for="nama">Bentuk Wakaf</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="text" name="bentuk" class="form-control" id="wakaf" placeholder="Bentuk Wakaf" required="required" value="{{$detail['wakaf']['bentuk']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="ktp">Luas Tanah</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="number" min="0" name="luas_tanah" class="form-control" id="luas_tanah2" placeholder="Luas Tanah" required="required" value="{{$detail['wakaf']['luas_tanah']}}">
        <span class="input-group-addon">M2</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="jenis_kelamin">Luas Bangunan</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="number" min="0" name="luas_bangunan" class="form-control" id="luas_bangunan2" placeholder="Luas Bangunan" required="required" value="{{$detail['wakaf']['luas_bangunan']}}">
        <span class="input-group-addon">M2</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="ktp">Status</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="text" name="status" class="form-control" id="status2" placeholder="Status" required="required" value="{{$detail['wakaf']['status']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="ktp">Nadzir</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="text" name="nadzir" class="form-control" id="nadzir" placeholder="Nadzir" required="required" value="{{$detail['wakaf']['nadzir']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="jenis_kelamin">Bentuk Pergantian</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="text" name="bentuk_pergantian" class="form-control" id="bentuk_pergantian2" placeholder="Bentuk Pergantian" required="required" value="{{$detail['wakaf']['bentuk_pergantian']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="ktp">Jumlah Nilai Pergantian</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="number" min="0" name="jumlah_nilai_pergantian" class="form-control" id="jumlah_pergantian2" placeholder="Jumlah Pergantian" required="required" value="{{$detail['wakaf']['jumlah_nilai_pergantian']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="ktp">Penerima Pergantian</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="text" name="penerima_pergantian" class="form-control" id="penerima_pergantian2" placeholder="Penerima Pergantian" required="required" value="{{$detail['wakaf']['penerima_pergantian']}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">
        <label for="ktp">Tanggal Pergantian</label>
      </div>
      <div class="input-group col-sm-8">
        <input type="date" name="tanggal_pergantian" class="form-control" id="tanggal_pergantian2" placeholder="Tanggal Pergantian" value="{{$detail['wakaf']['tanggal_pergantian']}}">
      </div>
    </div>

  </div>
  <div class="box-footer">
    <button class="btn btn-md btn-success">Simpan</button>
    <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
  </div>
</div>
</form>