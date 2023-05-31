@extends('adminlte::page')

@section('title', 'Clients')


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
   <a href="/client/create"><button class="btn btn-primary float-left"> Create a Client</button></a>
</div>
</div>

<table class="table stripped">
    <thead>
      <tr>
        <th scope="col">Company Name</th>
        <th scope="col">Company Address</th>
        <th scope="col">Email</th>
        <th scope="col">Company City</th>
        <th scope="col">Contact Person</th>
        <th scope="col">Created_At</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->company_name }}</td>
            <td>{{ $client->company_address}}</td>
            <td>{{ $client->email}}</td>
            <td>{{ $client->company_city}}</td>
            <td>{{ $client->contact_person}}</td>
            <td>{{ $client->created_at }}</td>
            <td>  <a class="btn btn-sm btn-secondary ml-2" href="/client/{{ $client->id }}/edit">Edit</a></td>
            <td>  <form class="float-right" style="display: inline" action="/client/{{ $client->id }}" method="post">
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
