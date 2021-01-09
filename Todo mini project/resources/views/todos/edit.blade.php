@extends('todos.layout')

@section('content')
        <div class="flex justify-between border-b pd-4 px-4">
            <h1 class="text-2xl border-b pd-4">Update To-Do List</h1>
            <a href="{{route('todo.index')}}"class="mx-5 py-2 text-blue-500 cursor-pointer text-white">
                <span class="fas fa-arrow-left px-2">
            </a>
        </div>
        <x-alert/>
        <form method="Post" action="{{route('todo.update',$todo->id)}}" class="py-5">
            @csrf
            @method('patch')
            <input type="text" name ="title" value="{{$todo->title}}" class="py-2 px-2 border rounded"/>
            <input type="submit" value="Update"class="py-2 px-2 border rounded"/>
        </form>

@endsection
