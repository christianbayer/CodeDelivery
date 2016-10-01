<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{

    private $clientRepository;
    private $clientService;

    public function __construct(ClientRepository $clientRepository, ClientService $clientService)
    {
        $this->clientRepository = $clientRepository;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $clients = $this->clientRepository ->paginate(5);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request)
    {
        $input = $request->all();
        
        $this->clientService->store($input);

        return redirect()->route('admin.clients.index');
    }
    
    public function edit($id){
        $client = $this->clientRepository->find($id);
        
        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id){
        $input = $request->all();

        $this->clientService->update($input, $id);
        
        return redirect()->route('admin.clients.index');
    }
}
