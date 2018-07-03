<?php

namespace App\Http\Controllers;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.all', compact('users'));
    }

    public function add()
    {
        return view('users.add');

    }

    public function insert(Request $request)
    {
        $rules = [
            'title'=>'required|min:5|max:150',
            'body'=>'required|min:20'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
            return back()->withInput()->withErrors($validator);

        $post = new User();
        $post->username = $request->get('username');
        $post->email = $request->get('email');
        $post->save();
    }
}
