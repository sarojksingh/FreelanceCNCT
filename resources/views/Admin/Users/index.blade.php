@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-4">Manage Users</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Add New User</a>

        <table class="min-w-full mt-4">
            <thead>
                <tr>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">Role</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="py-2 px-4 border">{{ $user->name }}</td>
                        <td class="py-2 px-4 border">{{ $user->email }}</td>
                        <td class="py-2 px-4 border">{{ $user->role }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
