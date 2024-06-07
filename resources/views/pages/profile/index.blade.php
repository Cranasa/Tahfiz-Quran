@extends('pages.profile.main')

@section('profile')

<div class="row">
  <div class="col mt-3">

    <div class="data mt-3">
      <div class="fw-bold">Nama</div>
      <div class="fw-normal">{{ $pengguna->name }}</div>
    </div>
    <div class="data mt-3">
      <div class="fw-bold">Email</div>
      <div class="fw-normal">{{ $pengguna->email }}</div>
    </div>
    <div class="data mt-3">
      <div class="fw-bold">Alamat</div>
      <div class="fw-normal">{{ $pengguna->address ?? '-' }}</div>
    </div>
    <div class="data mt-3">
      <div class="fw-bold">Role</div>
      <div class="fw-normal">
        @if ($pengguna->role == 'admin')
          <span class="badge bg-light-success">Admin</span>
        @else
          <span class="badge bg-light-warning">Customer</span>
        @endif
      </div>
    </div>

  </div>
</div>

@endsection
