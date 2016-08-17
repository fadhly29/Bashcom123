<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=tanah"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="box box-primary">
  <div class="box-body">
    
    <div class="form-group">
      <div class="col-md-12">
        <h4>1. Data Tanah</h4>
      </div>
      <div class="col-md-3">
        <label>Luas Tanah</label>
      </div>
      <div class="input-group col-md-8">
        <input type="number" min="0" name="luas_tanah" class="form-control" id="luas_tanah" placeholder="Luas Tanah" required="required" value="{{$detail['tanah']['luas_tanah']}}">
        <span class="input-group-addon">M2</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-3">
        <label>Luas Terkena Tol</label>
      </div>
      <div class="input-group col-md-8">
        <input type="number" min="0" name="luas_terkena_tol" class="form-control" id="luas_tol" placeholder="Luas Terkena Tol" required="required" value="{{$detail['tanah']['luas_terkena_tol']}}">
        <span class="input-group-addon">M2</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-3">
        <label>Harga Tanah Permeter2</label>
      </div>
      <div class="input-group col-md-8">
        <span class="input-group-addon">Rp.</span>
          <input type="number" min="0" name="harga_tanah_terkena_permeter_2" class="form-control" id="harga_tanah" placeholder="Harga Tanah" required="required" value="{{$detail['tanah']['harga_tanah_terkena_permeter_2']}}">
        <span class="input-group-addon">.00</span>
      </div>
    </div>

    

    <div class="form-group">
      <div class="col-md-3">
        <label>Harga Tanah Sisa</label>
      </div>
      <div class="input-group col-md-8">
        <span class="input-group-addon">Rp.</span>
          <input type="number" min="0" name="harga_hanah_sisa" class="form-control" id="harga_tanah_sisa" placeholder="Harga Tanah Sisa" required="required" value="{{$detail['tanah']['harga_hanah_sisa']}}">
        <span class="input-group-addon">.00</span>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button class="btn btn-md btn-success">Simpan</button>
    <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
  </div>
</div>
</form>