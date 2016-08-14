@extends('admin.layouts.master')
@section('title','User Management')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <form action="{{route('post_update_user')}}" method="post" class="form-horizontal user_mng" role="form">
        <input type="hidden" value="{{Auth::getUser()->id}}" name="id">
        <input type="hidden" value="{{Session::token()}}" name="_token">
        @if(count($errors)>0)
            <ul class="errors user">
                @foreach($errors->all() as $error)
                    <li>* {{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="form-group">
            <label class="control-label col col-sm-4" for="fullname">Full Name: </label>
            <div class="col col-sm-5">
                <div class="text" id="text_fullname">{{Auth::getUser()->fullname}}</div>
                <input style="display: none" type="text" class="form-control" name="fullname" id="fullname"
                       value="{{Auth::getUser()->fullname}}">
            </div>
            <div class="col col-sm-3 ">
                <img src="http://icons.veryicon.com/ico/System/Silk/pencil.ico"
                     id="update_fullname">

                <button class="btn btn-success" type="submit" id="ok_fullname"
                        style="display: none">OK
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="email">Email: </label>
            <div class="col col-sm-5">
                <div class="text" id="text_email">{{Auth::getUser()->email}}</div>
                <input style="display: none" type="email" class="form-control" name="email" id="email"
                       value="{{Auth::getUser()->email}}">
            </div>
            <div class="col col-sm-3">
                <img
                        src="http://icons.veryicon.com/ico/System/Silk/pencil.ico"
                        alt=""
                        id="update_email">
                <button class="btn btn-success" type="submit" id="ok_email"
                        style="display: none">OK
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="tel">Tel: </label>
            <div class="col col-sm-5">
                <div class="text" id="text_tel">{{Auth::getUser()->tel}}</div>
                <input style="display: none" type="text" class="form-control" name="tel" id="tel"
                       value="{{Auth::getUser()->tel}}">
            </div>
            <div class="col col-sm-3">
                <img
                        src="http://icons.veryicon.com/ico/System/Silk/pencil.ico"
                        alt=""
                        id="update_tel">
                <button class="btn btn-success" type="submit" id="ok_tel"
                        style="display: none">OK
                </button>
            </div>
        </div>
    </form>
    <form action="{{route('post_change_password_user')}}" method="post" class="form-horizontal user_mng" role="form">
        <input type="hidden" value="{{Auth::getUser()->id}}" name="id">
        <input type="hidden" value="{{Session::token()}}" name="_token">
        <div class="form-group">
            @if(Session::has('fail'))
                <div class="errors user">
                    * {{Session::get('fail')}}
                </div>
            @endif
            <label class="control-label col  col-sm-4" for="current_password">Password: </label>
            <div class="col col-sm-5">
                <div class="text" id="text_current_password">******</div>
                <input style="display: none" type="password" class="form-control" name="current_password"
                       id="current_password"
                       placeholder="Current Password...">
            </div>
            <div class="col col-sm-3">
                <img
                        src="http://icons.veryicon.com/ico/System/Silk/pencil.ico"
                        alt=""
                        id="update_password">
            </div>
        </div>
        <div class="form-group" style="display: none" id="new_password_form">
            <label class="control-label col col-sm-4" for="new_password">New Password: </label>
            <div class="col col-sm-5">
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>
        </div>
        <div class="form-group" style="display: none" id="confirm_form">
            <label class="control-label col col-sm-4" for="confirm">Confirm: </label>
            <div class="col col-sm-5">
                <input type="password" class="form-control" name="confirm" id="confirm">
            </div>
        </div>
        <div class="form-group" style="display: none" id="update_form">
            <div class="col col-sm-4"></div>
            <div class="col col-sm-5">
                <button disabled class="btn btn-success" type="submit" id="update">Update</button>
                <button class="btn btn-warning" id="cancel">Cancel</button>
            </div>
        </div>
    </form>
    <script>
        $('#category').focus();
        $('#update_fullname').click(function () {
            $('#fullname').show();
            $('#ok_fullname').show();
            $('#text_fullname').hide();
            $('#update_fullname').hide();
        });
        $('#update_email').click(function () {
            $('#email').show();
            $('#ok_email').show();
            $('#text_email').hide();
            $('#update_email').hide();
        });
        $('#update_username').click(function () {
            $('#username').show();
            $('#ok_username').show();
            $('#text_username').hide();
            $('#update_username').hide();
        });
        $('#update_tel').click(function () {
            $('#tel').show();
            $('#ok_tel').show();
            $('#text_tel').hide();
            $('#update_tel').hide();
        });
        $('#update_password').click(function () {
            $('#new_password_form').show();
            $('#confirm_form').show();
            $('#update_form').show();
            $('#current_password').show();
            $('#update_password').hide();
            $('#text_current_password').hide();
        });

        $('#confirm').on('keyup', function () {
            if ($(this).val() != $('#new_password').val()) {
                $('#update').prop('disabled', true);
            } else {
                $('#update').prop('disabled', false);
            }
        });
        $('#cancel').click(function (event) {
            event.preventDefault();
            $('#new_password_form').hide();
            $('#confirm_form').hide();
            $('#update_form').hide();
            $('#current_password').hide();
            $('#update_password').show();
            $('#text_current_password').show();
        })
    </script>
@endsection