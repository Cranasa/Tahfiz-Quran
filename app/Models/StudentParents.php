<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParents extends Model
{
    use HasFactory;

    protected $table = 'student_parents';
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


