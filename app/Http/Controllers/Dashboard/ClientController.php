<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Clients\ClientStoreRequest;
use App\Http\Requests\Dashboard\Clients\ClientUpdateRequest;
use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public $clientRepositoryInterface , $client;
    public function __construct(ClientRepositoryInterface $clientRepositoryInterface , Client $client)
    {
        $this->middleware(['permission:clients_read'])->only('index');
        $this->middleware(['permission:clients_create'])->only('create');
        $this->middleware(['permission:clients_update'])->only(['edit','update']);
        $this->middleware(['permission:clients_delete'])->only('delete');

        $this->clientRepositoryInterface = $clientRepositoryInterface;
        $this->client = $client;
    }
    public function index()
    {
        return $this->clientRepositoryInterface->index();
    }

    public function create()
    {
        return $this->clientRepositoryInterface->create('dashboard.clients.create');
    }

    public function store(ClientStoreRequest $request)
    {
        return $this->clientRepositoryInterface->store($this->client,$request->all());
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return $this->clientRepositoryInterface->edit($this->client,$id);
    }

    public function update(ClientUpdateRequest $request, string $id)
    {
        return $this->clientRepositoryInterface->update($this->client,$id, $request->all());
    }

    public function destroy(string $id)
    {
        return $this->clientRepositoryInterface->destroy($this->client,$id);
    }
}
