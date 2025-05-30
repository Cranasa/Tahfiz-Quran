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
    <div class="card-header">
      <h4 class="card-title">Form Tambah Orang Tua</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form action="{{ route('parents.store') }}" method="POST" class="form form-vertical">
          @csrf
          
          <div class="form-body">
            <div class="row">
              <!-- Data Akun -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input type="text" id="name" class="form-control" name="name" placeholder="Nama Lengkap" required>
                  @error('name')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" class="form-control" name="email" placeholder="Email" required>
                  @error('email')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                  @error('password')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>
              </div>

              <!-- Data Orang Tua -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <input type="text" id="phone" class="form-control" name="phone" placeholder="Nomor Telepon" required>
                  @error('phone')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="address" class="form-label">Alamat</label>
                  <textarea class="form-control" id="address" name="address" rows="3" placeholder="Alamat Lengkap" required></textarea>
                  @error('address')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

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


{{-- CREATE TABLE student_parents (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    
    CONSTRAINT fk_student_parents_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
); --}}
