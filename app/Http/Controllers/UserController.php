<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Index
    public function index(Request $request) {
      $users = User::query();

      if ($request->role) $users->where('role', $request->role);
      return view('pages.user.index',[
        'users' => $users->get(),
      ]);
    }

    // Create
    public function create(){
      return view('pages.user.create');
    }

    // Store
    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'address' => 'nullable',
        'role' => 'required',
        'password' => 'required',
      ]);

      User::create($request->all());
      return redirect(route('user.index'))->withSuccess('Data berhasil ditambahkan!');
    }

    // Show
    public function show(User $user){
      return view('pages.user.show', compact('user'));
    }

    // Edit
    public function edit(User $user){
    return view('pages.user.edit', compact('user'));
    }

    // Update
    public function update(Request $request, User $user){
      $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,' . $user->id,
        'address' => 'nullable',
        'role' => 'required',
        'password' => 'nullable',
      ]);

      filled($request->password)
        ? $user->update($request->all())
        : $user->update($request->except('password'));

      return redirect(route('user.index'))->withSuccess('Data berhasil diperbarui!');
    }

    // Delete
    public function destroy(Request $request, User $user){
      $user->delete();
      return redirect(route('user.index'))->withSuccess('Data berhasil dihapus!');
    }
}
