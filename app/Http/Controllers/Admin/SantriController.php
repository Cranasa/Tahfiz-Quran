<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\santri;
use App\Models\ustad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $santri = Santri::with(['user'])
       ->orderBy('created_at','desc')
       ->get();
        return view('pages.santri.index', compact('santri')); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('pages.santri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8',
            'nis' => 'required|unique:stedents,nis',
            'class_room_id' => 'required|exists:stundent_parents,id',
            'parent_id' => 'required|exists:student_parent,id',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
          ]);  

          
    
          $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => brcrypt($validate['password']),
            'role'=>'student',
          ]);  
          

          $santri = Santri::create([
            'user_id' => $user -> id,
            'class_room_id' => $validate['class_room_id'],
            'parent_id' => $validate['parents_id'],
            'nis' => $validate['nis'],
            'birth_date' => $validate['birth_date'],
            'gender' => $validate['gender'],
            'address' => $validate['address'],
           
          ]);
          
          return redirect()->route('Santriindex')
          ->with('success','santri berhasil di tambahkan'); //
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
