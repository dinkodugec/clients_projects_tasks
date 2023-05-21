<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Session;
/*  use Illuminate\Support\Facades\Request;  */
use Illuminate\Http\Request;
use \App\Http\Requests\StoreProjectRequest;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            /*    $status = Project::select('status')
                 ->get(); // get stauts value from const direct in Blade, so there was not need for get Status from db
             */

           /*  $clients = Client::select('company_name','id')
            ->get(); */

            $clients = Client::pluck('company_name','id');
            //The pluck method retrieves all of the values for a given key

            $users = User::pluck('name', 'id');



        return view('project.create') ->with([
        'clients' => $clients,
        'users' => $users
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

            $request->validated();


            $project = new Project();

            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->status = $request->input('status');
            $project->client_id = $request->input('client_id');
            $project->user_id = $request->input('user_id');
            $project->deadline = $request->input('deadline');



        $project->save();



        return redirect('/admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
