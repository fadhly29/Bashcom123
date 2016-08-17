<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=tanah"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="box box-primary">
  <div class="box-body">

    <div class="form-group">
      <div class="col-md-12">
        <h4>2. Data Bangunan</h4>
      </div>
      <div class="col-md-3">
        <label>Nilai Ganti Bangunan</label>
      </div>
      <div class="input-group col-md-8">
        <span class="input-group-addon">Rp.</span>
          <input type="number" min="0" name="nilai_ganti_kerugian_bangunan" class="form-control" id="ganti_rugi_bangunan" placeholder="Nilai Ganti Bangunan" required="required" value="{{$detail['tanah']['nilai_ganti_kerugian_bangunan']}}">
        <span class="input-group-addon">.00</span>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12">
        <h4>3. Data Tanaman</h4>
      </div>
      <div class="col-md-3">
        <label>Nilai Ganti tanaman</label>
      </div>
      <div class="input-group col-md-8">
        <span class="input-group-addon">Rp.</span>
          <input type="number" min="0" name="nilai_ganti_kerugian_tanaman" class="form-control" id="ganti_rugi_tanaman" placeholder="Nilai Ganti Tanaman" required="required" value="{{$detail['tanah']['nilai_ganti_kerugian_tanaman']}}">
        <span class="input-group-addon">.00</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-3">
        <label>Tanggal Pembayaran</label>
      </div>
      <div class="col-md-8">
        <input type="date" name="tanggal_pembayaran" class="form-control" value="{{$detail['tanah']['tanggal_pembayaran']}}">
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-md btn-success">Simpan</button>
    <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
  </div>
</div>
</form>