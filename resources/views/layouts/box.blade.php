
{{--@section('tickets')--}}
@foreach($tickets as $ticket)

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
        @if($reservedTicket == $ticket)
            <div class="inner small-box bg-green">
                <h4>شما این سمت را رزرو کرده‌اید</h4>
            </div>
        @endif
        <div class="inner">
            <h3 style="font-family:'B Nazanin';">
                شرکت
                {{$ticket->company()->first()->company_name}}
                </h3>

            <p style="font-family:'B Nazanin';">{{$ticket->description}}</p>
            <p style="font-family:'B Nazanin';">
                تعداد افراد مورد نیاز:
                {{$ticket->capacity}}
                نفر
            </p>
            <p style="font-family:'B Nazanin';">
                تعداد ظرفیت باقی‌مانده:
                {{$ticket->capacity - count($ticket->students()->get())}}
                نفر
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{$ticket->company()->first()->link}}" class="small-box-footer">{{trans('layout.moreInfo')}}<i class="fa fa-arrow-circle-right"></i></a>
        <a href="/students/reserveTicket/{{$ticket->id}}" class="small-box-footer">{{trans('layout.reserveTicket')}} <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

@endforeach
{{--@endsection--}}
{{--<!-- ./col -->--}}
{{--<div class="col-lg-3 col-xs-6">--}}
    {{--<!-- small box -->--}}
    {{--<div class="small-box bg-green">--}}
        {{--<div class="inner">--}}
            {{--<h3>3</h3>--}}

            {{--<p>شرکت تست اول</p>--}}
        {{--</div>--}}
        {{--<div class="icon">--}}
            {{--<i class="ion ion-stats-bars"></i>--}}
        {{--</div>--}}
        {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- ./col -->--}}
{{--<div class="col-lg-3 col-xs-6">--}}
    {{--<!-- small box -->--}}
    {{--<div class="small-box bg-yellow">--}}
        {{--<div class="inner">--}}
            {{--<h3>1</h3>--}}

            {{--<p>شرکت تست دوم</p>--}}
        {{--</div>--}}
        {{--<div class="icon">--}}
            {{--<i class="ion ion-person-add"></i>--}}
        {{--</div>--}}
        {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- ./col -->--}}
{{--<div class="col-lg-3 col-xs-6">--}}
    {{--<!-- small box -->--}}
    {{--<div class="small-box bg-red">--}}
        {{--<div class="inner">--}}
            {{--<h3>6</h3>--}}

            {{--<p>شرکت تست سوم</p>--}}
        {{--</div>--}}
        {{--<div class="icon">--}}
            {{--<i class="ion ion-pie-graph"></i>--}}
        {{--</div>--}}
        {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- ./col -->--}}
