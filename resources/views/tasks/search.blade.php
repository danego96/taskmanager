@section('title', 'Search results')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <div class="mt-3">
                            <x-task-card :task="$task" />
                        </div>
                    @endforeach
                    @else
                        Sorry, no results found.
                    @endif
                    {{$tasks->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
