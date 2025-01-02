<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\UserStoreRequest;
use App\Http\Requests\Dashboard\Users\UserUpdateRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userRepositoryInterface;
    public $admin;
    public function __construct(UserRepositoryInterface $userRepositoryInterface , User $admin){

        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only(['edit','update']);
        $this->middleware(['permission:users_delete'])->only('delete');

        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->admin = $admin;
    }
    public function index(Request $request)
    {
        return $this->userRepositoryInterface->index();
    }

    public function create()
    {
        return $this->userRepositoryInterface->create('dashboard.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        return $this->userRepositoryInterface->store($this->admin,$request->all());
    }
    public function edit(string $id)
    {
        return $this->userRepositoryInterface->edit($this->admin,$id);
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        return $this->userRepositoryInterface->update($this->admin,$id,$request->all());
    }

    public function destroy(string $id)
    {
        return $this->userRepositoryInterface->destroy($this->admin,$id);
    }
}
