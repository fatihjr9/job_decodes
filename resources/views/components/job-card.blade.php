@props(['job'])
<div class="bg-white shadow-md rounded-lg p-4 mb-4 ">
    <h5 class="font-semibold text-lg">{{ $job->job_title }}</h5>
    <div class="flex flex-col space-y-2 border-y py-1 my-2">
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
    </div>
    <div class="grid grid-cols-2 mb-2 text-gray-500">
        <div class="flex flex-row items-center gap-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>              
            <h5 class="font-medium text-sm">{{ $job->location }}</h5>
        </div>
        <div class="flex flex-row items-center gap-x-1">
            <img class="w-6 h-6 bg-center p-1 bg-slate-100 rounded-full" src="{{ asset('storage/' . $job->company_logo) }}" alt="Logo">
            <h5 class="font-medium truncate text-sm">{{ $job->company_name }}</h5>
        </div>
    </div>
    <a href="{{ route('detail', $job->job_title) }}" class="bg-indigo-50 hover:bg-indigo-500 hover:text-white duration-300 transition-all py-2 w-full flex justify-center font-bold rounded-lg text-indigo-500">Lihat Detail</a>
</div>