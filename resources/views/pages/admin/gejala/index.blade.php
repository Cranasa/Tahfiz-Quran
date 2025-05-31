@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Daftar Gejala'" :btnBack="false" :redirect="'/gejala'"></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <a href="{{ route('gejala.create') }}" class="btn btn-icon icon-left btn-primary btn-sm">
        <i class="bi bi-plus-square"></i>
        <span class="ms-1">Tambah Gejala</span>
      </a>
    </div>
    <div class="card-body">
      
      <div class="table-responsive">
        <table class="table table-striped table-hover table-sm" id="table1">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Gejala</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($gejalas as $gejala)
              <tr>
                <td>{{ $gejala->kode }}</td>
                <td>{{ $gejala->nama_gejala }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ route('gejala.edit', $gejala) }}" class="btn btn-icon icon-left btn-sm btn-warning me-1">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <button class="btn btn-icon icon-left btn-sm btn-danger btn-delete" 
                            data-id="{{ $gejala->id }}" 
                            data-name="{{ $gejala->nama_gejala }}" 
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
          <p>Apakah Anda yakin ingin menghapus gejala <strong id="delete-name"></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form id="form-delete" method="POST" action="{{ route('gejala.destroy', ':id') }}"></form>
            <label for="delete-id" class="visually-hidden">ID Gejala</label>
            <input type="hidden" name="id" id="delete-id">
            @csrf 
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('js')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#table1').DataTable({
        ordering: false,
      });

      $('.btn-delete').on('click', function(){
        $('#delete-name').html($(this).data('name'));
        $('#form-delete').attr('action', '/gejala/' + $(this).data('id'));
        $('#modal-delete').modal('show');
      });
    });
  </script>
@endpush