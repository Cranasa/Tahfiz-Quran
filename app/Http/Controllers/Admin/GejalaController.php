<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('pages.admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('pages.admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:gejalas,kode',
            'nama_gejala' => 'required'
        ]);

        Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'kode' => 'required|unique:gejalas,kode,' . $gejala->id,
            'nama_gejala' => 'required'
        ]);

        $gejala->update($request->all());

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus');
    }
}

