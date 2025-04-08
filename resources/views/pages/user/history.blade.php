<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Company Logo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Company Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Job Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Send At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CV and Cover Letter
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs->jobApply as $item)
                            <tr class="bg-white border-b border-gray-200">
                                <td class="px-6 py-4">
                                    <img class="w-8 h-8" src="{{ asset('storage/' . $item->jobList->company_logo) }}" alt="Logo">       
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jobList->company_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jobList->location }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jobList->job_title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->created_at }}
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
                                        CV                                                                                                                          
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
