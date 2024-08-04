<x-print-layout :size="$size">

    <x-slot name="content">
        @foreach($Chunkrecords as $records)
            <section class="sheet padding-10mm !pt-5 break-words">
                <section class="flex items-center justify-center mb-5">
                    <x-application-logo class="!h-20"/>
                </section>

                <section>
                    <h1 class="pb-3 text-neutral-700 border-neutral-300 text-center">تقرير</h1>
                </section>

                <section>
                    <x-panel>
                        <x-slot name="slot" class="!p-0 overflow-auto">
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                    <tr>
                                        @foreach($exportColumns as $column => $header)
                                            <th class="py-2 px-4 border-b font-bold text-neutral-950 text-right">{{ __($header) }}</th>
                                        @endforeach

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($records as $record)
                                        <tr>
                                            @foreach($exportColumns as $column => $header)
                                                @if($column === 'minutes')
                                                    <td class="py-2 px-4 border-b font-bold text-neutral-950 ">
                                                        {{ minutesToHours(__($record->{$column})) ?? '-' }}
                                                    </td>
                                                @else
                                                    <td class="py-2 px-4 border-b font-bold text-neutral-950 ">
                                                        {{ __($record->{$column}) ?? '-' }}
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @empty
                                        <tr>
                                            @if (request()->has('filter'))
                                                <td colspan="{{ count($exportColumns) }}"
                                                    class="py-4 px-6 text-center">
                                                    عذرًا، لم نجد ماتبحث عنه.
                                                </td>
                                            @else
                                                <td colspan="{{ count($exportColumns) }}"
                                                    class="py-4 px-6 text-center">
                                                    لا يوجد موظفين حتى الأن.
                                                </td>
                                            @endif
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </x-slot>
                    </x-panel>
                </section>

                <section class="mt-12 text-xs text-neutral-500">
                    <div class="flex justify-between pt-3 border-t border-neutral-300">
                        <div>
                            <span>طبعت بتاريخ:</span>
                            <span dir="ltr">{{ now()->toDateTimeString() }}</span>
                        </div>

                        <div>
                            <span>طبعت بواسطة:</span>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </section>
            </section>
        @endforeach
    </x-slot>
</x-print-layout>
