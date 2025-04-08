<x-client-layout>
    <div class="grid grid-cols-1 lg:grid-cols-8 gap-4">
        <div class="col-span-6 flex flex-col p-4 bg-white rounded-lg shadow-md h-fit">
            <a href="{{ route('home') }}" class="px-4 py-2 ring-1 ring-gray-200 rounded-lg w-fit mb-4">Back to home</a>
            <h5 class="font-bold text-2xl">{{ $job->job_title }}</h5>
            <div class="grid grid-cols-1 lg:grid-cols-2 space-y-2 border-y py-1 my-2">
                <div class="flex flex-row items-center gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>                        
                    <p class="text-gray-500 text-sm">Job Publish : {{ $job->published_day }}</p>
                </div>
                <div class="flex flex-row items-center gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>          
                    <p class="text-gray-500 text-sm">Job Expired : {{ $job->expired_day }}</p>
                </div>
                <div class="flex flex-row items-center gap-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>     
                    <p class="text-gray-500 text-sm">{{ $job->location }}</p>
                </div>
                <div class="flex flex-row items-center gap-x-1">
                    <img class="w-8 h-8 bg-center p-1 bg-slate-100 rounded-full" src="{{ asset('storage/' . $job->company_logo) }}" alt="Logo">       
                    <p class="text-gray-500 text-sm">{{ $job->company_name }}</p>
                </div>
            </div>
            <div class="flex flex-col space-y-0.5 my-2">
                <h5 class="text-lg font-semibold">Deskripsi Pekerjaan :</h5>
                <p>{!! $job->description !!}</p>
            </div>
            @if (auth()->check())
                @if ($hasApplied)
                    <span class="w-full text-center py-2 rounded-lg bg-gray-500 text-white font-semibold">You've already apply this job</span>
                @else
                    <a href="{{ route('apply', $job->job_title) }}" class="w-full text-center py-2 rounded-lg bg-indigo-500 text-white font-semibold">Apply Now</a>
                @endif
            @else
                <a href="{{ route('apply', $job->job_title) }}" class="w-full text-center py-2 rounded-lg bg-indigo-500 text-white font-semibold">Apply Now</a>
            @endif
        </div>
        <div class="col-span-2 ms-auto w-full">
            @foreach ($jobPreference as $job)
                <x-job-card :job="$job" />
            @endforeach
        </div>
    </div>
</x-client-layout>
