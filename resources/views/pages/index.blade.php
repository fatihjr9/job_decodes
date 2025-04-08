<x-client-layout>
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <x-banner-job />
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 my-4">
        @foreach ($jobs as $job)
            <x-job-card :job="$job" />
        @endforeach
    </div>
</x-client-layout>
