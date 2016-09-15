<div class="body-header">
    <h2>
        User Profile
    </h2>
</div>
<div class="container">
    <div class="user_mng form-horizontal" ng-controller="authController">
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Username:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showUsername">
                    %%user.username%%
                </div>
                <input class="form-control" ng-model="user.username" type="text" ng-show="showUsername">
                </input>
            </div>
            <div class="col col-sm-4" ng-if="user.username==user.email">
                <i class="glyphicon glyphicon-pencil" ng-click="showUsername=true" ng-show="!showUsername">
                </i>
                <button class="btn btn-success" ng-show="showUsername">
                    Update
                </button>
                <button class="btn btn-warning" ng-show="showUsername" ng-click="showUsername=false">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Email:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showEmail">
                    %%user.email%%
                </div>
                <input class="form-control" ng-model="newEmail" type="email" ng-show="showEmail">
                </input>
            </div>
            <div class="col col-sm-4" ng-if="false">
                <i class="glyphicon glyphicon-pencil" ng-click="showEmail=true" ng-show="!showEmail">
                </i>
                <button class="btn btn-success" ng-click="submitUpdateInfo('email')" ng-show="showEmail">
                    Update
                </button>
                <button class="btn btn-warning" ng-click="showEmail=false" ng-show="showEmail">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Full Name:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showFullName">
                    %%user.name%%
                </div>
                <input class="form-control" ng-model="newName" type="text" ng-show="showFullName">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" ng-click="showFullName=true" ng-show="!showFullName">
                </i>
                <button class="btn btn-success" ng-click="submitUpdateInfo('name')" ng-show="showFullName">
                    Update
                </button>
                <button class="btn btn-warning" ng-click="showFullName=false" ng-show="showFullName">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Birthday:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showBirth">
                    %%user.birth | datetime:'date'%%
                </div>
                <input class="form-control" id="birth" type="text" ng-show="showBirth">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" ng-click="showBirth=true" ng-show="!showBirth">
                </i>
                <button class="btn btn-success" ng-click="submitUpdateInfo('birth')" ng-show="showBirth">
                    Update
                </button>
                <button class="btn btn-warning" ng-click="showBirth=false" ng-show="showBirth">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Tel:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showTel">
                    %%user.tel%%
                </div>
                <input class="form-control" ng-model="newTel" type="tel" ng-show="showTel">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" ng-click="showTel=true" ng-show="!showTel">
                </i>
                <button class="btn btn-success" ng-click="submitUpdateInfo('tel')" ng-show="showTel">
                    Update
                </button>
                <button class="btn btn-warning" ng-click="showTel=false" ng-show="showTel">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Address:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showAddress">
                    %%user.address%%
                </div>
                <input class="form-control" ng-model="newAddress" type="text" ng-show="showAddress">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" ng-click="showAddress=true" ng-show="!showAddress">
                </i>
                <button class="btn btn-success" ng-click="submitUpdateInfo('address')" ng-show="showAddress">
                    Update
                </button>
                <button class="btn btn-warning" ng-click="showAddress=false" ng-show="showAddress">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                City:
            </label>
            <div class="col col-sm-4">
                <div class="text" ng-show="!showCity">
                    %%user.city%%
                </div>
                <input class="form-control" ng-model="newCity" ng-show="showCity" type="text">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil" ng-click="showCity=true" ng-show="!showCity">
                </i>
                <button class="btn btn-success" ng-click="submitUpdateInfo('city')" ng-show="showCity">
                    Update
                </button>
                <button class="btn btn-warning" ng-click="showCity=false" ng-show="showCity">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Password:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    ******
                </div>
                <input class="form-control" placeholder="Current Password..." style="display: none" type="password">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
            </div>
        </div>
        <div class="form-group" style="display: none">
            <label class="control-label col col-sm-4">
                New Password:
            </label>
            <div class="col col-sm-4">
                <input class="form-control" type="password">
                </input>
            </div>
        </div>
        <div class="form-group" style="display: none">
            <label class="control-label col col-sm-4">
                Confirm:
            </label>
            <div class="col col-sm-4">
                <input class="form-control" type="password">
                </input>
            </div>
        </div>
        <div class="form-group" style="display: none">
            <div class="col col-sm-4">
            </div>
            <div class="col col-sm-4">
                <button class="btn btn-success">
                    Update
                </button>
                <button class="btn btn-warning">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <script>
        $('#birth').datepicker({
            dateFormat: "dd/mm/yy",
            minDate: new Date('1950'),
            maxDate: new Date('2020')
        });
    </script>
</div>