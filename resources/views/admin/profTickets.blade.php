@foreach($profTickets as $ticket)

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
        @if($reservedProfTicket == $ticket)
            <div class="inner small-box bg-green">
                <h4>درخواست ارسال شده است</h4>
            </div>
        @endif
        <div class="inner">
            <p style="font-family: 'B Nazanin'">نام استاد: {{$ticket->prof()->user()->first()->name}} {{$ticket->prof()->user()->first()->family}}</p>
            <p style="font-family:'B Nazanin';">{{$ticket->description}}</p>
            <p style="font-family:'B Nazanin';">
                تعداد ظرفیت باقی‌مانده:
                {{$ticket->capacity - count($ticket->students()->get())}}
                نفر
            </p>
        </div>
        <a href="/students/reserveProfTicket/{{$ticket->id}}" class="small-box-footer">{{trans('layout.reserveProfTicket')}} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

@endforeach
