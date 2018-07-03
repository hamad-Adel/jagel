<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserControllerAPI extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request->all(),[
            'username'  => 'required|unique:users|min:5|max:255',
            'email'     => 'required|unique:users|max:255||min:10',
            'password'  => 'required|min:8|max:30'
        ]);

        $user = new User();
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->api_token = str_random(60);
        $user->save();
        return response()->json($user);
    }

    public function Login(Request $request)
    {
        $validation = $this->validate($request->all(), [
            'email'     => 'required|email|min:10|max:255',
            'password'  => 'required|min:8|max:30'
        ]);
        if($validation->fails())
            return response()->json(['Errors'=>$validation->errors()->all()]);

        $user = User::where('email', $request->get('email'))->first();
        if(!$user){
            return response()->json(['error'=>'user not found']);
        }
        if (\Hash::check($request->get('password'), $user->password) === false){
            return response()->json(['error'=>'wrong password']);
        }
        return response()->json($user);
    }
}