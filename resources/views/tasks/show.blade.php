@section('title', 'Task')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="max-w-7xl mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{ $task->subject }}</h5>
                @if ($task->user_id == Auth::user()->id || Auth::user()->hasRole('admin'))
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Delete</button>
                    </form>
                @endif
            </div>
            <div class="flow-root">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $task->description }}
                                </p>
                                <p class="mt-3 text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $task->end_date }}
                                </p>
                            </div>
                            <div class="flex-2 min-w-0 ms-4">
                                <div
                                    class="flex min-w-100 items-center text-base font-semibold text-gray-900 dark:text-white">
                                    Status: {{ $task->status }}
                                </div>
                                <div
                                    class="flex min-w-100 items-center text-base font-semibold text-gray-900 dark:text-white">
                                    Priority:&nbsp; <x-priority-badge :task="$task" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                    @if ($task->user_id == Auth::user()->id)
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class="flex text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                            Edit task
                        </a>
                    @endif
                        @role('admin')
                            <form class="ml-auto max-w-sm mt-3" action="{{ route('tasks.updateUser', $task->id) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <label for="user_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change role</label>
                                <select id="user_id" name="user_id"
                                    class="w-48 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($users as $user)
                                        <option name="user_id" value="{{ $user->id }}"
                                            @if ($task->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirm</button>
                            </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
