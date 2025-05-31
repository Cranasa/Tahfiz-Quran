<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
       $parents = Classroom::all();
      
        return view('pages.Classroom.index', compact('parents')); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('pages.Classroom.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'name'=> 'required|string|max:255',
            'Deskripsi' => 'required|string|max:200',
          ]);  
    
          $user = Classroom::create([
            'name' => $request->name,
            'description' =>$request->Deskripsi,
          ]);  
    

          return redirect()->route('classroom.index')
          ->with('success','data berhasil di tambahkan'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $parent->load(['user','students.user','students.classRoom']);
     return view('parents.show',compact('parent') );
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
        $classroom = classroom::findOrFail($id);

        dd($classroom->all );
        
        // Find and delete the associated user
        
        // Delete the  record
        $classroom->delete();

        return redirect()->route('classrooms.index')
            ->with('success', 'Data berhasil dihapus');
    }
} 
