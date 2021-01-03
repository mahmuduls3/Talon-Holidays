<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function login(Request $request){
        $match = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = User::where($match)
                    ->get()->first();
        if($user){
            $request->session()->put('user', $request->email);
            return redirect()->route('index');
        } else {
            $request->session()->flash('loginError');
            return redirect()->route('loginIndex');
        }
        // --For Query Builder-- //
        // $user = DB::table('users')
        //             ->where([
        //                 ['email', $request->email],
        //                 ['password', $request->password]
        //                 ])->get()->first();
        // if($user){
        //     $request->session()->put('user', $request->email);
        //     return redirect()->route('index');
        // } else {
        //     $request->session()->flash('loginError');
        //     return redirect()->route('loginIndex');
        // }
    }

    public function register(Request $request){
        $validate = $request->validate([
            'name' => 'required | min: 4 | max: 255',
            'email' => 'required | email | min: 5',
            'password' => 'required | min: 5 | confirmed',             
        ]);

        if($validate){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            $request->session()->flash('newUser', $request->name);
            return redirect()->route('loginIndex');    
        }

        
    }
}
