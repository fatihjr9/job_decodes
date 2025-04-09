<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="p-6" method="POST" action="{{ route('admin-job-update', $job->job_title) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Company name</label>
                            <input type="text" name="company_name" value="{{ old('company_name', $job->company_name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required />
                            @error('company_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Company logo</label>
                            <input type="file" name="company_logo" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            @if ($job->company_logo)
                                <p class="text-sm text-gray-600 mt-2">Current Logo:</p>
                                <img src="{{ asset('storage/' . $job->company_logo) }}" class="w-20 h-20 object-contain mb-2 border" />
                            @endif
                            @error('company_logo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>                        
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Job Title</label>
                            <input type="text" name="job_title" value="{{ old('job_title', $job->job_title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('job_title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Department</label>
                            <input type="text" name="department" value="{{ old('department', $job->department) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('department')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Published at</label>
                            <input type="date" value="{{ old('published_at', \Carbon\Carbon::parse($job->published_at)->format('Y-m-d')) }}" name="published_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('published_at')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Expired at</label>
                            <input type="date" value="{{ old('expired_at', \Carbon\Carbon::parse($job->expired_at)->format('Y-m-d')) }}" name="expired_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('expired_at')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="active" {{ old('status', $job->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="nonactive" {{ old('status', $job->status) === 'nonactive' ? 'selected' : '' }}>Nonactive</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                            <input type="text" name="location" value="{{ old('location', $job->location) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required />
                            @error('location')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Job Description</label>
                        <div id="editor"></div>
                        <input type="hidden" name="description" id="description" value="{{ old('description', $job->description) }}">
                        @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full py-2 text-lg mt-4 bg-black text-white rounded-lg">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            var content = document.querySelector("#description").value;
            quill.root.innerHTML = content;
            quill.on('text-change', function () {
                document.querySelector("#description").value = quill.root.innerHTML;
            });
            document.querySelector("form").addEventListener("submit", function () {
                document.querySelector("#description").value = quill.root.innerHTML;
            });
        });
    </script>        
</x-app-layout>