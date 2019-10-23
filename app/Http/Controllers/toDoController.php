<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\toDo;

class toDoController extends Controller
{
     public function insert(Request $request)
    {
        toDo::create([
            'user_id' => auth()->user()->id,
            'title' => $request['title'],
            'desc' => $request['desc'],
            
        ]);
        return redirect()->back();
    }
    public function display()
    {
        $todos = toDo::all();
        return view('todos',['todos' => $todos]);
    }
    public function delete($id)
    {
        $todo = toDo::where('id', $id)->first();
        $todo->delete();
        return redirect()->back();
    }
}
