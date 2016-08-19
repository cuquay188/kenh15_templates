@extends('admin.layouts.master')
@section('title','Create Tag')
@section('content')
    <div class="content content-width">
        @if(count($errors)>0)
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>* {{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('post_tag')}}" method="post" role="form">
            <div class="form-group">
                <label for="name">Name Tag</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name tag..." value="{!! old('name') !!}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
    <script>
        $('#name').focus();
    </script>
@endsection