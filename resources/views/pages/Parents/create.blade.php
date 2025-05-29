@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical 
    :title="'Tambah Data Orang Tua'" 
    :btnBack="true" 
    :redirect="route('parents.create')"
  ></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('parents.store') }}" method="POST">
        @csrf
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="kode" class="form-label">Nama</label>
              
              <input type="text" 
                     id="name" 
                     name="name" 
                     class="form-control @error('name') is-invalid @enderror" 
                     value="{{ old('name') }}" 
                     required
                     placeholder="masukan nama">
              @error('kode')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="kode" class="form-label">nomor Hp</label>
              
              <input type="text" 
                     id="name" 
                     name="name" 
                     class="form-control @error('name') is-invalid @enderror" 
                     value="{{ old('name') }}" 
                     required
                     placeholder="masukan nomor anda">
              @error('kode')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" 
                     id="email" 
                     name="email" 
                     class="form-control @error('email') is-invalid @enderror" 
                     value="{{ old('email') }}" 
                     required
                     placeholder="masukan email">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
              <label for="kode" class="form-label">password</label>
              
              <input type="text" 
                     id="name" 
                     name="name" 
                     class="form-control @error('name') is-invalid @enderror" 
                     value="{{ old('name') }}" 
                     required
                     placeholder="masukan Password Anda">
              @error('kode')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
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