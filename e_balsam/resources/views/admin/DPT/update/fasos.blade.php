<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=fasos"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="box box-primary">
  <div class="box-body">
    
    <!-- <form role="form" class="form-horizontal"> -->
      <!-- text input -->

      <div class="form-group">
        <div class="col-sm-4">
          <label for="nama">Bentuk Fasos/Fasum</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="text" name="bentuk" class="form-control" id="Fasos" placeholder="Bentuk Fasos/Fasum" required="required" value="{{ $detail['fasos']['bentuk'] }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Luas Tanah</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="number" min="0" name="luas_tanah" class="form-control" id="luas_tanah" placeholder="Luas Tanah" required="required" value="{{$detail['tanah']['luas_tanah']}}">
          <span class="input-group-addon">M2</span>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="jenis_kelamin">Luas Bangunan</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="number" min="0" name="luas_bangunan" class="form-control" id="luas_bangunan" placeholder="Luas Bangunan" required="required" value="{{$detail['fasos']['luas_bangunan']}}">
          <span class="input-group-addon">M2</span>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Status</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="text" name="status" class="form-control" id="status" placeholder="Status" required="required" value="{{$detail['fasos']['status']}}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="jenis_kelamin">Bentuk Pergantian</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="text" name="bentuk_pergantian" class="form-control" id="bentuk_pergantian" placeholder="Bentuk Pergantian" required="required" value="{{$detail['fasos']['bentuk_pergantian']}}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Jumlah Nilai Pergantian</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="number" min="0" name="jumlah_nilai_pergantian" class="form-control" id="jumlah_pergantian" placeholder="Jumlah Pergantian" required="required" value="{{$detail['fasos']['jumlah_nilai_pergantian']}}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Penerima Pergantian</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="text" name="penerima_pergantian" class="form-control" id="penerima_pergantian" placeholder="Penerima Pergantian" required="required" value="{{$detail['fasos']['penerima_pergantian']}}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label for="ktp">Tanggal Pergantian</label>
        </div>
        <div class="input-group col-sm-8">
          <input type="date" name="tanggal_pergantian" class="form-control" id="tanggal_pergantian" placeholder="Tanggal Pergantian" required="required" value="{{$detail['fasos']['tanggal_pergantian']}}">
        </div>
      </div>

      

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button class="btn btn-md btn-success">Simpan</button>
    <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
  </div>
</div><!-- /.box -->
</form>