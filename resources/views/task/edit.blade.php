@extends('adminlte::page')

@section('title', 'Edit a Task')


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
                <div class="card-header">Edit a Task</div>
                <div class="card-body">
                    <form class="form-control" autocomplete="off" action="/task/{{$tasks->id}}" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control{{ $errors->has('title') ? ' border-danger' : '' }}" value="{{$tasks->title ?? old('title') }}" id="title" name="title">

                            <small class="form-text text-danger">{!! $errors->first('title') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" value="{{ $tasks->description ?? old('description') }}" name="description" rows="5"></textarea>
                            <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>

                              <select class="form-select ml-2" name="status" aria-label="status">

                                @foreach ( App\Models\TASK::STATUS  as $status) {{-- Get all const status like this way --}}

                                <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach

                              </select>
                        </div>

                        <div class="form-group">
                            <label for="client_id">Assigned a Task to a Client</label>

                            <select class="form-select ml-2 lg" name="client_id" aria-label="client_id">

                                @foreach ( $clients as $id => $company_name )

                                <option value="{{ $id }}">{{ $company_name }}</option>
                                @endforeach

                              </select>
                        </div>

                        <div class="form-group">
                            <label for="user_id">Task for a user</label>

                            <select class="form-select ml-2 lg" name="user_id" aria-label="user_id">

                                @foreach ( $users as $id => $name)

                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach

                              </select>
                        </div>

                        <div class="form-group">
                            <label for="project_id">Task for a Project</label>

                            <select class="form-select ml-2 lg" name="project_id" aria-label="project_id">

                                @foreach ( $projects as $id => $title)

                                <option value="{{ $id }}">{{ $title }}</option>
                                @endforeach

                              </select>
                        </div>


                        <a class="btn btn-primary float-right" type="hidden" href="/task"><i class="fas fa-arrow-circle-up"></i> Back</a>

                        <input class="btn btn-primary mb-2" type="submit" value="Edit a Task">
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
