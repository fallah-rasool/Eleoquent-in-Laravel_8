<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        /*
        Relation has many through
        برای ارتباط بین جدول کشور با جدول کامت ها  جدول پست یک جدول واسطه می یاشد
        */

      //  return Country::all();
      //  return Country::findOrfail(1)->comments;



      
    /*    
        جدول کشور با جدول پست ها رابطه یک  به چند دارد
        همچنین جدول پست ها هم با جدول کامنت ها رابطه یک به چند دارد
        با تعریف رابطه بین انها می توان به داده های انها دست رسی پیدا کرد
    */

     // return Country::findOrfail(1)->posts;
     // return Country::with('posts')->get();
    //  return Country::findOrfail(1)->with('posts')->get();





     
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Country $country)
    {
        //
    }

    public function edit(Country $country)
    {
        //
    }


    public function update(Request $request, Country $country)
    {
        //
    }

    public function destroy(Country $country)
    {
        //
    }
}
