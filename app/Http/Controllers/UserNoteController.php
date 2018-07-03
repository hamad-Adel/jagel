<?php
namespace App\Http\Controllers;

class UserNoteController extends Controller
{
    protected $user_id;

    public function setID($id)
    {
        $this->checkUser($id);
        $this->user_id = $id;
        return $this;
    }

    public function checkUser($id)
    {
        $user = \App\User::find($id);
        if(!$user)
            throw new \Exception('user not found');

        return $this;
    }

    public function AddNote($title)
    {
        $note = new \App\note();
        $note->user_id = $this->user_id;
        $note->title = $title;
        $note->save();
        return  'Note Saved successfully';
    }
}
