@extends('layouts.app')

@section('title', $task->title)

@section('content')


<div class="mb-4">
    <a href="{{ route('task.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">
        &larr; Go back to the tasks
    </a>
</div>

<div>
    <a href="{{ route('task.create') }}">Add Task!</a>
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@if ($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
@endif

<p class="mb-4 text-sm text-slate-700">{{ $task->created_at->diffForHumans() }} * Update {{ $task->updated_at->diffForHumans() }}
</p>


<p class="mb-4">
    @if($task->completed)
       <span class="font-medium text-green-500">Completed</span> 
    @else
        <span class="font-medium text-red-500">Not Completed</span>
    @endif
</p>

<div class="flex gap">
    <a href="{{ route('task.edit', ['task' => $task->id]) }}"
        class="rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Edit</a>

    <form method="POST" action="{{ route('task.toggle-complete', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <button type="submit" class=" rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>


<form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class=" rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Delete</button>
</form>
</div>
@endsection
