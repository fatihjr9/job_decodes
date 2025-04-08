<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6 flex flex-col space-y-4">
                <div class="flex flex-col space-y-1">
                    <h5 class=" text-gray-900 text-xl font-bold">
                        {{ __('Welcome to dashboard!') }}
                    </h5>
                    <p class="text-gray-500">Get ready and be prepared to find a proper jobs.</p>
                </div>
                <a href="{{ route('home') }}" class="px-4 py-2 bg-black text-white rounded-lg w-fit">Search Job</a>
            </div>
        </div>
    </div>
</x-app-layout>
