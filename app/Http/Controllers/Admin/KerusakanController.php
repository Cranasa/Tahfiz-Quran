<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kerusakan;

class KerusakanController extends Controller
{
    public function index()
    {
        $kerusakans = Kerusakan::all();
        return view('pages.admin.kerusakan.index', compact('kerusakans'));
    }

    public function create()
    {
        return view('pages.admin.kerusakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kerusakans,kode',
            'nama_kerusakan' => 'required',
            'solusi' => 'nullable'
        ]);

        Kerusakan::create($request->all());

        return redirect()->route('kerusakan.index')->with('success', 'Kerusakan berhasil ditambahkan');
    }

    public function edit(Kerusakan $kerusakan)
    {
        return view('admin.kerusakan.edit', compact('kerusakan'));
    }

    public function update(Request $request, Kerusakan $kerusakan)
    {
        $request->validate([
            'kode' => 'required|unique:kerusakans,kode,' . $kerusakan->id,
            'nama_kerusakan' => 'required',
            'solusi' => 'nullable'
        ]);

        $kerusakan->update($request->all());

        return redirect()->route('kerusakan.index')->with('success', 'Kerusakan berhasil diperbarui');
    }

    public function destroy(Kerusakan $kerusakan)
    {
        $kerusakan->delete();
        return redirect()->route('kerusakan.index')->with('success', 'Kerusakan berhasil dihapus');
    }
}

