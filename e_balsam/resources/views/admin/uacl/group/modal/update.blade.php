<form enctype="multipart/form-data" action="{{route('uacl.group.update.post', \Crypt::encrypt( $group->id ))}}" method="post">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perbaharui Group Pengguna {{ $group->name }} </h4>
      </div>
      <div id="modal" class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" placeholder="Enter Usergroup Name" required="required" value="{{$group->name}}">
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
                  <td><input name="group-c" type="checkbox" @if( isset($group->access_right->group->c) && $group->access_right->group->c == true ) checked="checked" @endif></td>
                  <td><input name="group-r" type="checkbox" @if( isset($group->access_right->group->r) && $group->access_right->group->r == true ) checked="checked" @endif></td>
                  <td><input name="group-u" type="checkbox" @if( isset($group->access_right->group->u) && $group->access_right->group->u == true ) checked="checked" @endif></td>
                  <td><input name="group-d" type="checkbox" @if( isset($group->access_right->group->d) && $group->access_right->group->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>Pengguna</td>
                  <td><input name="user-c" type="checkbox" @if( isset($group->access_right->user->c) && $group->access_right->user->c == true ) checked="checked" @endif></td>
                  <td><input name="user-r" type="checkbox" @if( isset($group->access_right->user->r) && $group->access_right->user->r == true ) checked="checked" @endif></td>
                  <td><input name="user-u" type="checkbox" @if( isset($group->access_right->user->u) && $group->access_right->user->u == true ) checked="checked" @endif></td>
                  <td><input name="user-d" type="checkbox" @if( isset($group->access_right->user->d) && $group->access_right->user->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>Lokasi</td>
                  <td><input name="location-c" type="checkbox" @if( isset($group->access_right->location->c) && $group->access_right->location->c == true ) checked="checked" @endif></td>
                  <td><input name="location-r" type="checkbox" @if( isset($group->access_right->location->r) && $group->access_right->location->r == true ) checked="checked" @endif></td>
                  <td><input name="location-u" type="checkbox" @if( isset($group->access_right->location->u) && $group->access_right->location->u == true ) checked="checked" @endif></td>
                  <td><input name="location-d" type="checkbox" @if( isset($group->access_right->location->d) && $group->access_right->location->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>Alas Hak</td>
                  <td><input name="alas_hak-c" type="checkbox" @if( isset($group->access_right->alas_hak->c) && $group->access_right->alas_hak->c == true ) checked="checked" @endif></td>
                  <td><input name="alas_hak-r" type="checkbox" @if( isset($group->access_right->alas_hak->r) && $group->access_right->alas_hak->r == true ) checked="checked" @endif></td>
                  <td><input name="alas_hak-u" type="checkbox" @if( isset($group->access_right->alas_hak->u) && $group->access_right->alas_hak->u == true ) checked="checked" @endif></td>
                  <td><input name="alas_hak-d" type="checkbox" @if( isset($group->access_right->alas_hak->d) && $group->access_right->alas_hak->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>Detail Pembebasan Tanah</td>
                  <td><input name="dpt-c" type="checkbox" @if( isset($group->access_right->dpt->c) && $group->access_right->dpt->c == true ) checked="checked" @endif></td>
                  <td><input name="dpt-r" type="checkbox" @if( isset($group->access_right->dpt->r) && $group->access_right->dpt->r == true ) checked="checked" @endif></td>
                  <td><input name="dpt-u" type="checkbox" @if( isset($group->access_right->dpt->u) && $group->access_right->dpt->u == true ) checked="checked" @endif></td>
                  <td><input name="dpt-d" type="checkbox" @if( isset($group->access_right->dpt->d) && $group->access_right->dpt->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>Notulen</td>
                  <td><input name="notulen-c" type="checkbox" @if( isset($group->access_right->notulen->c) && $group->access_right->notulen->c == true ) checked="checked" @endif></td>
                  <td><input name="notulen-r" type="checkbox" @if( isset($group->access_right->notulen->r) && $group->access_right->notulen->r == true ) checked="checked" @endif></td>
                  <td><input name="notulen-u" type="checkbox" @if( isset($group->access_right->notulen->u) && $group->access_right->notulen->u == true ) checked="checked" @endif></td>
                  <td><input name="notulen-d" type="checkbox" @if( isset($group->access_right->notulen->d) && $group->access_right->notulen->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>SK - Peraturan</td>
                  <td><input name="peraturan-c" type="checkbox" @if( isset($group->access_right->peraturan->c) && $group->access_right->peraturan->c == true ) checked="checked" @endif></td>
                  <td><input name="peraturan-r" type="checkbox" @if( isset($group->access_right->peraturan->r) && $group->access_right->peraturan->r == true ) checked="checked" @endif></td>
                  <td><input name="peraturan-u" type="checkbox" @if( isset($group->access_right->peraturan->u) && $group->access_right->peraturan->u == true ) checked="checked" @endif></td>
                  <td><input name="peraturan-d" type="checkbox" @if( isset($group->access_right->peraturan->d) && $group->access_right->peraturan->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>SK - Perintah / Tugas</td>
                  <td><input name="tugas-c" type="checkbox" @if( isset($group->access_right->tugas->c) && $group->access_right->tugas->c == true ) checked="checked" @endif></td>
                  <td><input name="tugas-r" type="checkbox" @if( isset($group->access_right->tugas->r) && $group->access_right->tugas->r == true ) checked="checked" @endif></td>
                  <td><input name="tugas-u" type="checkbox" @if( isset($group->access_right->tugas->u) && $group->access_right->tugas->u == true ) checked="checked" @endif></td>
                  <td><input name="tugas-d" type="checkbox" @if( isset($group->access_right->tugas->d) && $group->access_right->tugas->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>SK - Undang undang</td>
                  <td><input name="uu-c" type="checkbox" @if( isset($group->access_right->uu->c) && $group->access_right->uu->c == true ) checked="checked" @endif></td>
                  <td><input name="uu-r" type="checkbox" @if( isset($group->access_right->uu->r) && $group->access_right->uu->r == true ) checked="checked" @endif></td>
                  <td><input name="uu-u" type="checkbox" @if( isset($group->access_right->uu->u) && $group->access_right->uu->u == true ) checked="checked" @endif></td>
                  <td><input name="uu-d" type="checkbox" @if( isset($group->access_right->uu->d) && $group->access_right->uu->d == true ) checked="checked" @endif></td>
                </tr>
                <tr>
                  <td>APL</td>
                  <td><input name="apl-c" type="checkbox" @if( isset($group->access_right->apl->c) && $group->access_right->apl->c == true ) checked="checked" @endif></td>
                  <td><input name="apl-r" type="checkbox" @if( isset($group->access_right->apl->r) && $group->access_right->apl->r == true ) checked="checked" @endif></td>
                  <td><input name="apl-u" type="checkbox" @if( isset($group->access_right->apl->u) && $group->access_right->apl->u == true ) checked="checked" @endif></td>
                  <td><input name="apl-d" type="checkbox" @if( isset($group->access_right->apl->d) && $group->access_right->apl->d == true ) checked="checked" @endif></td>
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