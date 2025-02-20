<x-app-layout>
    <div class="p-6"
        style="max-width: 600px; margin: 0 auto; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Edit Project</h3>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc pl-5 text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- This ensures the form sends a PUT request -->

            <!-- Project Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" required
                    style="width: 100%; padding: 12px; border: 1px solid  rgb(29, 28, 28); border-radius: 5px; background-color:  white;">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" required
                    style="width: 100%; padding: 12px; border: 1px solid rgb(29, 28, 28); border-radius: 5px; background-color:  white;">{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" required
                    style="width: 100%; padding: 12px; border: 1px solid  rgb(29, 28, 28); border-radius: 5px; background-color: white;">
                    <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="images" class="block text-sm font-medium text-gray-700">Project Images</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple>

                <!-- Display Current Images -->
                @if ($project->images->count() > 0)
                    <div class="mt-2">
                        @foreach ($project->images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Project Image"
                                class="w-32 h-32 object-cover">
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 mt-2">No image available for this project.</p>
                @endif
            </div>



            <!-- Submit Button -->
            <button type="submit"
                style="padding: 12px 24px; background-color: #7F55E0; color: white; border-radius: 5px; width: 100%; font-size: 16px; cursor: pointer; border: none;">
                Update Project
            </button>
        </form>
    </div>
</x-app-layout>
