<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Kerusakan;
use App\Models\BasisPengetahuan;
use App\Models\Diagnosa;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function form()
    {
        $gejalas = Gejala::all();
        return view('diagnosa.form', compact('gejalas'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'gejala' => 'required|array|min:1',
        ]);

        $gejalaInput = $request->gejala; // array of gejala_id
        $cfUser = 1; // misal diasumsikan user sangat yakin

        $hasil = [];

        $kerusakans = Kerusakan::all();

        foreach ($kerusakans as $kerusakan) {
            $cfGabungan = null;

            $basis = BasisPengetahuan::where('kerusakan_id', $kerusakan->id)
                        ->whereIn('gejala_id', $gejalaInput)
                        ->get();

            foreach ($basis as $row) {
                $cf = $row->cf_pakar * $cfUser;

                if (is_null($cfGabungan)) {
                    $cfGabungan = $cf;
                } else {
                    $cfGabungan = $cfGabungan + $cf * (1 - $cfGabungan);
                }
            }

            if (!is_null($cfGabungan)) {
                $hasil[] = [
                    'kerusakan' => $kerusakan,
                    'cf' => round($cfGabungan, 4),
                ];
            }
        }

        usort($hasil, fn($a, $b) => $b['cf'] <=> $a['cf']); // urutkan dari terbesar

        $diagnosa_terbaik = $hasil[0] ?? null;

        if ($diagnosa_terbaik) {
            Diagnosa::create([
                'user_id' => Auth::id(),
                'gejala_terpilih' => json_encode($gejalaInput),
                'kerusakan_id' => $diagnosa_terbaik['kerusakan']->id,
                'hasil_cf' => $diagnosa_terbaik['cf'],
            ]);
        }

        return view('diagnosa.hasil', compact('hasil', 'gejalaInput'));
    }
}

