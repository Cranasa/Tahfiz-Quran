@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Data User'" :btnBack="false" :redirect="'/user'"></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header justify-content-between">
        <a href="{{ route('user.create') }}" class="btn btn-icon icon-left btn-primary btn-sm float-start">
          <i class="bi bi-plus-square"></i>
          <span class="ms-1">Tambah User</span>
        </a>
        <button class="btn btn-info icon-left btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#modal-filter">
          <i class="bi bi-filter"></i>
          <span class="ms-1">Filter Data</span>
        </button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-sm" id="table1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->address ?? '-' }}</td>
                      <td>
                        @if ($user->role == 'admin')
                          <span class="badge bg-light-success">Admin</span>
                        @else
                          <span class="badge bg-light-warning">Customer</span>
                        @endif
                      </td>
                      <td>
                        <div class="btn-group">

                          <a href="{{ route('user.show', $user) }}" class="btn btn-icon icon-left btn-sm btn-success me-1" >
                            <i class="bi bi-eye"> </i>
                          </a>
                          <a href="{{ route('user.edit', $user) }}" class="btn btn-icon icon-left btn-sm btn-warning me-1" >
                            <i class="bi bi-pencil"> </i>
                          </a>
                          <button class="btn btn-icon icon-left btn-sm btn-delete btn-danger" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-bs-toggle="modal" data-bs-target="#modal-delete">
                            <i class="bi bi-trash"> </i>
                          </button>
                        </div>
                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('pages.user._filter')
  @include('pages.user._delete')

@endsection

@push('css')
  {{-- Datatable Default: table1 --}}
  {{-- <link rel="stylesheet" href="/mazer/assets/extensions/simple-datatables/style.css"> --}}

  {{-- DataTable Customize --}}
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('js')

{{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- Datatable Default: table1 --}}
  {{-- <script src="/mazer/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/mazer/assets/static/js/pages/simple-datatables.js"></script> --}}

  {{-- DataTable Customize --}}
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#table1').DataTable({
        ordering: false,
      });

      $('.btn-delete').on('click', function(){
        $('#delete-name').html($(this).data('name'));
        $('#form-delete').attr('action', '/user/' + $(this).data('id'));
        $('#modal-delete').modal('show');
      });
    });
  </script>
@endpush
