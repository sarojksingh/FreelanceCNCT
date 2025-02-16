@extends('layouts.secondary')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $freelancer->name }}</h1>
        <p class="mb-2"><strong>Email:</strong> {{ $freelancer->email }}</p>
        <p class="mb-2"><strong>Skills:</strong> {{ $freelancer->skills }}</p>
        <p class="mb-2"><strong>About:</strong> {{ $freelancer->profile_description }}</p>

        <!-- Start Chat Button -->
        <a href="{{ route('chat.index', ['otherUserId' => $freelancer->id]) }}"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mt-4">
            Start Chat
        </a>
    </div>
</div>
@endsection
