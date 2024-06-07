<div class="modal fade text-left" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-filter-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modal-filter-label">Filter Data</h5>
              <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div>
          <form action="/user" method="get" id="form-filter">
            <div class="modal-body">
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-select mt-2" name="role" id="role">
                    <option value="">Semua</option>
                    @foreach (['admin','customer'] as $role)
                      <option value="{{ $role }}" {{ request('role') == $role ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/user" class="btn btn-secondary"> Reset </a>
                <button type="submit" class="btn btn-primary ms-1"> Terapkan </button>
            </div>
          </form>
      </div>
  </div>
</div>
