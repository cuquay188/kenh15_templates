@extends('layouts.master')
@section('title','Demo')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/demo.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="body-content">
            <div class="calculate col-md-3">
                <form class="form-content" role="form">
                    <div class="form-group">
                        <label for="number1">Enter number 1:</label>
                        <input type="text" id="number1" class="form-control" placeholder="Enter number 1">
                    </div>
                    <div class="form-group">
                        <label for="number2">Enter number 2:</label>
                        <input type="text" id="number2" class="form-control" placeholder="Enter number 2">
                    </div>
                    <div class="calculation">
                        <ul class="list-unstyled">
                            <li>
                                <button class="button-calculate btn-default" type="submit">+</button>
                            </li>
                            <li>
                                <button class="button-calculate btn-default" type="submit">-</button>
                            </li>
                            <li>
                                <button class="button-calculate btn-default" type="submit">*</button>
                            </li>
                            <li>
                                <button class="button-calculate btn-default" type="submit">/</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
