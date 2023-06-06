@extends('adminlte::page')

@section('title', 'User Profile')

@section('content_header')
    <h1>Profile of User</h1>
@stop

@section('content')
    <p>Make a profile for user: {{ $id }}</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
