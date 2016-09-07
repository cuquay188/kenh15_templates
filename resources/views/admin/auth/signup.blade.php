@extends('admin.auth.master')
@section('title','Sign Up')
@section('content')
    <form action="{{route('admin.auth.signup.post')}}" method="POST">
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
            <h2>Sign Up</h2>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="e.g. example@gmail.com"
                   value="{!! old('email') !!}">
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
            <input type="hidden" value="{{Session::token()}}" name="_token">
            <button class="btn btn-primary btn-block" type="submit">Sign up</button>
            <div class="sub">
                <a href="{{route('admin.auth.login')}}">Already a membership.</a>
            </div>
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