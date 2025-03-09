@extends('layouts.secondary')

@section('title', 'About Us - Freelance Connect')

@section('content')
<!-- Hero Section with Background Video -->
<section class="relative bg-purple-600 text-white py-20">
    <div class="absolute inset-0 overflow-hidden">
        <video autoplay muted loop class="w-full h-full object-cover">
            <source src="https://www.w3schools.com/html/mov_bbb.mp4"  type="video/mp4">
        </video>
    </div>
    <div class="relative z-10 container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">About Freelance Connect</h1>
        <p class="text-lg mb-8">Connecting clients with top freelancers from around the world, enabling creativity and collaboration.</p>
    </div>
</section>

<!-- About Us Section with More Content -->
<section class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <!-- Section Heading -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-purple-600 mb-4">Our Mission: Empowering Freelancers</h2>
            <p class="text-xl text-gray-700">We bridge the gap between businesses and top freelancers from around the world, enabling seamless collaboration for exceptional results.</p>
        </div>

        <!-- Split Layout with Video -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Side: Freelance Video -->
            <div class="relative">
                <video autoplay muted loop class="w-full h-full object-cover rounded-lg shadow-lg">
                    <source src="https://www.pexels.com/video/a-woman-scrolling-for-pictures-in-a-laptop-3627320/" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40 rounded-lg"></div>
            </div>

            <!-- Right Side: Text Content -->
            <div class="flex flex-col justify-center px-4">
                <h3 class="text-3xl font-semibold text-gray-800 mb-6">What Makes Freelance Connect Unique?</h3>
                <p class="text-lg text-gray-600 mb-6">
                    Freelance Connect isn’t just another freelancing platform. We are a global network of talented professionals who work across industries and time zones, providing flexibility and top-quality results. Whether you're a freelancer or a business, we empower you to work smart, collaborate effectively, and achieve success.
                </p>

                <!-- Bullet Points for Key Features -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-6 7h6" />
                        </svg>
                        <p class="text-gray-600">Access a global pool of top talent</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-6 7h6" />
                        </svg>
                        <p class="text-gray-600">Collaborate in real-time across borders</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-6 7h6" />
                        </svg>
                        <p class="text-gray-600">Flexible project and contract management</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-blue-600 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-6 7h6" />
                        </svg>
                        <p class="text-gray-600">Work from anywhere, anytime</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Our Team Section with Interactive Hover Effects -->
<section class="py-16">
    <div class="container mx-auto px-4 text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Meet Our Team</h2>
        <p class="text-gray-600 mb-8">A passionate and diverse team of professionals working to make Freelance Connect the best platform for freelancers and clients.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($teamMembers as $member)
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:scale-105 transition-transform duration-300">
                    <img src="{{ $member['image'] }}" alt="Portrait of {{ $member['name'] }}" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $member['name'] }}</h3>
                    <p class="text-gray-600 mb-2">{{ $member['role'] }}</p>
                    <p class="text-gray-600">{{ $member['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action (Join Us) Section -->
<section class="bg-purple-600 text-white py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="text-lg mb-8">Join Freelance Connect today and start collaborating with top talents worldwide!</p>
        <a href="/register" class="bg-white text-blue-600 py-2 px-6 rounded-lg font-semibold">Join Now</a>
    </div>
</section>

@endsection
