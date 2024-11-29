@section('title', 'Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3">
                <a href="{{ route('tasks.create') }}"><button type="button" class="btn btn-primary">Add task</button></a>
            </div>
            @foreach ($tasks as $task)
                <div class="mt-3">
                    <x-task-card :task="$task" />
                </div>
            @endforeach
            {{ $tasks->links() }}
        </div>
    </div>
</x-app-layout>
