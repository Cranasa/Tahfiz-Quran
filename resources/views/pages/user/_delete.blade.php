<div class="modal fade text-left" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modal-delete-label">Konfirmasi Hapus</h5>
              <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div>
          <form action="" method="post" id="form-delete">
          @csrf
          @method('delete')
            <div class="modal-body">
                Data: <span class="text-danger" id="delete-name"></span> <br>
                Apakah anda yakin akan menghapus data tersebut?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal </button>
                <button type="submit" class="btn btn-danger ms-1"> Ya, hapus </button>
            </div>
          </form>
      </div>
  </div>
</div>
