<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel"> Maaf, anda tidak memiliki akes untuk melakukan aksi ini !! </h4>
    </div>
    <div class="modal-body">
      <code>Silakan Hubungi Administrator untuk mendapatkan akes !</code>
    </div>
    <div class="modal-footer">
    <div class="pull-right">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>