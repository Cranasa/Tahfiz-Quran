<div class="modal fade text-left" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="modal-logout-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modal-logout-label">Konfirmasi Logout</h5>
              <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div>
          <div class="modal-body">
              Apakah anda yakin akan keluar Aplikasi?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Batal
              </button>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ms-1">
                    Ya, keluar
                </button>
              </form>
          </div>
      </div>
  </div>
  </div>
