@extends("admin.layouts.master")
@section('title', 'Create Category')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset("/css/footer.css")}}">
@endsection
@section('content')
    <div class="back">
        <form action="{{route('category')}}" method="get">
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