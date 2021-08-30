<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function country(){
        return $this->belongsTo(Country::class);
    }


     //tabel_Post <---1-m----> tabel_Comment
     
     public function Comments(){

         return $this->hasMany(Comment::class);

     }
}
