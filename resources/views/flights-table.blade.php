<x-app-layout>
    @push('styles')
        <style>
            .hero {
                min-height: 100vh !important;
            }
        </style>
    @endpush
    <livewire:flights-table />
</x-app-layout>
