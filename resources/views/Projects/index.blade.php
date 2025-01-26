<!-- resources/views/projects/index.blade.php -->
<x-app-layout>

    <div class="flex h-screen">
        <!-- Sidebar -->
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
                        <a href="#" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18m-9 4h9"></path>
                            </svg>
                            <span class="ml-2">Client</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
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
                        <a href="#" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v12l3-3 4 4 5-5 3 3V3"></path>
                            </svg>
                            <span class="ml-2">Profile</span>
                        </a>
                    </li>
                    <!-- Add other sidebar items here -->
                </ul>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6 overflow-y-auto">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Your Projects</h3>

            <div class="mt-4">
                <a href="{{ route('projects.create') }}" class="bg-[#7F55E0] hover:bg-[#6A45C4] text-white font-bold py-2 px-4 rounded">
                    Add New Project
                </a>
            </div>

            <div class="mt-4 space-y-4">
                @forelse($projects as $project)
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-md flex justify-between items-center">
                        <div>
                            <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $project->name }}</h5>
                            <p class="text-gray-600 dark:text-gray-400">Status: {{ ucwords(str_replace('_', ' ', $project->status)) }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('projects.edit', $project->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">No projects found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
