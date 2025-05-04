<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">
            Edit Student
        </h2>
    </x-slot>

    <div class="max-w-2xl p-6 mx-auto mt-6 bg-white rounded shadow-md">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $student->name) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium text-gray-700">Age</label>
                <input type="number" name="age" value="{{ old('age', $student->age) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('age') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-sm font-medium text-gray-700">Course</label>
                <input type="text" name="course" value="{{ old('course', $student->course) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('course') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('students.index') }}" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
