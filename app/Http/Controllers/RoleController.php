<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  
    public function index()
    {
       
        // $user= User::findOrfail(1)->roles;
        // User::findOrfail(3)->roles()->attach([3]);
        // User::findOrfail(3)->roles()->detach([3]);
        // User::findOrfail([1])->roles()->sync([1]);
        // User::all()->roles()->sync([1]);
       
        // $alluser =  User::all();
        // foreach($alluser as $user){
        // User::findOrfail($user->id)->roles()->sync([1,2,3]);
        // }

        $alluser =  User::all();
        foreach($alluser as $user){

            if($user->email == 'zabernathy@example.com'){

                User::findOrfail($user->id)->roles()->sync([1,2,3]);
            
            }else{
                User::findOrfail($user->id)->roles()->sync([3]);
            }
         }

        // $allrole=Role::all();

        // foreach($allrole as $role){

        //     if($role->name_role == 'admin'){

        //         Role::findOrfail($role->id)->users()->sync([1]);
        //     }else{
        //         Role::findOrfail($role->id)->users()->sync([2,3]);
        //     }
            
        // }

        $user =  User::with('roles')->get();
        return $user;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Role $role)
    {
        //
    }


    public function edit(Role $role)
    {
        //
    }


    public function update(Request $request, Role $role)
    {
        //
    }


    public function destroy(Role $role)
    {
        //
    }
}
