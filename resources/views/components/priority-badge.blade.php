@if ($task->priority == "low")
<span class="badge badge-success">{{ $task->priority }}</span>
@elseif(($task->priority == "medium"))
<span class="badge badge-primary">{{ $task->priority }}</span>
@elseif($task->priority == "high")
<span class="badge badge-warning">{{ $task->priority }}</span>
@elseif($task->priority = "urgent")
<span class="badge badge-danger">{{ $task->priority }}</span>
@endif