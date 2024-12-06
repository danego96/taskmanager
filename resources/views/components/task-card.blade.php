<div class="card mb-3">
    <a href="{{route('tasks.show', $task->id)}}" style="text-decoration:none">
    <div class="card-body">
        <x-priority-badge :task="$task" />
        <h5 class="card-title font-weight-bold h4">{{ $task->subject }}</h5>
        <p class="card-text">{{ $task->description }}</p>
        <p class="card-text"><small class="text-muted">Till date: {{ $task->end_date }}</small></p>
        <a href="{{route('tasks.index', ['created_by' => $task->user->name])}}"><p class="card-text"><small class="text-muted">Created by {{ $task->user->name }}</small></p></a>
    </div>
</a>
</div>