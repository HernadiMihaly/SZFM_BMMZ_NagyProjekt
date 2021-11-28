<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        file_put_contents("logincontroller.log", "login".PHP_EOL);
        file_put_contents("logincontroller.log", strval($request).PHP_EOL, FILE_APPEND);
        $email = $data["email"];
        $password = $data["password"];
        file_put_contents("logincontroller.log", strval($email).PHP_EOL, FILE_APPEND);
        file_put_contents("logincontroller.log", strval($password).PHP_EOL, FILE_APPEND);
        $users = User::where('email',$email)->get();
        if (count($users) == 1) {
            $user = $users[0];
            if (Hash::check($password, $user->password)) {
                $token = $user->createToken('kerdoiv_token')->plainTextToken;

                $response = [
                    'user' => $user,
                    'token' => $token
                ];

                return response($response, 201);
            }
            
        }
        return response([
            'message' => ['Hibás felhasználónév vagy jelszó.']
        ], 404);
    }
 
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = new User;
        $email = $data["email"];
        $password = $data["password"];
        $password = Hash::make($password);
        $name = $data["name"];
        $users = User::where('email',$email)->get();
        if (count($users) == 0) {
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->is_admin = false;  
            $user->save();
            return response([
                'message' => ['Felhasználó létrehozva.']
            ], 201);
        }
        return response([
            'message' => ['Már van felhasználó ilyen e-mail címmel.']
        ], 404);
    }

    
}
