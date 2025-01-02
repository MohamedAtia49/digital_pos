<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface {

    public function index()
    {
        try{
            return view('dashboard.users.index');
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
            // Initialize an empty image path
            $imagePath = 'storage/admins/default.png'; // Default image path

            // Work with the image if it exists in the request
            if (isset($request['image']) && $request['image']) {
                // Generate a unique image name with timestamp
                $imageName = time() . '.' . $request['image']->getClientOriginalExtension();

                // Save the image in the "admins" directory under the "public" disk
                $request['image']->storeAs('admins', $imageName, 'public');

                // Update the image path to be stored in the database
                $imagePath = 'storage/admins/' . $imageName;
            }

            // Create a new user
            $user = $model::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'image' => $imagePath, // Store the image path in the database
            ]);

            // Assign the admin role and permissions
            $user->addRole('admin');
            $user->syncPermissions($request['permissions']);

            // Set a success message
            session()->flash('add', __('site.added_successfully'));

            // Redirect to the users index page
            return redirect()->route('dashboard.users.index');
        } catch (\Exception $e) {
            // Log the error for debugging and return with an error message
            \Log::error('Error storing user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($model,$id){
        try {
            $user = $model::with('permissions')->find($id);
            return view('dashboard.users.edit',compact('user'));
        }catch(\Exception $e){
            Log::error('Error storing user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($model, $id, array $request){
        try {
            $user = $model::find($id);

            // Check if the request has an image
            if (isset($request['image']) && $request['image']) {
                // Delete the old image if it exists and is not the default
                if ($user->image !== 'storage/users/default.png' && \File::exists(public_path($user->image))) {
                    File::delete(public_path($user->image));
                }
                // Generate a unique image name with timestamp
                $imageName = time() . '.' . $request['image']->getClientOriginalExtension();

                // Save the image in the "admins" directory under the "public" disk
                $request['image']->storeAs('admins', $imageName, 'public');

                // Update the image path to be stored in the database
                $imagePath = 'storage/admins/' . $imageName;
            }else{
                $imagePath = $user->image;
            }

            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'image' => $imagePath,
            ]);

            $user->syncPermissions($request['permissions']);

            session()->flash('update',__('site.updated_successfully'));
            return redirect()->route('dashboard.users.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($model, $id){
        $user = $model::find($id);
        if($user->id !== 1){
            // Delete user data
            $user->delete();
            $user->syncRoles([]);
            $user->syncPermissions([]);
            // Delete the user image if it exists
            if ($user->image !== 'storage/admins/default.png' && File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            session()->flash('delete',__('site.deleted_successfully'));
            return redirect()->back();
        }else{
            session()->flash('super_admin_cant_be_deleted',__('site.super_admin_cant_be_deleted'));
            return redirect()->back();
        }
    }
}
