@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical :title="'Tambah Gejala'" :btnBack="true" :redirect="route('gejala.index')"></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('gejala.store') }}" method="POST">
        @csrf
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="kode" class="form-label">Kode</label>
              <input type="text" 
                     id="kode" 
                     name="kode" 
                     class="form-control @error('kode') is-invalid @enderror" 
                     value="{{ old('kode') }}" 
                     required
                     placeholder="Masukkan kode gejala">
              @error('kode')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="nama_gejala" class="form-label">Nama Gejala</label>
              <input type="text" 
                     id="nama_gejala" 
                     name="nama_gejala" 
                     class="form-control @error('nama_gejala') is-invalid @enderror" 
                     value="{{ old('nama_gejala') }}" 
                     required
                     placeholder="Masukkan nama gejala">
              @error('nama_gejala')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        
        <div class="d-flex justify-content-end mt-4">
          <button type="reset" class="btn btn-light-secondary me-2">
            <i class="bi bi-arrow-counterclockwise"></i> Reset
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection