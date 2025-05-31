<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\StudentParents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class StudentParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $parents = StudentParents::with(['user'])
       ->orderBy('created_at','desc')
       ->get();
        return view('pages.Parents.index', compact('parents')); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('pages.Parents.create');
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
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
          ]);  
    
          $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'role'=>'parent',
          ]);  
    
          $parent = StudentParents::create([
            'user_id' => $user -> id,
            'name' => $user -> name,
            'email' => $request -> email,
            'phone' => $request->phone,
            'address' => $request -> address,
          ]);
          
          return redirect()->route('parents.index')
          ->with('success','data berhasil di tambahkan'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the parent record
        $parent = StudentParents::findOrFail($id);
        
        // Find and delete the associated user
        $user = User::findOrFail($parent->user_id);
        $user->delete();
        
        // Delete the parent record
        $parent->delete();

        return redirect()->route('parents.index')
            ->with('success', 'Data berhasil dihapus');
    }
} 
