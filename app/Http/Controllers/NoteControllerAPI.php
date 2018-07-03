<?php

namespace App\Http\Controllers;

use App\note;
use App\User;
use Illuminate\Http\Request;

class NoteControllerAPI extends Controller
{

    public function addNote(Request $request)
    {
        $user_id = User::where('api_token', $request->get('api_token'))->first()->id;
        $note = new note();
        $note->user_id  = $user_id;
        $note->title = $request->get('title');
        $note->save();
        return response()->json($note);
    }
}
