<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guardad=[];


    /**
     * 
     * polymorphic relation one to one
     * 
     *         |<-----> Post
     * image --|<-----> Product
     *         |<-----> slider
     *        
     */

   
    public function Imageable(){

        return $this->morphTo();

    }
}
