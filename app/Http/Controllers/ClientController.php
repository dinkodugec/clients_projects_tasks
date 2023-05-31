<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index')->with([
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $request->validated();

        /* dd($request); */

        $client = new Client();

        $client->company_name = $request->input('company_name');
        $client->company_address = $request->input('company_address');
        $client->email  = $request->input('email');
        $client->company_city = $request->input('company_city');
        $client->contact_person = $request->input('contact_person');




    $client->save();

    $request->session()->flash('status', 'The Client was created!');

    return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit')->with([

            'client' => $client,

           ]);

           session()->flash('status', 'The Client was edited!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $request->validated();

        $client->update([
            'company_name' => $request['company_name'],
            'company_address' => $request['company_address'],
            'email ' => $request['email '],
            'company_city' => $request['company_city'],
            'contact_person' => $request['contact_person'],
        ]);

        session()->flash('status', 'The Client was edited!');

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return $this->index();
    }
}
