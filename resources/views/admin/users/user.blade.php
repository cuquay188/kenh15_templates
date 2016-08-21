@extends('admin.layouts.master')
@section('title','Edit your profile')
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
            <label class="control-label col col-sm-4" for="name">Full Name: </label>
            <div class="col col-sm-4">
                <div class="text" id="text_name">{{Auth::getUser()->name}}</div>
                <input style="display: none" type="text" class="form-control" name="name" id="name"
                       value="{{Auth::getUser()->name}}">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_name"></i>
                <button class="btn btn-success" type="submit" id="ok_name"
                        style="display: none">Update
                </button>
                <button class="btn btn-warning" id="cancel_name" style="display: none">Cancel</button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="email">Email: </label>
            <div class="col col-sm-4">
                <div class="text" id="text_email">{{Auth::getUser()->email}}</div>
                <input style="display: none" type="email" class="form-control" name="email" id="email"
                       value="{{Auth::getUser()->email}}">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_email"></i>
                <button class="btn btn-success" type="submit" id="ok_email"
                        style="display: none">Update
                </button>
                <button class="btn btn-warning" id="cancel_email" style="display: none">Cancel</button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="birth">Birthday: </label>
            <div class="col col-sm-4">
                <div class="text" id="text_birth">{{date_format(date_create(Auth::getUser()->birth),"d/m/Y")}}</div>
                <input style="display: none" type="date" class="form-control" name="birth" id="birth"
                       value="{{Auth::getUser()->formatBirth('-')}}">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_birth"></i>
                <button class="btn btn-success" type="submit" id="ok_birth"
                        style="display: none">Update
                </button>
                <button class="btn btn-warning" id="cancel_birth" style="display: none">Cancel</button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="tel">Tel: </label>
            <div class="col col-sm-4">
                <div class="text" id="text_tel">{{Auth::getUser()->tel}}</div>
                <input style="display: none" type="tel" class="form-control" name="tel" id="tel"
                       value="{{Auth::getUser()->tel}}">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_tel"></i>
                <button class="btn btn-success" type="submit" id="ok_tel"
                        style="display: none">Update
                </button>
                <button class="btn btn-warning" id="cancel_tel" style="display: none">Cancel</button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="address">Address: </label>
            <div class="col col-sm-4">
                <div class="text" id="text_address">{{Auth::getUser()->address}}</div>
                <input style="display: none" type="text" class="form-control" name="address" id="address"
                       value="{{Auth::getUser()->address}}">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_address"></i>
                <button class="btn btn-success" type="submit" id="ok_address"
                        style="display: none">Update
                </button>
                <button class="btn btn-warning" id="cancel_address" style="display: none">Cancel</button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4" for="city">City: </label>
            <div class="col col-sm-4">
                <div class="text" id="text_city">{{Auth::getUser()->city}}</div>
                <input style="display: none" type="text" class="form-control" name="city" id="city"
                       value="{{Auth::getUser()->city}}">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_city"></i>
                <button class="btn btn-success" type="submit" id="ok_city"
                        style="display: none">Update
                </button>
                <button class="btn btn-warning" id="cancel_city" style="display: none">Cancel</button>
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
            <div class="col col-sm-4">
                <div class="text" id="text_current_password">******</div>
                <input style="display: none" type="password" class="form-control" name="current_password"
                       id="current_password"
                       placeholder="Current Password...">
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" id="update_password"></i>
            </div>
        </div>
        <div class="form-group" style="display: none" id="new_password_form">
            <label class="control-label col col-sm-4" for="new_password">New Password: </label>
            <div class="col col-sm-4">
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>
        </div>
        <div class="form-group" style="display: none" id="confirm_form">
            <label class="control-label col col-sm-4" for="confirm">Confirm: </label>
            <div class="col col-sm-4">
                <input type="password" class="form-control" name="confirm" id="confirm">
            </div>
        </div>
        <div class="form-group" style="display: none" id="update_form">
            <div class="col col-sm-4"></div>
            <div class="col col-sm-4">
                <button disabled class="btn btn-success" type="submit" id="update">Update</button>
                <button class="btn btn-warning" id="cancel">Cancel</button>
            </div>
        </div>
    </form>
    <script>
        $('#category').focus();
        var updateField = function (name) {
            $('#update_'+name).click(function () {
                $('#'+name).show();
                $('#ok_'+name).show();
                $('#cancel_'+name).show();
                $('#text_'+name).hide();
                $('#update_'+name).hide();
            });
            $('#cancel_'+name).click(function (event) {
                event.preventDefault();
                $('#'+name).hide();
                $('#ok_'+name).hide();
                $('#cancel_'+name).hide();
                $('#text_'+name).show();
                $('#update_'+name).show();
            })
        };
        updateField('name');
        updateField('email');
        updateField('birth');
        updateField('tel');
        updateField('address');
        updateField('city');
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