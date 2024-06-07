<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
  public function index(){
    $pengguna = Auth::user();
    return view('pages.profile.index',[
     'pengguna' => $pengguna,
    ]);
  }

  public function editdata(){
  $pengguna = Auth::user();

   return view('pages.profile.editdata',[
     'pengguna' => $pengguna,
   ]);
  }

  public function storeEditData(Request $request){
   $request->validate([
     'name' => 'required',
     'role' => 'required',
     'address' => 'nullable',
     'email' => 'required|unique:users,email,' . auth()->user()->id,
     'password' => 'nullable',
   ]);

   !filled($request->password)
           ? Auth::user()->update($request->except('password'))
           : Auth::user()->update($request->all());

    return back()->withSuccess('Data berhasil diperbarui!');
  }

  public function editfoto(){
   $pengguna = Auth::user();
   return view('pages.profile.editfoto',[
     'pengguna' => $pengguna,
   ]);
  }

  public function storeEditFoto(Request $request){
   $request->validate([
     'files' => ['image', 'required'],
   ]);

   $files = $request->file('files');
   if ($request->hasFile('files')) {
     $extension        = $files->getClientOriginalExtension();
     $filenamesimpan   = 'img' . time() . Auth::id(). Str::random(10) . '.' . $extension;
     $files->move('img/profile/', $filenamesimpan);

     if (Auth::user()->foto != 'profile.jpg'){
       $filegambar = public_path('/img/profile/' . Auth::user()->foto );
       File::delete($filegambar);
     }

     Auth::user()->update([
       'foto' => $filenamesimpan
     ]);

   }

   return back()->withSuccess('Foto profil berhasil diperbarui!');
  }

}
