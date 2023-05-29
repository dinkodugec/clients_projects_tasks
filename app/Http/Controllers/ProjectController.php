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
use Illuminate\Support\Facades\DB; //enable database loging


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*
       /********   EAGER LOADING    -   $projects = Project::with('client')->get();      -     EAGER LOADING    ******* /

        $projects = Project::all();

        DB::enableQueryLog(); //enable database loging

        foreach ($projects as $project) {
            foreach ($project->client as $client) {
                 echo $client->company_name;
              }
          }

         dd(DB::getQueryLog());  THIS IS LAZY LOADING - specific column from database - IT can slow preformance when are too many queries */



        $projects = Project::all();

        return view('project.index')->with([
            'projects' => $projects
        ]);
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

        $request->session()->flash('status', 'The Project was created!');

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

        $clients = Client::pluck('company_name','id');
        //The pluck method retrieves all of the values for a given key

        $users = User::pluck('name', 'id');

       return view('project.edit')->with([
        'project' => $project,
        'clients' => $clients,
        'users' => $users
       ]);

       session()->flash('status', 'The Project was edited!');
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


        $project->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'client_id' => $request['client_id'],
            'user_id' => $request['user_id'],

        ]);

        session()->flash('status', 'The Project was edited!');

        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return $this->index();
    }
}
