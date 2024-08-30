<form wire:submit="submit" class="space-y-8">
    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">!</span>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">الاسم</label>
        <input wire:model="name" type="text" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="اكتب اسمك هنا..." required>
        <div class="text-red-700">@error('name') {{ $message }} @enderror</div>
    </div>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">البريد الإلكتروني</label>
        <input wire:model="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="اترك بريد الإلكتروني الخاص بك هنا" required>
        <div class="text-red-700">@error('email') {{ $message }} @enderror</div>
    </div>
    <div>
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">رقم الهاتف</label>
        <input wire:model="phone_number" type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="اترك رقم هاتفك هنا" required>
        <div class="text-red-700">@error('phone_number') {{ $message }} @enderror</div>
    </div>
    <div>
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">شركة الطيران</label>
        <select wire:model="airline_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            @foreach($airlines as $airline)
                <option value="{{ $airline->id }}">{{ $airline->name }}</option>
            @endforeach
        </select>
        <div class="text-red-700">@error('airline_id') {{ $message }} @enderror</div>
    </div>

    <div class="sm:col-span-2">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">الرسالة</label>
        <textarea wire:model="message" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="اترك رسالتك هنا...."></textarea>
        <div class="text-red-700">@error('message') {{ $message }} @enderror</div>
    </div>
    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-red-600 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300">
        إرسال
    </button>
</form>
