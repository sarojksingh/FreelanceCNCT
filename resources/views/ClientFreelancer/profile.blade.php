@extends('layouts.secondary')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $freelancer->name }}</h1>
        <p class="mb-2"><strong>Email:</strong> {{ $freelancer->email }}</p>
        <p class="mb-2"><strong>Skills:</strong> {{ $freelancer->skills }}</p>
        <p class="mb-2"><strong>About:</strong> {{ $freelancer->experience }}</p>


    <!-- Freelancer Projects Section -->
    <div class="bg-white shadow rounded p-6 mt-6">
        <h2 class="text-xl font-bold mb-4">Projects by {{ $freelancer->name }}</h2>

        @if ($freelancer->projects->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($freelancer->projects as $project)
                    <div class="bg-gray-100 p-4 rounded shadow">
                        <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($project->description, 100) }}</p>


                        @if ($project->images->count() > 0)
                            <img src="{{ asset('storage/' . $project->images->first()->image) }}"
                                 alt="Project Image" class="w-full h-40 object-cover mt-2 rounded">
                        @endif

                        <a href="{{ route('projects.show', $project->id) }}"
                           class="inline-block bg-purple-500 text-white px-3 py-1 rounded mt-3 hover:bg-blue-600">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No projects available.</p>
        @endif
    </div>

    <!-- Start Chat Button -->
    <a href="{{ route('chat.index', ['otherUserId' => $freelancer->id]) }}"
        class="inline-block bg-purple-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">
         Start Chat
     </a>
 </div>

       <!-- Leave a Review Section -->
<div class="bg-white shadow rounded p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">Give Review to {{ $freelancer->name }}</h2>

    @if(session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @elseif(session('error'))
        <p class="text-red-600">{{ session('error') }}</p>
    @endif

    <form action="{{ route('rate.freelancer', $freelancer->id) }}" method="POST">
        @csrf

        <!-- Review Field -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Your Review</label>
            <textarea name="review" rows="4" class="w-full border rounded p-2" required></textarea>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Submit Review
        </button>
    </form>

</div>


</div>
@endsection
