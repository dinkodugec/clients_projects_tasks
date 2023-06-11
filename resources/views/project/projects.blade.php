@extends('layouts.app')

@section('content')
<div class="row">
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

        <div class="col-6">
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


         <div class="row ml-5 mt-5">

            <div class="col-6">
              <div class="card" style="width: 18rem;">
                    <div class="card-body mt-2">
                        <h5 class="card-title">Clients with most projects</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Our most valuable clinets with most projects
                        </h6>
                    </div>
                    <ul class="list-group list-group-flush">
                          @foreach ($clients_most_projects as $mostProject)
                            <li class="list-group-item">
                                <a href="{{ route('client.show', ['client' => $mostProject->id]) }} ">
                                    {{ $mostProject->company_name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



            <div class="col-4">
              <div class="card" style="width: 18rem;">
                    <div class="card-body mt-2">
                        <h5 class="card-title">Users with most projects</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Our most valuable clinets with most projects
                        </h6>
                    </div>
                    <ul class="list-group list-group-flush">
                          @foreach ($user_with_most_projects as $mostProject)
                            <li class="list-group-item">
                                    {{ $mostProject->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>



        </div>
    </div>

    <div class="row">
        <div class="col-4 mt-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body mt-4">
                        <h5 class="card-title">Clients with most projects</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            What people are currently talking about
                        </h6>
                    </div>
                    <ul class="list-group list-group-flush">
                       @foreach ($user_with_most_projects_last_month as $user)
                            <li class="list-group-item">
                                <a href="{{ route('user.show', ['post' => $user->id]) }}">
                                    {{ $user->name }}
                                </a>
                            </li>
                        @endforeach -
                    </ul>
                </div>
            </div>

        <div class="col-8">
            lorem ipsum
        </div>

    </div>


</div>

@endsection
