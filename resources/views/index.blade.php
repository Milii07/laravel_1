<div>
    Hanna Solution
</div>


@isset($name)
    <div>une jam {{ $name }}</div>
@endisset

@if (count($tasks) > 0)
    @foreach ($tasks as $task)
        <div><a href="{{ route('task.show', ['task' => $task->id]) }}">{{ $task->title }}</a></div>
    @endforeach
@else
    <div>There are no tasks</div>
@endif

@if ($tasks->count())
    <nav>
        {{ $tasks->links() }}
    </nav>
@endif
@endsection
