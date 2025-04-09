<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="bg-white shadow-sm rounded-lg p-6 flex flex-col space-y-4 justify-between">
                <div class="flex flex-col space-y-1">
                    <h5 class=" text-gray-900 text-xl font-bold">
                        {{ __('Welcome to dashboard!') }}
                    </h5>
                    <p class="text-gray-500">Let's make a proper jobs.</p>
                </div>
                <div class="flex flex-row items-center gap-x-2">
                    <a href="{{ route('admin-job-create') }}" class="px-4 py-2 bg-black text-white rounded-lg w-fit">Create Job</a>
                    <a href="{{ route('home') }}" class="px-4 py-2 ring-1 ring-black rounded-lg w-fit">Go to Portal</a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 h-fit">
                <div class="flex flex-col space-y-1 bg-white shadow-sm rounded-lg p-6 ">
                    <h5 class="text-2xl font-bold">{{ $jobs }}</h5>
                    <p class="font-medium text-gray-400">Total Job</p>
                </div>
                <div class="flex flex-col space-y-1 bg-white shadow-sm rounded-lg p-6 ">
                    <h5 class="text-2xl font-bold">{{ $applicants }}</h5>
                    <p class="font-medium text-gray-400">Total Applicant</p>
                </div>
                <div class="flex flex-col space-y-1 bg-white shadow-sm rounded-lg p-6 ">
                    <h5 class="text-2xl font-bold">{{ $users }}</h5>
                    <p class="font-medium text-gray-400">Total User</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
