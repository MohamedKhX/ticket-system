<x-mail::message style="text-align: center;">
    # شكرأ لك على الحجز

    يمكمك تحميل التذاكر الخاص بركاب من الروابط الآتية


    @foreach($booking->passengers as $passenger)
        - ({{$passenger->generateDownloadLinkForTicket()}}) - Mohamed Khalid
    @endforeach
</x-mail::message>

