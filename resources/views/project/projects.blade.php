@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('All Projects') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Created_At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->deadline }}</td>
                                <td>{{ $project->created_at }}</td>

                            </tr>

                            @endforeach


                        </tbody>
                      </table>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Archived Projects') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-danger table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Deleted At</th>
                            <th scope="col">Restore a project</th>
                            <th scope="col">Delete Forever</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashedProjects as $trashedProject)
                            <tr>
                                <td>{{ $trashedProject->title}}</td>
                                <td>{{ $trashedProject->deleted_at}}</td>
                                @if ($trashedProject->trashed())
                                <td>

                                       <form action="{{ route('projects.restore', $trashedProject->id) }}"  style="display: inline" method="POST">
                                         @csrf
                                           <input class="btn btn-danger" type="submit" value="Restore Project">
                                       </form>
                               </td>
                               <td>
                                       <form action="{{ route('projects.force.delete', $trashedProject->id) }}"  method="POST">
                                        @csrf
                                        <input class="btn btn-danger" style="display: inline" value="Delete Forever" type="submit">
                                      </form>
                               </td>
                            </tr>
                             @endif
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>

    </div>


</div>
@endsection
