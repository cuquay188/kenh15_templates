@extends('admin.layouts.master')
@section('title', 'Create Author')
@section('content')
    <div class="back">
        <form action="{{route('author')}}" method="get">
            <button style="float: right;margin-bottom: 30px" type="submit" class="btn btn-danger">Back</button>
        </form>
    </div>
    <div class="content content-width">
        @if(count($errors)>0)
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>* {{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('post_author')}}" method="post" role="form">
            <div class="form-group">
                <label>Pick a user to promote</label>
                <select name="user" id="user" class="form-control">
                    <option value="" style="font-weight:bold;">--Select an user--</option>
                    @foreach(App\User::all() as $user)
                        @if($user->author==null)
                        <option value="{{$user->id}}">{{$user->name}} - {{$user->username}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
    <script>
        $('#name').focus();
        console.log('{{Session::get('$request')}}')
    </script>
@endsection