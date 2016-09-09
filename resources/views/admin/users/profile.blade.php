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
                <div class="text">
                    %%user.username%%
                </div>
                <input class="form-control" ng-model="user.username" style="display: none" type="text">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Full Name:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    %%user.name%%
                </div>
                <input class="form-control" ng-model="user.name" style="display: none" type="text">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Email:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    %%user.email%%
                </div>
                <input class="form-control" ng-model="user.email" style="display: none" type="email">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Birthday:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    %%user.birth | datetime:'date'%%
                </div>
                <input class="form-control" style="display: none" type="text">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Tel:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    %%user.tel%%
                </div>
                <input class="form-control" ng-model="user.tel" style="display: none" type="tel">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                Address:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    %%user.address%%
                </div>
                <input class="form-control" ng-model="user.address" style="display: none" type="text">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
                    Cancel
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col col-sm-4">
                City:
            </label>
            <div class="col col-sm-4">
                <div class="text">
                    %%user.city%%
                </div>
                <input class="form-control" style="display: none" type="text">
                </input>
            </div>
            <div class="col col-sm-4">
                <i class="glyphicon glyphicon-pencil">
                </i>
                <button class="btn btn-success" style="display: none">
                    Update
                </button>
                <button class="btn btn-warning" style="display: none">
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