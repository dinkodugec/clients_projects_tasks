@extends('adminlte::page')

@section('title', 'All Projects')


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
   <a href="/project/create"><button class="btn btn-primary float-left"> Create a Project</button></a>
</div>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Deadline</th>
        <th scope="col">Created_At</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->status }}</td>
            <td>{{ $project->deadline }}</td>
            <td>{{ $project->created_at }}</td>
            <td>  <a class="btn btn-sm btn-secondary ml-2" href="/project/{{ $project->id }}/edit">Edit</a></td>
            <td>  <form class="float-right" style="display: inline" action="/project/{{ $project->id }}" method="post">
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
