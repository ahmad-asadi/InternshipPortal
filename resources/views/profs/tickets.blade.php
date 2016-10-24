@foreach($tickets as $ticket)

<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
        <div class="inner">
            <p style="font-family:'B Nazanin';">{{$ticket->description}}</p>
            <p style="font-family:'B Nazanin';">
                تعداد دانشجویان قابل اخذ:
                {{$ticket->capacity}}
                نفر
            </p>
            <p style="font-family:'B Nazanin';">
                تعداد افراد ثبت ‌نام کرده:
                {{count($ticket->students()->get())}}
                نفر
            </p>
        </div>
        @foreach($ticket->students()->get() as $std)
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        <div class="form-group">
            <a href="#" class="small-box-footer" style="float: right;"><span class="glyphicon-alert"></span> <i class="fa fa-arrow-circle-right"></i></a>
            <span>{{$std->user()->first()->name}} {{$std->user()->first()->family}} - {{$std->stdID}} </span>
            <a href="#" class="small-box-footer" style="float: left;"><span class="glyphicon-apple"></span> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        @endforeach
    </div>
</div>

@endforeach
