@extends('layouts.app')


@section('sidebar')
    @include('profs.sidebar')
@endsection

@section('username')
    {{$user->name}}
@endsection

@section('role')
    استاد
@endsection

@section('messageCount')
    {{4}}
@endsection

@section('memSince')
    {{90}}
@endsection

@section('content')

    <form>
        <legend>مشخصات فردی</legend>
        <table>
            <tr class="row" style="margin: 2em; padding: 2em">
                <td class="form-group col-lg-2">
                    <label for="name">{{trans("register.name")}}</label>
                    <input type="text" disabled class="form-control disabled" id="name"  placeholder='{{$user->name}}'>
                </td>

                <td class="form-group col-lg-2">
                    <label for="family">{{trans("register.family")}}</label>
                    <input type="text" disabled class="form-control disabled" id="family"  placeholder='{{$user->family}}'>
                </td>

                <td class="form-group col-lg-2">
                    <label for="email">{{trans("register.email")}}</label>
                    <input type="email" disabled class="form-control disabled" id="email"  placeholder='{{$user->email}}'>
                </td>

            </tr>

            <tr class="row"  style="margin: 2em; padding: 2em">
                <td class="form-group col-lg-2">
                    <label for="memSince">{{trans("register.memSince")}}</label>
                    <input type="datetime" disabled class="form-control disabled" id="memSince"  placeholder='{{$user->memSince}}'>
                </td>
                <td class="form-group col-lg-2">
                    <label for="DOB">{{trans("register.dob")}}</label>
                    <input type="date" disabled class="form-control disabled" id="DOB"  placeholder='{{$user->dob}}'>
                </td>
                <td class="form-group col-lg-2">
                    <label for="phoneNo">{{trans("register.phoneNo")}}</label>
                    <input type="tel" disabled class="form-control disabled" id="phoneNo"  placeholder='{{$user->phoneNo}}'>
                </td>
            </tr>
        </table>
    </form>

    <br/>

    <form>
        <legend>تیکت‌ها</legend>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        @include('profs.tickets')
    </div>
    <!-- /.row -->
    </form>


@endsection
