<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', ['todos' => $todos]);
    }

    public function store()
    {
        $attribute = request()->validate([
            'title' => 'required',
        ]);

        Todo::create($attribute);
        return redirect('/dashboard');
    }

    public function update(Todo $todo) // i got to use Controler - Model binding here
    {
        $todo->update(['isDone' => true]);
        return redirect('/dashboard');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/dashboard');
    }
}
