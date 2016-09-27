@extends("admin.layouts.master")
@section("title",'Dashboard')
@section('content')
<ng-view>
</ng-view>
@include('admin.layouts.components.loading')
@endsection
@section('body.scripts')
<script>
    if ( location.hash == '#_=_' || !location.hash) location.hash = '#/dashboard'
</script>
@endsection
