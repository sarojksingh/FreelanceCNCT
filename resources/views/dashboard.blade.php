<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Heroicons (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/heroicons@2.0.18/dist/heroicons.min.js"></script>
</head>
<x-app-layout>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen">
        {{-- <!-- Sidebar -->
        <div class="w-64 bg-[#7F55E0] text-white flex flex-col">
            <div class="py-6 px-4">
                <h1 class="text-2xl font-bold">Freelancer</h1>
            </div>
            <nav class="flex-grow">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded {{ request()->routeIs('dashboard') ? 'bg-[#6A45C4]' : 'hover:bg-[#6A45C4]' }}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('projects') }}" class="flex items-center p-2 rounded {{ request()->routeIs('projects') ? 'bg-[#6A45C4]' : 'hover:bg-[#6A45C4]' }}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="ml-2">Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('clients.index') }}" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18m-9 4h9"></path>
                            </svg>
                            <span class="ml-2">Client</span>
                        </a>
                    </li>
                    <li>
                        <a href="/messages" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            <span class="ml-2">Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18m-9 4h9"></path>
                            </svg>
                            <span class="ml-2">Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="flex items-center p-2 rounded {{ request()->routeIs('projects') ? 'bg-[#6A45C4]' : 'hover:bg-[#6A45C4]' }}">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v12l3-3 4 4 5-5 3 3V3"></path>
                            </svg>
                            <span class="ml-2">Profile</span>
                        </a>
                    </li>
                    <!-- Sidebar items -->
                </ul>
            </nav>
        </div> --}}

        <!-- Main Content -->
        <div class="flex-grow bg-gray-100 dark:bg-gray-900">
            <div class="p-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Welcome, {{ auth()->user()->name }}!</h3>
                        <p class="mt-4 text-gray-600 dark:text-gray-400">Manage your profile, explore job offers, and track your active projects.</p>

                        <!-- Active Projects Section -->
                        <div class="mt-8">
                            <h4 class="text-xl font-bold text-gray-800 dark:text-gray-200">Your Active Projects</h4>


                            <!-- Projects List -->
                            <div class="mt-4 space-y-4">
                                @foreach($projects as $project)
                                <!-- Project -->
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-md flex justify-between items-center">
                                    <div>
                                        <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $project->name }}</h5>
                                        <p class="text-gray-600 dark:text-gray-400">Status: {{ ucfirst($project->status) }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" data-modal-toggle="edit-project-modal-{{ $project->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Project Modal -->
    <div id="add-project-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-96">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Add New Project</h2>
            <form action="{{ route('project.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300">Project Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 dark:text-gray-300">Status</label>
                    <select id="status" name="status" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded" required>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#7F55E0] hover:bg-[#6A45C4] text-white py-2 px-4 rounded">Save Project</button>
                    <button type="button" class="ml-2 bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded" data-modal-toggle="add-project-modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Project Modal -->
    @foreach($projects as $project)
    <div id="edit-project-modal-{{ $project->id }}" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-96">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Edit Project</h2>
            <form action="{{ route('projects.update', $project->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300">Project Name</label>
                    <input type="text" id="name" name="name" value="{{ $project->name }}" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 dark:text-gray-300">Status</label>
                    <select id="status" name="status" class="w-full p-2 mt-2 border border-gray-300 dark:border-gray-600 rounded" required>
                        <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-[#7F55E0] hover:bg-[#6A45C4] text-white py-2 px-4 rounded">Update Project</button>
                    <button type="button" class="ml-2 bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded" data-modal-toggle="edit-project-modal-{{ $project->id }}">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <script>
        // Simple modal toggle script
        document.querySelectorAll('[data-modal-toggle]').forEach((button) => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                document.getElementById(modalId).classList.toggle('hidden');
            });
        });
    </script>
</body>
</x-app-layout>
</html>
