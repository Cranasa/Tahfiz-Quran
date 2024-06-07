@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Profil Saya'" :btnBack="false"></x-page-title-vertical>
@endsection

@section('content')

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-content text-center">
        <div class="card-header">
          <img alt="image" src="/img/profile/{{ $pengguna->foto }}" class="avatar avatar-lg img-preview" style="width: 150px">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $pengguna->name }}</h5>
        </div>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ $pengguna->email }}</li>
        <li class="list-group-item">{{ $pengguna->role }}</li>
        <li class="list-group-item">{{ $pengguna->address ?? '-' }}</li>
      </ul>
  </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      {{-- <div class="card-header">
          <h5 class="card-title">{{ $title ?? 'Profil' }}</h5>
      </div> --}}
      <div class="card-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <a class="nav-link {{ Route::is('profile.show') ? 'active' : '' }}" id="home-tab" href="{{ route('profile.show') }}" role="tab" aria-controls="home" aria-selected="true">Detail</a>
              </li>
              <li class="nav-item" role="presentation">
                  <a class="nav-link {{ Route::is('profile.editdata') ? 'active' : '' }}" id="profile-tab" href="{{ route('profile.editdata') }}" role="tab" aria-controls="profile" aria-selected="false">Edit Data</a>
              </li>
              <li class="nav-item" role="presentation">
                  <a class="nav-link {{ Route::is('profile.editfoto') ? 'active' : '' }}" id="contact-tab" href="{{ route('profile.editfoto') }}" role="tab" aria-controls="contact" aria-selected="false">Edit Foto</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  @yield('profile')
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
  <script>
    function previewImage() {
      const image = document.querySelector('#files');
      const imgPreview = document.querySelector('.img-preview');

      // imgPreview.style.display = 'inline';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(files.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endpush
