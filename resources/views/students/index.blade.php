<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800">
            Student Management
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow-md">
        <div class="flex justify-end mb-4">
            <a href="{{ route('students.create') }}"
               class="px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">Add Student</a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded">{{ session('success') }}</div>
        @endif

        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Age</th>
                    <th class="px-4 py-2">Course</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $student->name }}</td>
                    <td class="px-4 py-2">{{ $student->age }}</td>
                    <td class="px-4 py-2">{{ $student->course }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('students.edit', $student) }}"
                           class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="ml-2 text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-app-layout>
