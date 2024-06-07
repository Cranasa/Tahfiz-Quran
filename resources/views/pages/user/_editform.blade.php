<div class="col-12 form-group mb-3">
  <label for="name" class="required">Nama</label>
  <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control mt-1 @error('name') is-invalid @enderror" placeholder="Ketik Nama" required>
  @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="col-12 form-group mb-3">
  <label for="email" class="required">Email</label>
  <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control mt-1 @error('email') is-invalid @enderror" placeholder="Ketik Email" required>
  @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="col-12 form-group mb-3">
  <label for="address" class="">Alamat</label>
  <textarea name="address" id="address" class="form-control mt-1 @error('address') is-invalid @enderror" rows="3" placeholder="Ketik Alamat">{{ old('address', $user->address) }}</textarea>
  @error('address') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="col-12 form-group mb-3">
  <label for="role" class="required">Role</label>
  <select class="form-select mt-2 select2 @error('role') is-invalid @enderror" name="role" id="role" data-width="100%" required>
    <option value=""></option>
    @foreach (['admin','customer'] as $role)
      <option value="{{ $role }}" {{ old('role', $user->role) == $role ? 'selected' : '' }}>{{ $role }}</option>
    @endforeach
  </select>
  @error('role') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="col-12 form-group mb-3">
  <label for="password" class="">Password Baru <small>(Opsional)</small></label>
  <input type="password" name="password" id="password" class="form-control mt-1 @error('password') is-invalid @enderror" placeholder="Ketik Password Baru">
  @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>
