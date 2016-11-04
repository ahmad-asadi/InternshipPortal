@extends('layouts.app')


@section('sidebar')
    @include('admin.sidebar')
@endsection

@section('username')
    مدیر سامانه
@endsection

@section('role')
    پرسنل
@endsection

@section('messageCount')
    {{4}}
@endsection

@section('memSince')
    {{90}}
@endsection

@section('content')

    {{--<form>--}}
        {{--<legend>مشخصات فردی</legend>--}}
        {{--<table>--}}
            {{--<tr class="row" style="margin: 2em; padding: 2em">--}}
                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="name">{{trans("register.name")}}</label>--}}
                    {{--<input type="text" disabled class="form-control disabled" id="name"  placeholder='{{$user->name}}'>--}}
                {{--</td>--}}

                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="family">{{trans("register.family")}}</label>--}}
                    {{--<input type="text" disabled class="form-control disabled" id="family"  placeholder='{{$user->family}}'>--}}
                {{--</td>--}}

                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="studentID">{{trans("register.stdID")}}</label>--}}
                    {{--<input type="text" disabled class="form-control disabled" id="studentID"  placeholder='{{$user->stdID}}'>--}}
                {{--</td>--}}

                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="field">{{trans("register.field")}}</label>--}}
                    {{--<input type="text" disabled class="form-control disabled" id="field"  placeholder='{{$user->field}}'>--}}
                {{--</td>--}}
            {{--</tr>--}}

            {{--<tr class="row"  style="margin: 2em; padding: 2em">--}}
                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="memSince">{{trans("register.memSince")}}</label>--}}
                    {{--<input type="datetime" disabled class="form-control disabled" id="memSince"  placeholder='{{$user->memSince}}'>--}}
                {{--</td>--}}
                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="DOB">{{trans("register.dob")}}</label>--}}
                    {{--<input type="date" disabled class="form-control disabled" id="DOB"  placeholder='{{$user->dob}}'>--}}
                {{--</td>--}}
                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="email">{{trans("register.email")}}</label>--}}
                    {{--<input type="email" disabled class="form-control disabled" id="email"  placeholder='{{$user->email}}'>--}}
                {{--</td>--}}
                {{--<td class="form-group col-lg-2">--}}
                    {{--<label for="phoneNo">{{trans("register.phoneNo")}}</label>--}}
                    {{--<input type="tel" disabled class="form-control disabled" id="phoneNo"  placeholder='{{$user->phoneNo}}'>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    {{--</form>--}}

    {{--<br/>--}}


    <form>
        <legend>دانشجویان</legend>
        <div class="list-group">
            @foreach($students as $std)
                <a href="#" class="list-group-item list-group-item-action list-group-item-success">
                    {{$std->user()->first()->name}}
                    {{$std->user()->first()->family}}
                    -
                    (
                    {{$std->stdID}}
                    )
                </a>
            @endforeach
        </div>

    </form>

    <br/>

    <form>
        <legend>اساتید</legend>
        <div class="list-group">
            <div class="list-group">
                @foreach($profs as $prof)
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">
                        @if($prof->edu=="1")
                            جناب آقای مهندس
                        @elseif($prof->edu=="2")
                            جناب آقای دکتر
                        @endif

                        {{$prof->user()->first()->name}}
                        {{$prof->user()->first()->family}}

                        (
                        {{trans("register.$prof->grade")}}
                        )
                    </a>
                @endforeach
            </div>
        </div>

    </form>

    <br/>

    <form>
        <legend>شرکت‌ها</legend>
        <div class="list-group">
            <div class="list-group">
                @foreach($comps as $comp)
                    <a href="{{$comp->link}}" class="list-group-item list-group-item-action list-group-item-success">
                        شرکت
                        {{$comp->companyName}}
                        -
                        ثبت شده توسط
                        :
                        {{$comp->user()->first()->name}}
                        {{$comp->user()->first()->family}}

                    </a>
                @endforeach
            </div>
        </div>

    </form>

    <br/>

    <form>
        <legend>تیکت‌های اساتید</legend>
        <div class="list-group">
            <div class="list-group">
                @foreach($profTickets as $ticket)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            @if($ticket->approved == 1)
                                <div class="inner small-box bg-green">
                                    <h4>تایید شده است</h4>
                                </div>
                            @endif
                            <div class="inner">
                                <p style="font-family: 'B Nazanin'">نام استاد: {{$ticket->prof()->user()->first()->name}} {{$ticket->prof()->user()->first()->family}}</p>
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
                                <div class="container">
                                <button  class="alert-danger" style="font-family: 'B Nazanin'; font-size: 15px; border-radius: 30%; margin: 0 -1% 0 1%;">
                                    <a href={{url("/faculty/rejectTicket/$ticket->id")}} style="color: white" >
                                        <span style="font-family: 'B Nazanin'; font-size: 18px;">
حذف تیکت
                                            </span>
                                    </a>
                                </button>

                                 <button  class="alert-success" style="font-family: 'B Nazanin'; font-size: 15px; border-radius: 30%; margin: 0 1% 0 1%;">
                                    <a href={{url("/faculty/approveTicket/$ticket->id")}} style="color: white" >
                                        <span style="font-family: 'B Nazanin'; font-size: 18px;">
تایید تیکت
                                            </span>
                                    </a>
                                </button>
                                </div>
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
            </div>
        </div>

    </form>

    <br/>

    <form>
        <legend>تیکت‌های شرکت‌ها</legend>
        <div class="list-group">
            <div class="list-group">
                @foreach($compTickets as $ticket)
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            @if($ticket->approved == 1)
                                <div class="inner small-box bg-green">
                                    <h4>تایید شده است</h4>
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
                                <div class="container">
                                    <button  class="alert-danger" style="font-family: 'B Nazanin'; font-size: 15px; border-radius: 30%; margin: 0 -1% 0 1%;">
                                        <a href={{url("/companies/rejectTicket/$ticket->id")}} style="color: white" >
                                        <span style="font-family: 'B Nazanin'; font-size: 18px;">
حذف تیکت
                                            </span>
                                        </a>
                                    </button>

                                    <button  class="alert-success" style="font-family: 'B Nazanin'; font-size: 15px; border-radius: 30%; margin: 0 1% 0 1%;">
                                        <a href={{url("/companies/approveTicket/$ticket->id")}} style="color: white" >
                                        <span style="font-family: 'B Nazanin'; font-size: 18px;">
تایید تیکت
                                            </span>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
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
            </div>
        </div>
    </form>

    <br/>


    {{--<form>--}}
        {{--<legend>شرکت‌ها</legend>--}}
    {{--<!-- Small boxes (Stat box) -->--}}
    {{--<div class="row">--}}
        {{--@include('layouts.box')--}}
    {{--</div>--}}
    {{--<!-- /.row -->--}}
    {{--</form>--}}

    {{--<form>--}}
        {{--<legend>اساتید</legend>--}}
        {{--<div class="row">--}}
            {{--@include('students.profTickets')--}}
        {{--</div>--}}
        {{--<div class="list-group">--}}
            {{--@foreach($profs as $prof)--}}
                {{--<a href="#" class="list-group-item list-group-item-action list-group-item-success">--}}
                    {{--@if($prof->edu == "MSC")--}}
                        {{--جناب آقای مهندس--}}
                    {{--@elseif($prof->edu=="PHD")--}}
                        {{--جناب آقای دکتر--}}
                    {{--@endif--}}

                    {{--{{$prof->user()->first()->name}}--}}
                    {{--{{$prof->user()->first()->family}}--}}

                        {{--(--}}
                    {{--{{trans("register.$prof->grade")}}--}}
                    {{--)--}}
                {{--</a>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</form>--}}


@endsection
