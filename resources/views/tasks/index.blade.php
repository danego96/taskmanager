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
            <div class="mt-3">
                <form method="GET" action="{{ route('tasks.index') }}">
                    <div class="inline-block">
                        <select name="priority" id="status" class="dropdown">
                            <option selected value="" class="btn-secondary dropdown-toggle">Select Priority</option>
                            @foreach ($priorities as $priority)
                            <option class="dropdown-item" value="{{ $priority }}"
                                {{ request('priority') === $priority ? 'selected' : '' }}>{{ $priority }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="inline-block">
                        <select name="status" id="status" class="dropdown">
                            <option selected value="" class="btn-secondary dropdown-toggle">Select Status</option>
                            @foreach ($statuses as $status)
                            <option class="dropdown-item" value="{{ $status }}"
                                {{ request('status') === $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="inline-block">
                        <button type="submit" class="btn btn-dark">Select Filters</button>
                    </div>
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @if (request('status') || request('priority'))
                    <div class="inline-block">
                        <a href="{{ route('tasks.index') }}" class="ml-3 text-red-500">Reset filters</a>
                    </div>
                    @endif

                </form>

                <form method="GET" action="{{route('tasks.index')}}">
                    <select name="sort">
                        <option value="status" @if($sort==='status' ) selected @endif>Status</option>
                        <option value="end_date" @if($sort==='end_date' ) selected @endif>Date</option>
                        <option value="priority" @if($sort==='priority' ) selected @endif>Priority</option>
                    </select>
                    <input type="hidden" name="priority" value="{{ request('priority') }}">
                    <input type="hidden" name="status" value="{{ request('status') }}">
                    <button type="submit">Sort</button>
                </form>
                @foreach ($tasks as $task)
                <div class="mt-3">
                    <x-task-card :task="$task" />
                </div>
                @endforeach
                {{ $tasks->links() }}
            </div>
        </div>
</x-app-layout>