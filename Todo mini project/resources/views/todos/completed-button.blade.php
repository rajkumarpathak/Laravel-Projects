@if($todo->completed)
<span onclick="event.preventDefault();
    document.getElementById('form-incomplete-{{$todo->id}}')
    .submit();"
    class="fas fa-check text-green-400 cursor-pointer px-2">
<form id="{{'form-incomplete-'.$todo->id}}"style="display:none" method="post" action="{{route('todo.incomplete',$todo->id)}}">
@csrf
@method('delete')
</form>
@else
<span onclick="event.preventDefault();
    document.getElementById('form-complete-{{$todo->id}}')
    .submit();"
    class="fas fa-check text-gray-300 cursor-pointer px-2">
<form id="{{'form-complete-'.$todo->id}}"style="display:none" method="post" action="{{route('todo.complete',$todo->id)}}">
@csrf
@method('put')
</form>
@endif