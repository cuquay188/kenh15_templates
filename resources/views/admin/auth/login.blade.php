@extends('admin.auth.master')
@section('title','Login')
@section('content')
    <form action="{{route('post_login')}}" method="post">
        @if(count($errors)>0)
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>* {{$error}}</li>
                @endforeach
            </ul>
        @endif
        @if(Session::has('fail'))
            <div class="errors">
                * {{Session::get('fail')}}
            </div>
        @endif
        <div class="form-group">
            <h3 style="text-align:center; margin:10px 0;">Login</h3>
        </div>
        <div class="form-group">
            <input type="text" value="{{Session::has('new_username') ? Session::get('new_username'):''}}"
                   class="form-control" name="username" id="username" placeholder="User Name">
        </div>
        <div class="form-group">
            <input type="password" value="{{Session::has('new_password') ? Session::get('new_password'):''}}"
                   class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group" style="display:none;">
            <input type="checkbox" name="remember" id="remember" disabled>
            <label for="remember" style="font-weight: normal">Remember</label>
        </div>
        <div class="form-group">
            <input type="hidden" value="{{Session::token()}}" name="_token">
            <button class="btn btn-success" type="submit">Login</button>
            <a class="btn btn-warning" href="{{route('signup')}}">Sign up</a>
        </div>
    </form>
@endsection