<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function theme()
    {
        $user = User::find(auth()->user()->id);

        if($user->theme === 1){
            $user->theme = 0;
        }else{
            $user->theme = 1;
        }
        
        $user->save();
    }
}
