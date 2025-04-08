<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6" method="POST" action="{{ route('admin-job-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Company name</label>
                            <input type="text" name="company_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
                            @error('company_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Company logo</label>
                            <input type="file" type="image" name="company_logo" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Job Title</label>
                            <input type="text" name="job_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('job_title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Department</label>
                            <input type="text" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('department')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Published at</label>
                            <input type="date" name="published_at"  min="{{ now()->toDateString() }}" value="{{ now()->toDateString() }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Expired at</label>
                            <input type="date" name="expired_at" min="{{ now()->toDateString() }}" value="{{ now()->toDateString() }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="" name="status"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="active">Active</option>
                                <option value="nonactive">Non Active</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                            <input type="text" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('location')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Job Description</label>
                        <div id="editor"></div>
                        <input type="hidden" name="description" id="description">
                        @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full py-2 text-lg mt-4 bg-black text-white rounded-lg">Create</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            quill.on('text-change', function() {
                document.querySelector("#description").value = quill.root.innerHTML;
            });
            document.querySelector("form").addEventListener("submit", function() {
                document.querySelector("#description").value = quill.root.innerHTML;
            });
        });
    </script>    
</x-app-layout>
