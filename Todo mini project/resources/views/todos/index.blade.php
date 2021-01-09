@extends('todos.layout')

@section('content')
        <div class="flex justify-between border-b pd-4 px-4">
            <h1 class="text-2xl ">ALL Your Todos</h1>
            <a href="{{route('todo.create')}}"class="mx-5 py-2 text-blue-400 cursor-pointer text-white">
            <span class="fas fa-plus-circle">
            </a>
            
        </div>
            <ul class="my-5">
            <x-alert/>
                @foreach($todos as $todo)
                    <li class="flex justify-between py-2 ">
                        <div>
                            @include('todos.completed-button')
                        </div>
                        @if($todo->completed)
                            <p class="line-through">{{$todo->title}}</p>
                        @else
                            <p>{{$todo->title}}</p>
                        @endif
                        <div>
                            <a href="{{route('todo.edit',$todo->id)}}"class="text-blue-400 cursor-pointer text-white">
                                <span class="fas fa-pencil-alt px-2">
                            </a>
                                <span class="fas fa-minus-circle text-red-400 px-2 cursor-pointer" 
                                onclick="event.preventDefault();
                                if(confirm('Are you really want to delete?')){
                                    document.getElementById('form-delete-{{$todo->id}}')
                                    .submit();}">
                                <form id="{{'form-delete-'.$todo->id}}"style="display:none" method="post" action="{{route('todo.destroy',$todo->id)}}">
                                    @csrf
                                    @method('delete')
                                </form>

                        </div>
                    </li>
                @endforeach
            </ul>
@endsection
