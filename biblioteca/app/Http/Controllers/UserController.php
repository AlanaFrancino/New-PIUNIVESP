<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function listUser(){

       /* teste ok para insert no bd
       $user = new User();
       $user->name = 'Alana Francino';
       $user->email = 'alana_francino@hotmail.com';
       $user->password = Hash::make('Alana2806');
       $user->save();
       echo "teste ok";*/
       $user = User::where('id','1')->first();
       //dd($user); var_dump do laravel
       return view ('listUser',['user'=>$user]);

   }
}
