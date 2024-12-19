@section('title', 'User details')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @role('admin')
        <form class="max-w-sm mx-auto mt-3" action="{{route('users.updateRole', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change role</label>
            <select id="role" name="role" class="inline-block w-48 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($roles as $role)
                <option name="role" value="{{$role->name}}" @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="inline-block text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirm</button>
          </form>
          @endrole
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
