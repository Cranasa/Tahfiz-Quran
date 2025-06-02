@extends('layouts.app-vertical')

@section('page-title')
  <x-page-title-vertical 
    :title="'Tambah Data santri'" 
    :btnBack="true" 
    :redirect="route('santri.create')"
  ></x-page-title-vertical>
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Form Tambah Santri</h4>
    </div>
    <div class="card-content">
      <div class="card-body">
        <form action="{{ route('santri.store') }}" method="POST" class="form form-vertical">
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
                  <label for="NIS" class="form-label">NIS</label>
                  <input type="text" id="NIS" class="form-control" name="NIS" placeholder="masukan NIS" required>
                  @error('NIS')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="ClassRoom" class="form-label">Kelas</label>
                  <textarea class="form-control" id="ClassRoom" name="ClassRoom" rows="3" placeholder="Kelas" required></textarea>
                  @error('ClassRoom')
                    <div class="invalid-feedback">
                      <i class="bx bx-radio-circle"></i>
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              
              <div class="form-group">
                <label for="Parents" class="form-label">Orang tua</label>
                <textarea class="form-control" id="Parents" name="Parents" rows="3" placeholder="orang tua" required></textarea>
                @error('Parents')
                  <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="BirthDate" class="form-label">Tanggal lahir</label>
              <textarea type="date" class="form-control" id="BirthDate" name="BirthDate" rows="3" placeholder="tanggal lahir" required></textarea>
              @error('BirthDate')
                <div class="invalid-feedback">
                  <i class="bx bx-radio-circle"></i>
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="Gender" class="form-label">Jenis Kelamin</label>
            <textarea class="form-control" id="Gender" name="Gender" rows="3" placeholder="Jenis Kelamin" required></textarea>
            @error('Gender')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="address" class="form-label">Alamat</label>
          <textarea class="form-control" id="address" name="address" rows="3" placeholder="Alamat" required></textarea>
          @error('address')
            <div class="invalid-feedback">
              <i class="bx bx-radio-circle"></i>
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

              <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('santri.index') }}" class="btn btn-light-secondary me-1 mb-1">
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



