@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Data User'" :btnBack="true" :redirect="'/user'"></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
        <h4 class="card-title">Detail Data User</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
          <div class="data">
            <div class="fw-bold">Nama</div>
            <div class="fw-normal">{{ $user->name }}</div>
          </div>
          <div class="data mt-3">
            <div class="fw-bold">Email</div>
            <div class="fw-normal">{{ $user->email }}</div>
          </div>
          <div class="data mt-3">
            <div class="fw-bold">Alamat</div>
            <div class="fw-normal">{{ $user->address ?? '-' }}</div>
          </div>
          <div class="data mt-3">
            <div class="fw-bold">Role</div>
            <div class="fw-normal">
              @if ($user->role == 'admin')
                <span class="badge bg-light-success">Admin</span>
              @else
                <span class="badge bg-light-warning">Customer</span>
              @endif
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection

@push('css')
  \
@endpush

@push('js')

@endpush
