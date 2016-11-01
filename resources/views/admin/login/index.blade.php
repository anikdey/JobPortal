@extends('layouts.loginMaster')
@section('content')
    @if (Session::has('message'))
      <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
    {!! Form::open(array('url'=>'login', 'method'=>'POST', 'class'=>'m-t', 'role'=>'form')) !!}
        <div class="form-group has-feedback">
            <input type="email" name="email" id="email" value="{{ Input::old('email') }}" class="form-control" placeholder="Email" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Sign In</button>
    {!! Form::close() !!}
@endsection