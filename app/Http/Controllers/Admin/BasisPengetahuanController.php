<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\BasisPengetahuan;

class BasisPengetahuanController extends Controller
{
    public function index()
    {
        $data = BasisPengetahuan::with(['gejala', 'kerusakan'])->get();
        return view('pages.admin.basis_pengetahuan.index', compact('data'));
    }

    public function create()
    {
        $gejalas = Gejala::all();
        $kerusakans = Kerusakan::all();
        return view('pages.admin.basis_pengetahuan.create', compact('gejalas', 'kerusakans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gejala_id' => 'required|exists:gejalas,id',
            'kerusakan_id' => 'required|exists:kerusakans,id',
            'cf_pakar' => 'required|numeric|min:0|max:1',
        ]);

        BasisPengetahuan::create($request->all());

        return redirect()->route('basis-pengetahuan.index')->with('success', 'Basis pengetahuan berhasil ditambahkan');
    }

    public function destroy(BasisPengetahuan $basis_pengetahuan)
    {
        $basis_pengetahuan->delete();
        return redirect()->route('basis-pengetahuan.index')->with('success', 'Data berhasil dihapus');
    }
}

