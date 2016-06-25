@extends('admin.auth.master')
@section('title','Sign Up')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/auth.css')}}">
@endsection
@section('content')
    <form action="">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name...">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email...">
        </div>
        <div class="form-group">
            <label for="username">User</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="User Name...">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm-password" id="confirm-password"
                   placeholder="Confirm Password...">
            <div class="errors" style="display: none">* Your password is not matched</div>
        </div>
        <div class="form-group">
            <label for="tel">Phone</label>
            <input type="tel" class="form-control" name="tel" id="tel" placeholder="Phone number...">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Sign up</button>
            <a class="btn btn-danger" href="{{route('login')}}">Back</a>
        </div>
    </form>
    <script>
        $('#confirm-password').on('keyup', function () {
            if ($(this).val() != $('#password').val()) {
               $('.errors').show();
            }else{
                $('.errors').hide();
            }
        });
    </script>
@endsection