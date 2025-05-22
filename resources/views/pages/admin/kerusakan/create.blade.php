@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical 
    :title="'Tambah Kerusakan'" 
    :btnBack="true" 
    :redirect="route('kerusakan.index')"
  ></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('kerusakan.store') }}" method="POST">
        @csrf
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="kode" class="form-label">Kode Kerusakan</label>
              <input type="text" 
                     id="kode" 
                     name="kode" 
                     class="form-control @error('kode') is-invalid @enderror" 
                     value="{{ old('kode') }}" 
                     required
                     placeholder="Contoh: K001">
              @error('kode')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="nama_kerusakan" class="form-label">Nama Kerusakan</label>
              <input type="text" 
                     id="nama_kerusakan" 
                     name="nama_kerusakan" 
                     class="form-control @error('nama_kerusakan') is-invalid @enderror" 
                     value="{{ old('nama_kerusakan') }}" 
                     required
                     placeholder="Masukkan nama kerusakan">
              @error('nama_kerusakan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="solusi" class="form-label">Solusi</label>
          <textarea id="solusi" 
                    name="solusi" 
                    class="form-control @error('solusi') is-invalid @enderror" 
                    rows="4"
                    placeholder="Masukkan solusi untuk kerusakan ini">{{ old('solusi') }}</textarea>
          @error('solusi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="d-flex justify-content-end mt-4">
          <a href="{{ route('kerusakan.index') }}" class="btn btn-light-secondary me-2">
            <i class="bi bi-x-circle"></i> Batal
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection