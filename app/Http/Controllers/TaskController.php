<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();

        return view('task.index')->with([
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


            $clients = Client::pluck('company_name','id');
            //The pluck method retrieves all of the values for a given key

            $users = User::pluck('name', 'id');

            $projects = Project::pluck('title', 'id');



        return view('task.create') ->with([
        'clients' => $clients,
        'users' => $users,
        'projects'=> $projects
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $request->validated();


        $task = new Task();

        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = $request->input('user_id');
        $task->client_id = $request->input('client_id');
        $task->project_id = $request->input('project_id');
        $task->deadline = $request->input('deadline');
        $task->status = $request->input('status');

        /* dd($task);
 */
        $task->save();

    $request->session()->flash('status', 'The Task was created!');

    return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $clients = Client::pluck('company_name','id');
        //The pluck method retrieves all of the values for a given key

        $users = User::pluck('name', 'id');

        $projects = Project::pluck('title', 'id');

       return view('task.edit')->with([
        'projects' => $projects,
        'tasks' => $task,
        'clients' => $clients,
        'users' => $users
       ]);

       session()->flash('status', 'The Task was edited!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $request->validated();


        $task->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'client_id' => $request['client_id'],
            'project_id' => $request['project_id'],
            'user_id' => $request['user_id'],

        ]);

        session()->flash('status', 'The Task was edited!');

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return $this->index();
    }
}
