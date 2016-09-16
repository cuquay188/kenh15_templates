@extends('admin.layouts.components.management')
@section('header','User Profile')
@section('body')
<div class="user_mng form-horizontal" ng-controller="authController">
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Username:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateUsername">
                %%user.username%%
            </div>
            <input class="form-control" ng-model="user.username" ng-show="showUpdateUsername" type="text">
            </input>
        </div>
        <div class="col col-sm-4" ng-if="user.username==user.email">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateUsername=true" ng-show="!showUpdateUsername">
            </i>
            <button class="btn btn-primary" ng-show="showUpdateUsername">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateUsername=false" ng-show="showUpdateUsername">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Email:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateEmail">
                %%user.email%%
            </div>
            <input class="form-control" ng-model="newEmail" ng-show="showUpdateEmail" type="email">
            </input>
        </div>
        <div class="col col-sm-4" ng-if="false">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateEmail=true" ng-show="!showUpdateEmail">
            </i>
            <button class="btn btn-primary" ng-click="submitUpdateInfo()" ng-show="showUpdateEmail">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateEmail=false" ng-show="showUpdateEmail">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Full Name:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateFullName">
                %%user.name%%
            </div>
            <input class="form-control" ng-class="{'error':errors.name}" ng-model="newName" ng-show="showUpdateFullName" type="text">
            </input>
            <span class="errors" ng-show="errors.name&&showFullName">
                %%errors.name[0]%%
            </span>
        </div>
        <div class="col col-sm-4">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateFullName=true" ng-show="!showUpdateFullName">
            </i>
            <button class="btn btn-primary" ng-click="submitUpdateInfo()" ng-show="showUpdateFullName">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateFullName=false" ng-show="showUpdateFullName">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Birthday:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateBirth">
                %%user.birth | datetime:'date'%%
            </div>
            <input class="form-control" id="birth" ng-class="{'error':errors.birth}" ng-show="showUpdateBirth" type="text">
            </input>
            <span class="errors" ng-show="errors.birth&&showBirth">
                %%errors.birth[0]%%
            </span>
        </div>
        <div class="col col-sm-4">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateBirth=true" ng-show="!showUpdateBirth">
            </i>
            <button class="btn btn-primary" ng-click="submitUpdateInfo()" ng-show="showUpdateBirth">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateBirth=false" ng-show="showUpdateBirth">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Phone number:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateTel">
                %%user.tel%%
            </div>
            <input class="form-control" ng-class="{'error':errors.tel}" ng-model="newTel" ng-show="showUpdateTel" type="tel">
            </input>
            <span class="errors" ng-show="errors.tel&&showTel">
                %%errors.tel[0]%%
            </span>
        </div>
        <div class="col col-sm-4">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateTel=true" ng-show="!showUpdateTel">
            </i>
            <button class="btn btn-primary" ng-click="submitUpdateInfo()" ng-show="showUpdateTel">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateTel=false" ng-show="showUpdateTel">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Address:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateAddress">
                %%user.address%%
            </div>
            <input class="form-control" ng-class="{'error':errors.address}" ng-model="newAddress" ng-show="showUpdateAddress" type="text">
            </input>
            <span class="errors" ng-show="errors.address&&showAddress">
                %%errors.address[0]%%
            </span>
        </div>
        <div class="col col-sm-4">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateAddress=true" ng-show="!showUpdateAddress">
            </i>
            <button class="btn btn-primary" ng-click="submitUpdateInfo()" ng-show="showUpdateAddress">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateAddress=false" ng-show="showUpdateAddress">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            City:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdateCity">
                %%user.city%%
            </div>
            <input class="form-control" ng-class="{'error':errors.city}" ng-model="newCity" ng-show="showUpdateCity" type="text">
            </input>
            <span class="errors" ng-show="errors.city&&showCity">
                %%errors.city[0]%%
            </span>
        </div>
        <div class="col col-sm-4">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdateCity=true" ng-show="!showUpdateCity">
            </i>
            <button class="btn btn-primary" ng-click="submitUpdateInfo()" ng-show="showUpdateCity">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdateCity=false" ng-show="showUpdateCity">
                Cancel
            </button>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col col-sm-4">
            Password:
        </label>
        <div class="col col-sm-4">
            <div class="text" ng-show="!showUpdatePassword">
                ******
            </div>
            <input class="form-control" ng-class="{'error':errors.current_password}" ng-model="currentPassword" ng-show="showUpdatePassword" placeholder="Current Password..." type="password">
            </input>
            <span class="errors">
                %%errors.current_password[0]%%
            </span>
        </div>
        <div class="col col-sm-4">
            <i class="glyphicon glyphicon-pencil" ng-click="showUpdatePassword=true" ng-show="!showUpdatePassword">
            </i>
        </div>
    </div>
    <div class="form-group" ng-show="showUpdatePassword">
        <label class="control-label col col-sm-4">
        </label>
        <div class="col col-sm-4">
            <input class="form-control" ng-class="{'error':errors.new_password}" ng-model="newPassword" placeholder="New password" type="password">
            </input>
            <span class="errors">
                %%errors.new_password[0]%%
            </span>
        </div>
    </div>
    <div class="form-group" ng-show="showUpdatePassword">
        <label class="control-label col col-sm-4">
        </label>
        <div class="col col-sm-4">
            <input class="form-control" ng-class="{'error':confirmPasswordError}" ng-model="confirmNewPassword" placeholder="Confirm new password" type="password">
            </input>
            <span class="errors">
                %%confirmPasswordError%%
            </span>
        </div>
    </div>
    <div class="form-group" ng-show="showUpdatePassword">
        <div class="col col-sm-4">
        </div>
        <div class="col col-sm-4">
            <button class="btn btn-primary" ng-click="submitUpdatePassword()" ng-disabled="!isSubmitable">
                Update
            </button>
            <button class="btn btn-default" ng-click="showUpdatePassword=false">
                Cancel
            </button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#birth').datepicker({
            dateFormat: "dd/mm/yy",
            minDate: new Date('1950'),
            maxDate: new Date('2020')
        });
</script>
@endsection
