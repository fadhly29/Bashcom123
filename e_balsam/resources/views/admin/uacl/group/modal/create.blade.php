<form enctype="multipart/form-data" action="{{route('uacl.group.create.post')}}" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buat Group Pengguna Baru </h4>
      </div>
      <div id="modal" class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" placeholder="Enter Usergroup Name" required="required">
          </div>
          <div class="form-group">
            <label>Hak Akses</label><br>
              <table class="table table-bordered table-striped dataTable" role="grid">
                  <th>Module Name</th>
                  <th>Create</th>
                  <th>Read</th>
                  <th>Update</th>
                  <th>Delete</th>
                <tr>
                  <td>Group</td>
                  <td><input name="group-c" type="checkbox"></td>
                  <td><input name="group-r" type="checkbox"></td>
                  <td><input name="group-u" type="checkbox"></td>
                  <td><input name="group-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Pengguna</td>
                  <td><input name="user-c" type="checkbox"></td>
                  <td><input name="user-r" type="checkbox"></td>
                  <td><input name="user-u" type="checkbox"></td>
                  <td><input name="user-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Lokasi</td>
                  <td><input name="location-c" type="checkbox"></td>
                  <td><input name="location-r" type="checkbox"></td>
                  <td><input name="location-u" type="checkbox"></td>
                  <td><input name="location-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Alas Hak</td>
                  <td><input name="alas_hak-c" type="checkbox"></td>
                  <td><input name="alas_hak-r" type="checkbox"></td>
                  <td><input name="alas_hak-u" type="checkbox"></td>
                  <td><input name="alas_hak-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Detail Pembebasan Tanah</td>
                  <td><input name="dpt-c" type="checkbox"></td>
                  <td><input name="dpt-r" type="checkbox"></td>
                  <td><input name="dpt-u" type="checkbox"></td>
                  <td><input name="dpt-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Notulen</td>
                  <td><input name="notulen-c" type="checkbox"></td>
                  <td><input name="notulen-r" type="checkbox"></td>
                  <td><input name="notulen-u" type="checkbox"></td>
                  <td><input name="notulen-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>SK - Peraturan</td>
                  <td><input name="peraturan-c" type="checkbox"></td>
                  <td><input name="peraturan-r" type="checkbox"></td>
                  <td><input name="peraturan-u" type="checkbox"></td>
                  <td><input name="peraturan-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>SK - Perintah / Tugas</td>
                  <td><input name="tugas-c" type="checkbox"></td>
                  <td><input name="tugas-r" type="checkbox"></td>
                  <td><input name="tugas-u" type="checkbox"></td>
                  <td><input name="tugas-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>SK - Undang undang</td>
                  <td><input name="uu-c" type="checkbox"></td>
                  <td><input name="uu-r" type="checkbox"></td>
                  <td><input name="uu-u" type="checkbox"></td>
                  <td><input name="uu-d" type="checkbox"></td>
                </tr>
                <tr>
                  <td>APL</td>
                  <td><input name="apl-c" type="checkbox"></td>
                  <td><input name="apl-r" type="checkbox"></td>
                  <td><input name="apl-u" type="checkbox"></td>
                  <td><input name="apl-d" type="checkbox"></td>
                </tr>
              </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</form>