<x-app-layout>
<form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; margin: 20px auto; box-sizing: border-box;">
    @csrf
    <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold; color: #7F55E0;">Project Name</label>
    <input type="text" name="name" id="name" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;">

    <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold; color: #7F55E0;">Description</label>
    <textarea name="description" id="description" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box; resize: vertical; min-height: 100px;"></textarea>

    <label for="status" style="display: block; margin-bottom: 5px; font-weight: bold; color: #7F55E0;">Status</label>
    <select name="status" id="status" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box; cursor: pointer; background-color: #FFEB3B; color: #7F55E0;">
        <option value="in_progress">In Progress</option>
        <option value="completed">Completed</option>
        <option value="pending">Pending</option>
    </select>

   <!-- Image Upload Field -->
   <label for="image" style="display: block; margin-bottom: 5px; font-weight: bold; color: #7F55E0;">Project Images</label>
   <input type="file" name="images[]" id="image" accept="image/*" multiple style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; box-sizing: border-box;">

   <button type="submit" style="background-color: #7F55E0; color: white; padding: 12px 20px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease; width: 100%; margin-top: 10px;">
       Create Project
   </button>
</form>

<script>
    // Add hover effect to button
    const button = document.querySelector('button');
    button.addEventListener('mouseover', () => {
        button.style.backgroundColor = '#6A3AB7';  // Darker shade of purple
    });
    button.addEventListener('mouseout', () => {
        button.style.backgroundColor = '#7F55E0';  // Original purple shade
    });
</script>

</x-app-layout>
