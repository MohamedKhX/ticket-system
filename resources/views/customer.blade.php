<x-app-layout>
    @push('styles')
        <script src="https://cdn.tailwindcss.com"></script>
    @endpush
        <section class="bg-white mt-44 w-2/3">
            <div class="py-8 lg:py-16 px-4 mx-auto  max-w-screen-md">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">خدمة العملاء</h2>
                <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl">
                    هل تواجه مشكلة ما؟!
                </p>
                <livewire:forms.customer/>
            </div>
        </section>

</x-app-layout>
