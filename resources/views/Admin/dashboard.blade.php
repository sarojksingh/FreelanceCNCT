<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Heroicons (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/heroicons@2.0.18/dist/heroicons.min.js"></script>
</head>


<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-6 space-y-6">
            <h2 class="text-2xl font-bold">Admin Panel</h2>

            <div class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 hover:bg-gray-700 p-2 rounded-md">
                    <x-heroicon-o-home class="h-5 w-5" />
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-2 hover:bg-gray-700 p-2 rounded-md">
                    <x-heroicon-o-users class="h-5 w-5" />
                    <span>Manage Users</span>
                </a>

            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow bg-gray-100 dark:bg-gray-900 p-6">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">Admin Dashboard</h1>
                    <p class="text-lg mb-4">Manage users, including clients and freelancers.</p>

                    <a href="{{ route('admin.users.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Manage Users</a>
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
                </div>
            </div>
        </div>

    </div>

</body>

</html>
