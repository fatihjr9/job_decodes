<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6" method="POST" action="{{ route('admin-update-user', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
                            @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="text" name="email" value="{{ old('email', $user->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>admin</option>
                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>user</option>
                            </select>
                        </div>                        
                    </div>
                    <button type="submit" class="w-full py-2 text-lg mt-4 bg-black text-white rounded-lg">Create</button>
                </form>
            </div>
        </div>
    </div>   
</x-app-layout>
