@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')

<nav class="mb-4">
    <a href="{{ route('task.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">
        Add Task!
    </a>
</nav>

@if (count($tasks) > 0)
    @foreach ($tasks as $task)
        <div>
            <a href="{{ route('task.show', ['task' => $task->id]) }}"
               @class(['line-through' => $task->completed])>
               {{ $task->title }}
            </a>
        </div>
    @endforeach
@else
    <div>There are no tasks</div>
@endif

@if ($tasks->count())
    <nav class="mt-4">
        {{ $tasks->links() }}
    </nav>
@endif

@endsection

