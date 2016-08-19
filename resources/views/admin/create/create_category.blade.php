@extends("admin.layouts.master")
@section('title', 'Create Category')
@section('content')
    <div class="content content-width">
        @if(count($errors)>0)
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>* {{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('post_category')}}" method="post" role="form">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category" class="form-control"
                       placeholder="Enter category name..." value="{!! old('category') !!}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
    <script>
        $('#category').focus();
    </script>
@endsection