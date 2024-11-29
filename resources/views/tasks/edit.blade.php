@section('title', 'Edit task')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="mx-10" action="{{route('tasks.update', $task->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Enter Task subject" value="{{$task->subject}}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description" placeholder="Describe your task">{{$task->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="priority">
                                <option selected>{{$task->priority}}</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm" name="status">
                                <option selected>{{$task->status}}</option>
                                <option value="draft">Draft</option>
                                <option value="open">Open</option>
                                <option value="in progress">In progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="end_date">Resolution date</label>
                            <input id="end_date" name="end_date" class="form-control" type="date" value="{{$task->end_date}}" />
                        </div>
                        <button type="submit" class="btn btn-dark">Edit task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>