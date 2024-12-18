@section('title', 'User details')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-12">
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                @foreach ($tasks as $task)
                    <div class="mt-3">
                        <x-task-card :task="$task" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
