<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Categories\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Categories\CategoryUpdateRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryRepositoryInterface , $category;
    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface , Category $category){

        $this->middleware(['permission:categories_read'])->only('index');
        $this->middleware(['permission:categories_create'])->only('create');
        $this->middleware(['permission:categories_update'])->only(['edit','update']);
        $this->middleware(['permission:categories_delete'])->only('delete');

        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
        $this->category = $category;
    }
    public function index()
    {
        return $this->categoryRepositoryInterface->index();
    }
    public function create()
    {
        return $this->categoryRepositoryInterface->create('dashboard.categories.create');
    }
    public function store(CategoryStoreRequest $request)
    {
        return $this->categoryRepositoryInterface->store($this->category , $request->all());
    }
    public function edit(string $id)
    {
        return $this->categoryRepositoryInterface->edit($this->category,$id);
    }

    public function update(CategoryUpdateRequest $request, string $id)
    {
        return $this->categoryRepositoryInterface->update($this->category,$id,$request->all());
    }
    public function destroy(string $id)
    {
        return $this->categoryRepositoryInterface->destroy($this->category,$id);
    }

    public function archive()
    {
        return $this->categoryRepositoryInterface->archive($this->category);
    }
    public function restore($id)
    {
        return $this->categoryRepositoryInterface->restore($this->category,$id);
    }
    public function forceDelete($id)
    {
        return $this->categoryRepositoryInterface->forceDelete($this->category,$id);
    }
}
