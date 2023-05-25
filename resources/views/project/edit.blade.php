@extends('adminlte::page')

@section('title', 'Edit a Project')


@section('content')
            <div class="container">
                @isset($message_success)
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        {{  $message_success }}
                    </div>
                </div>
              @endisset

              @isset($message_warning)
              <div class="container">
                  <div class="alert alert-warning" role="alert">
                      {{  $message_warning  }}
                  </div>
              </div>
          @endisset
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            @if($errors->any())
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
                <div class="card-header">Edit a Project</div>
                <div class="card-body">
                    <form class="form-control" autocomplete="off" action="/project/{{$project->id}}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control{{ $errors->has('title') ? ' border-danger' : '' }}" value="{{$project->title ?? old('title') }}" id="title" name="title">

                            <small class="form-text text-danger">{!! $errors->first('title') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" value="{{ $car->description ?? old('description') }}" name="description" rows="5"></textarea>
                            <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>

                              <select class="form-select ml-2" name="status" aria-label="status">

                                @foreach ( App\Models\Project::STATUS  as $status) {{-- Get all const status like this way --}}

                                <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach

                              </select>
                        </div>

                        <div class="form-group">
                            <label for="client_id">Assigned a project to a Client</label>

                            <select class="form-select ml-2 lg" name="client_id" aria-label="client_id">

                                @foreach ( $clients as $id => $company_name )

                                <option value="{{ $id }}">{{ $company_name }}</option>
                                @endforeach

                              </select>
                        </div>

                        <div class="form-group">
                            <label for="user_id">This project will be handled by</label>

                            <select class="form-select ml-2 lg" name="user_id" aria-label="user_id">

                                @foreach ( $users as $id => $name)

                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach

                              </select>
                        </div>


                        <a class="btn btn-primary float-right" type="hidden" href="/project"><i class="fas fa-arrow-circle-up"></i> Back</a>

                        <input class="btn btn-primary mb-2" type="submit" value="Edit a Car">
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
