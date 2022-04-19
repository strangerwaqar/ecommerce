<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){
        
        $user= User::where(['email'=>$req->email])->first();
       // return $user->email;
        if(!$user || !Hash::check($req->password,$user-> password)){
            return "<script>alert('User Name or password is not matched')
            </script>";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
