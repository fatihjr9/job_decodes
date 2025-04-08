<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Joblist') }}
            </h2>
            <a href="{{ route('admin-job-create') }}" class="px-4 py-2 bg-black rounded-lg text-white">Create Job</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif
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
                                Published At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Expired At
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                    </thead>
                    @if ($jobs->isEmpty())
                        <tbody>
                            <tr class="bg-white border-b border-gray-200">
                                <td colspan="6" class="px-6 py-4 text-center">
                                    No job found.
                                </td>
                            </tr>
                        </tbody> 
                    @else
                        <tbody>
                            @foreach ($jobs as $item)
                                <tr class="bg-white border-b border-gray-200">
                                    <td class="px-6 py-4">
                                        <img class="w-8 h-8" src="{{ asset('storage/' . $item->company_logo) }}" alt="Logo">       
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->company_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->location }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->job_title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->published_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->expired_at }}
                                    </td>
                                    <td class="px-6 py-4 flex flex-row items-center gap-x-2">
                                        <a href="{{ route('admin-job-detail', $item->job_title ) }}" class="bg-blue-50 hover:bg-blue-100 transition-all text-blue-500 p-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
                                            </svg>                                                                                                                            
                                        </a>
                                        <a href="{{ route('admin-job-edit', $item->job_title) }}" class="bg-orange-50 hover:bg-orange-100 transition-all text-orange-500 p-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>                                                                                    
                                        </a>
                                        <form action="{{ route('admin-job-destroy', $item->job_title ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-50 hover:bg-red-100 transition-all text-red-500 p-2 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>                                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
