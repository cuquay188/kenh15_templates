@extends("admin.layouts.master")
@section("title",'Dashboard')
@section('content')
    <ng-view></ng-view>
    <script>if (!location.hash)location.hash = '#/dashboard'</script>
@endsection