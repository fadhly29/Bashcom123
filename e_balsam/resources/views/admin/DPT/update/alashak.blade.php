<form action="{{route('dpt.update.post', \Crypt::encrypt( $detail['id'] ))."?path=tanah"}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="box box-primary">
    <div class="box-body">
      <div class="form-group">
        <div class="col-md-2">
          <label>Alas Hak</label>
        </div>
        <div class="input-group col-md-9">
          <select class="form-control" name="alas_hak_id" id="alas">
            <option></option>
            @foreach( $alas as $alashak )
            <option @if($detail['tanah']['alas_hak_id'] == $alashak->id ) selected="" @endif value="{{ $alashak->id }}">{{ $alashak->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-md btn-success">Simpan</button>
      <button data-dismiss="modal" class="btn btn-md btn-danger">Batalkan</button>
    </div>
  </div>
</form>