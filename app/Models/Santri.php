<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    use HasFactory;

    protected $table = 'santri';

    protected $fillable = ['user_id','class_room_id','parent_id','nis', 'birth_date', 'gender','address',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function classRoom(){
        return $this->belongsTo(ClassRoom::class,'class_room_id');
    }
    public function parent(){
        return $this->belongsTo(StudentParent::class,'parent_id');
    }
    public function ayats(){
        return $this->hasMany(Ayat::class);
    }
    public function attendances(){
        return $this->hasMany(Attendace::class);
    }
}


