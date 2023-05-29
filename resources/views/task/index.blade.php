@extends('adminlte::page')

@section('title', 'Tasks')


@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


<div class="container mb-3">
    <div class="row">
   <a href="/task/create"><button class="btn btn-primary float-left"> Create a Task</button></a>
</div>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Created_At</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->created_at }}</td>
            <td>  <a class="btn btn-sm btn-secondary ml-2" href="/task/{{ $task->id }}/edit">Edit</a></td>
            <td>  <form class="float-right" style="display: inline" action="/task/{{ $task->id }}" method="post">
                @csrf
                @method("DELETE")
                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
            </form>
           </td>
        </tr>

        @endforeach


    </tbody>
  </table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
