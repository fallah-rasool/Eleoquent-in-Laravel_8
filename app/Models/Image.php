<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded=[];


    /**
     * 
     * polymorphic relation one to one
     * 
     *         |<-----> Post
     * image --|<-----> Product
     *         |<-----> slider
     *        
     */
    /**
     * برای نام گذاری تابع باید دقیقا نامی باشد که در مایگریشن قرار دادیم 
     *برای نام گذاری از 
     * imagePolyیا image_poly
     * استفاده کرد
     */

   
    public function imagePoly(){

        return $this->morphTo();

    }
}
