@section('title', 'Users')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                      <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td><a href="{{route('users.show', $user->id)}}">View Profile</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                {{ $users->links() }}
            </div>
        </div>
</x-app-layout>
