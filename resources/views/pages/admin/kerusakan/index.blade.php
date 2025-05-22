@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Daftar Kerusakan'" :btnBack="false" :redirect="'/kerusakan'"></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <a href="{{ route('kerusakan.create') }}" class="btn btn-icon icon-left btn-primary btn-sm">
        <i class="bi bi-plus-square"></i>
        <span class="ms-1">Tambah Kerusakan</span>
      </a>
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="table-kerusakan">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Kerusakan</th>
              <th>Solusi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kerusakans as $kerusakan)
              <tr>
                <td>{{ $kerusakan->kode }}</td>
                <td>{{ $kerusakan->nama_kerusakan }}</td>
                <td>{{ Str::limit($kerusakan->solusi, 50) }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ route('kerusakan.edit', $kerusakan) }}" class="btn btn-icon icon-left btn-sm btn-warning me-1">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <button class="btn btn-icon icon-left btn-sm btn-danger btn-delete" 
                            data-id="{{ $kerusakan->id }}" 
                            data-name="{{ $kerusakan->nama_kerusakan }}" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modal-delete">
                      <i class="bi bi-trash"></i>
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

  <!-- Modal Delete -->
  <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus kerusakan <strong id="delete-name"></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form id="form-delete" method="POST">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <style>
    #table-kerusakan tbody tr td:last-child {
      white-space: nowrap;
      width: 1%;
    }
  </style>
@endpush

@push('js')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#table-kerusakan').DataTable({
        ordering: true,
        language: {
          url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json'
        }
      });

      $('.btn-delete').on('click', function(){
        $('#delete-name').html($(this).data('name'));
        $('#form-delete').attr('action', '/kerusakan/' + $(this).data('id'));
      });
    });
  </script>
@endpush