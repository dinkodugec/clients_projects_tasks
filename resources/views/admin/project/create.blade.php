@extends('adminlte::page')

@section('title', 'Create a Project')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Project</div>
                <div class="card-body">
                    <form autocomplete="off" method="POST" action="{{ route('project.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control{{ $errors->has('title') ? ' border-danger' : '' }}" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" name="description" rows="5"></textarea>
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
                            <label for="status_id">Assigned a project to a Client</label>

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

                        <div class="form-group">
                            <label for="deadline">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline') }}">
                            @error('deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Save a Project">
                    </form>
                    <a class="btn btn-primary float-right" href="{{ route('admin.index') }}"><i class="fas fa-arrow-circle-up"></i> Back</a>
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
