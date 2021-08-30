<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded=[];

    // tabel_Country-------->tabel_Post-------->tabel_Comment  
    
    public function comments(){

        return $this->hasManyThrough(Comment::class,Post::class);

    }


    //tabel_Country <---1-m----> tabel_Post
    public function posts(){

        return $this->hasMany(Post::class);
    }

 
}
