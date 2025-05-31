@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical 
    :title="'Tambah Kelas'" 
    :btnBack="true" 
    :redirect="route('parents.create')"
  ></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Form Kelas</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form action="{{ route('classroom.store') }}" method="POST" class="form form-vertical">
          @csrf
          
          <div class="form-body">
            <div class="row">
              <!-- Data Akun -->
    
                <div class="form-group">
                  <label for="name" class="form-label">Nama kelas</label>
                  <input type="text" id="name" class="form-control" name="name" placeholder="Nama Kelas" required>
                  @error('name')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="Deskripsi" class="form-label">Deskripsi</label>
                  <input type="Deskripsi" id="Deskripsi" class="form-control" name="Deskripsi" placeholder="Deskripsi Anda" required>
                </div>
              </div>

              <!-- Data Orang Tua -->
       

    

              <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('parents.index') }}" class="btn btn-light-secondary me-1 mb-1">
                  <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary me-1 mb-1">
                  <i class="bi bi-check-circle"></i> Simpan
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection



