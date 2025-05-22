<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisPengetahuan extends Model
{
    use HasFactory;

    protected $fillable = ['gejala_id', 'kerusakan_id', 'cf_pakar'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class);
    }
}

