@extends('admin.auth.master')
@section('title','Sign Up')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/auth.css')}}">
@endsection
@section('content')
    <form action="{{route('post_sign_up')}}" method="post" style="margin-top:10%;">
        @if(Session::has('fails'))
            <ul class="errors">
                @foreach(Session::get('fails') as $fail)
                    <li>* {{$fail}}</li>
                @endforeach
            </ul>
        @endif
        @if(count($errors)>0)
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>* {{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nguyen Van A"
                   value="{!! old('fullname') !!}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="e.g. example@gmail.com"
                   value="{!! old('email') !!}">
        </div>
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" name="username" id="username" placeholder=""
                   value="{!! old('username') !!}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                   placeholder="">
            <div class="errors" style="display: none">* Your password is not matched</div>
        </div>
        <div class="form-group">
            <label for="tel">Phone</label>
            <input type="tel" class="form-control" name="tel" id="tel" placeholder="e.g. +84..."
                   value="{!! old('tel') !!}">
        </div>
        <div class="form-group">
            <input type="hidden" value="{{Session::token()}}" name="_token">
            <button class="btn btn-success" type="submit">Sign up</button>
            <a class="btn btn-danger" href="{{route('login')}}">Back</a>
        </div>
    </form>
    <script>
        $('#confirm_password').on('keyup', function () {
            if ($(this).val() != $('#password').val()) {
                $('.errors').show();
            } else {
                $('.errors').hide();
            }
        });
    </script>
@endsection