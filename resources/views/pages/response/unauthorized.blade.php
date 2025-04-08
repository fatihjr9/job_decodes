<x-app-layout>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center flex flex-col">
            <img src="{{ asset('/image/unauthorized.svg') }}" class="w-96 mx-auto" alt="">
            <p class="text-lg text-gray-700 mt-4">Kamu tidak punya akses ke halaman ini.</p>
            @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin-dashboard') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg w-fit mx-auto mt-4">
                    Kembali ke Dashboard
                </a>
            @else
                <a href="{{ route('user-dashboard') }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg w-fit mx-auto mt-4">
                    Kembali ke Dashboard
                </a>
            @endif
        </div>
    </div>
</x-app-layout>