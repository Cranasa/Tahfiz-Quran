<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ustad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UstadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ustad = Ustad::with(['user'])
       ->orderBy('created_at','desc')
       ->get();
        return view('pages.Ustad.index', compact('ustad')); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('pages.ustad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:200',
            'password' => ['required','confirmed',Rules\Password::defaults()],
            'nip' => 'required|string|max:20',
            'speciallization' => 'required|string|max:255',
          ]);  
    
          $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'role'=>'guru',
          ]);  
    
          $ustad = ustad::create([
            'user_id' => $user -> id,
            'nip' => $user -> nip,
            'specialtization' => $request -> specialization,
           
          ]);
          
          return redirect()->route('ustad.index')
          ->with('success','data berhasil di tambahkan'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $ustad->load(['user','ustad.user','ustad.classRoom']);
     return view('ustad.show',compact('parent') );
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('teacher.edits', compact('teacher'));
        
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email'=>'required|email|string|max:255|unique:users,email,'.$teacher->user_id,
        'nip' => 'required|string|max:20|unique;teacher,nip,'.$teacher->id,
        'specialization'=> 'required|string|max:100',
      ]);

      $teacher->user->update([
        'name' => $request->name,
        'email' => $request->email,


      ]);

      $ustad->update([
        'nip'=> $request->nip,
        'specialization' => $request->specialization,


      ]);
     
      if ($request->filled('password')){
        $request->validate([
            'password' => ['confirmed', Rules\password::defaults()],
        ]);

        $ustad->user->update([
            'password' => Hash::make($request->password),
        ]);
      }
      return redirect()->route('ustad.index')
                        ->with('success','Data ustad/Pembinan berhasil diperbarui');
     
     
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the parent record
        $ustad = ustad::findOrFail($id);
        
        // Find and delete the associated user
        $user = User::findOrFail($ustad->user_id);
        $user->delete();
        
        // Delete the parent record
        $ustad->delete();

        return redirect()->route('ustad.index')
            ->with('success', 'Data berhasil dihapus');
    }
} 
