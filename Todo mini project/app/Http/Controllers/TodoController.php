<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;

class TodoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
    }
    public function index(){
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }

    public function create(){
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request){
        /* dd(auth()->user()->todos());
        Todo::create($request->all()); */
        auth()->user()->todos()->create($request->all());
        return redirect(route('todo.index'))->with('message','Todo Created Successfully.');
    }

    public function edit(Todo $todo){
        //dd($todo->title);
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request , Todo $todo){
        $todo->update(['title'=>$request->title]);
        return redirect(route('todo.index'))->with('message', 'Todo Updated!');
    }

    public function complete(Todo $todo){
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message', 'Todo Marked Completed!');
    }

    public function incomplete(Todo $todo){
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message', 'Todo Marked Incompleted!');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->back()->with('message', 'Todo Deleted!');
    }
}
