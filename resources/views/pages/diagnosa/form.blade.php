@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical 
    :title="'Form Diagnosa'" 
    :btnBack="true" 
    :redirect="route('dashboard')"
  ></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('diagnosa.proses') }}" method="POST">
        @csrf
        
        <div class="mb-4">
          <h5 class="mb-3">Pilih Gejala yang Dialami:</h5>
          <div class="row">
            @foreach ($gejalas as $gejala)
              <div class="col-md-6 mb-3">
                <div class="form-check">
                  <input class="form-check-input" 
                         type="checkbox" 
                         name="gejala[]" 
                         value="{{ $gejala->id }}" 
                         id="gejala-{{ $gejala->id }}">
                  <label class="form-check-label" for="gejala-{{ $gejala->id }}">
                    <strong>{{ $gejala->kode }}</strong> - {{ $gejala->nama_gejala }}
                  </label>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <button type="reset" class="btn btn-light-secondary me-2">
            <i class="bi bi-arrow-counterclockwise"></i> Reset
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-clipboard2-pulse"></i> Proses Diagnosa
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('css')
  <style>
    .form-check-input {
      margin-top: 0.25rem;
    }
    .form-check-label {
      margin-left: 0.5rem;
    }
  </style>
@endpush