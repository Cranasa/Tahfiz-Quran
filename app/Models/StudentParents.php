<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParents extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name','email', 'phone', 'address'];


    public function user(){
        return $this->belongsto(User::class);
    }

    // public function students(){
    //     return $this->hasMany(Student::class, 'parent_id');
    // }
}

