<x-mail::message style="text-align: center;">
    # شكرأ لك على الحجز

    يمكمك تحميل التذاكر الخاص بركاب من الروابط الآتية


    @foreach($booking->passengers as $passenger)
        - ({{$passenger->generateDownloadLinkForTicket()}}) - Mohamed Khalid
    @endforeach


    يمكنك إلغاء الحجز من هنا
    {{route('cancel-booking', $passenger->booking->id)}}
</x-mail::message>

