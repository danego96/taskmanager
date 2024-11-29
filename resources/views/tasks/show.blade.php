@section('title', 'Task')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{$task->subject}}</h5>
                <a href="{{route('tasks.edit',$task->id)}}" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Edit task
                </a>
            </div>
            <div class="flow-root">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    <div class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$task->description}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{$task->end_date}}
                                </p>
                            </div>
                            <div class="flex-2 min-w-0 ms-4">
                            <div class="flex min-w-100 items-center text-base font-semibold text-gray-900 dark:text-white">
                                Status: {{$task->status}}
                            </div>
                            <div class="flex min-w-100 items-center text-base font-semibold text-gray-900 dark:text-white">
                              Priority:  {{$task->priority}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
