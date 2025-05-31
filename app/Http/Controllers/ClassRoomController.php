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
        $class = Classroom::findOrFail($id);
        if (!$class) {
            return redirect()->route('classroom.index')->with('error', 'Data Kelas tidak ditemukan');
        }
        $class->delete();
        return redirect()->route('classroom.index')->with('success', 'Data Kelas berhasil dihapus');
    }

} 
