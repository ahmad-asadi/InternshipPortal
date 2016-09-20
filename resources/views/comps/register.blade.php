@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">{{trans('register.name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="family" class="col-md-4 control-label">{{trans('register.family')}}</label>

                                <div class="col-md-6">
                                    <input id="family" type="text" class="form-control" name="family" value="{{ old('family') }}">

                                    @if ($errors->has('family'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('family') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                                <label for="company_name" class="col-md-4 control-label">{{trans('register.companyName')}}</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">

                                    @if ($errors->has('company_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('business') ? ' has-error' : '' }}">
                                <label for="business" class="col-md-4 control-label">{{trans('register.business')}}</label>

                                <div class="col-md-6">
                                    <input id="business" type="text" class="form-control" name="business" value="{{ old('business') }}">

                                    @if ($errors->has('business'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('business') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">{{trans('register.description')}}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">{{trans('register.address')}}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">{{trans("register.dob")}}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}">

                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('memSince') ? ' has-error' : '' }}">
                                <label for="memSince" class="col-md-4 control-label">{{trans('register.memSince')}}</label>

                                <div class="col-md-6">
                                    <input id="memSince" type="datetime" class="form-control" name="memSince" value="{{ old('memSince') }}">

                                    @if ($errors->has('memSince'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('memSince') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">{{trans('register.email')}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
                                <label for="phoneNo" class="col-md-4 control-label">{{trans('register.phoneNo')}}</label>

                                <div class="col-md-6">
                                    <input id="phoneNo" type="tel" class="form-control" name="phoneNo" value="{{ old('phoneNo') }}">

                                    @if ($errors->has('phoneNo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">{{trans('register.pass')}}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">{{trans('register.confirmPass')}}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> {{trans('register.register')}}
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="comp"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{print_r($errors)}}
@endsection
