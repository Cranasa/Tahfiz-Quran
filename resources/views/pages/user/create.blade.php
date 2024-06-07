@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Data User'" :btnBack="true" :redirect="'/user'"></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Data User</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post" class="form form-vertical" id="form-create">
            @csrf

              <div class="form-body">
                <div class="row">

                  @include('pages.user._createform')

                  <div class="col-12 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary mb-1">Simpan</button>
                    <button type="reset" class="btn btn-light-secondary me-2 mb-1">Reset</button>
                  </div>
                </div>

              </div>
            </form>
        </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@push('js')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.select2').select2({
        placeholder: "Pilih",
        allowClear: false,
        minimumResultsForSearch: 5,
        theme: 'bootstrap-5',
      });
    });
  </script>
@endpush
