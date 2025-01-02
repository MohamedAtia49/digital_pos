<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface {
    public function index()
    {
        try{
            return view('dashboard.clients.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
    public function create($viewName){
        return view($viewName);
    }
    public function store($model, array $request)
    {
        try {
            // Create the client
            $client = $model::create([
                'name' => $request['name'],
                'national_number' => $request['national_number'],
                'phone' => $request['phone'], // Used a Mutator and Accessor in Client Model to handel it
                'email' => $request['email'],
                'address' => $request['address'],
            ]);

            // Set a success message
            session()->flash('add', __('site.added_successfully'));

            // Redirect to the client index page
            return redirect()->route('dashboard.clients.index');
        } catch (\Exception $e) {
            // Log the error for debugging and return with an error message
            \Log::error('Error storing clients: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($model,$id){
        try {
            $client = $model::find($id);
            return view('dashboard.clients.edit',compact('client'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($model, $id, array $request){
        try {
            //find client by id
            $client = $model::find($id);
            //update client
            $client->update([
                'name' => $request['name'],
                'national_number' => $request['national_number'],
                'phone' => $request['phone'], // Used a Mutator and Accessor in Client Model to handel it
                'email' => $request['email'],
                'address' => $request['address'],
            ]);
            //send flash message
            session()->flash('update',__('site.updated_successfully'));
            return redirect()->route('dashboard.clients.index');
        }catch(\Exception $e){
            \Log::error('Error updating client: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($model, $id){
        try {
            //Delete client data
            $client = $model::find($id);
            $client->delete();
            //Send flash massage
            session()->flash('delete',__('site.deleted_successfully'));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }

    }
}
