@extends('pages.profile.main')

@section('profile')

<div class="card pb-0">
  <div class="card-body pb-0 mb-0">
      <form action="{{ route('profile.editfoto.update') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-body">
            <div class="row">

                <div class="col-12 form-group mb-3">
                  <label for="files" class="required">Ganti Foto Profil</label>
                  <input type="file" name="files" id="files" value="{{ old('files', $pengguna->files) }}" class="form-control mt-1 @error('files') is-invalid @enderror" required accept="image/*" onchange="previewImage()">
                  @error('files') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

              </div>

              <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary mb-1">Simpan</button>
              </div>
          </div>
        </form>
    </div>
</div>

@endsection
