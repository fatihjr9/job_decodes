<x-client-layout>
    <form action="{{ route('apply-store', $job->job_title ) }}" method="POST" enctype="multipart/form-data" class="w-8/12 mx-auto bg-white p-6 rounded-lg">
        @csrf
        <a href="{{ route('home') }}" class="px-4 py-2 ring-1 ring-gray-200 rounded-lg w-fit">Back to home</a>
        <h5 class="text-xl font-bold mt-6">Pekerjaan yang dilamar : {{ $job->job_title }} - {{ $job->company_name }}</h5>
        <div class="grid grid-cols-1 gap-y-2 my-4">
            <div class="flex flex-col space-y-1">
                <label for="">Formal Photo</label>
                <input type="file" accept="image/*" name="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('photo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col space-y-1">
                <label for="">Fullname</label>
                <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col space-y-1">
                <label for="">Email</label>
                <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col space-y-1">
                <label for="">Phone / Whatsapp</label>
                <input type="text" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col space-y-1">
                <label for="">CV</label>
                <input type="file" name="cv" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('CV')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col space-y-1">
                <label for="">Cover Letter ( optional )</label>
                <textarea name="cover_letter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
            </div>
        </div>
        <button type="submit" class="w-full bg-indigo-500 py-2 rounded-lg text-white font-semibold">Send</button>
    </form>
</x-client-layout>
