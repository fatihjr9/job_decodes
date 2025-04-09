<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $job->company_name }} - {{ $job->job_title }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                            {{ $job->job_title }}
                            <div class="mt-2">
                                <button data-modal-target="modal-{{ $job->job_title }}" data-modal-toggle="modal-{{ $job->job_title }}" class="bg-blue-50 text-sm hover:bg-blue-100 transition-all text-blue-500 p-2 rounded-lg" type="button">
                                    Job Description
                                </button>
                                <div id="modal-{{ $job->job_title }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow-sm">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Job Description
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <p>{!! $job->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Applicant Photo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Applicant Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Applicant Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Applicant Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Login Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cover Letter & CV
                                </th>
                            </tr>
                        </thead>
                        @if ($job->jobApply->isEmpty())
                            <tbody>
                                <tr class="bg-white border-b border-gray-200">
                                    <td colspan="6" class="px-6 py-4 text-center">
                                        No applicants found for this job.
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($job->jobApply as $item)
                                    <tr class="bg-white border-b border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <img class="w-10 h-10" src="{{ asset('storage/' . $item->photo) }}" alt="Logo">       
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->phone }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->user_id ? 'User Terdaftar | ' . $item->email : 'Tamu / Tidak Login' }}
                                            </td>
                                            <td class="px-6 py-4 flex flex-row items-center gap-x-2">
                                                <button data-modal-target="modal-{{ $item->name }}" data-modal-toggle="modal-{{ $item->name }}" class="bg-blue-50 hover:bg-blue-100 transition-all text-blue-500 p-2 rounded-lg" type="button">
                                                    Cover Letter
                                                </button>
                                                <div id="modal-{{ $item->name }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow-sm">
                                                            <!-- Modal header -->
                                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                                                                <h3 class="text-xl font-semibold text-gray-900">
                                                                    Cover Letter - {{ $item->name }}
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-4 md:p-5 space-y-4">
                                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">{{ $item->cover_letter }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ asset('storage/' . $item->cv) }}" target="_blank" class="bg-blue-50 hover:bg-blue-100 transition-all text-blue-500 p-2 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                    </svg>                                                                                                                            
                                                </a>
                                            </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
