<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function posts(){

        return $this->morphedByMany(Post::class,'taggable');

    }

    public function product(){

        return $this->morphedByMany(Product::class,'taggable');

    }
}
