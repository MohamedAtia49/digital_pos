<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    public function index()
    {
        try{
            return view('dashboard.categories.index');
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
            // Create a new Category
            $category = $model::create([
                'name' => $request['name'],
            ]);

            // Set a success message
            session()->flash('add', __('site.added_successfully'));

            // Redirect to the categories index page
            return redirect()->route('dashboard.categories.index');
        } catch (\Exception $e) {
            // Log the error for debugging and return with an error message
            \Log::error('Error storing category: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function edit($model,$id){
        try {
            $category = $model::find($id);
            return view('dashboard.categories.edit',compact('category'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($model, $id, array $request){
        try {
            //find category by id
            $category = $model::find($id);
            //update category
            $category->update([
                'name' => $request['name'],
            ]);
            //send flash message
            session()->flash('update',__('site.updated_successfully'));
            return redirect()->route('dashboard.categories.index');
        }catch(\Exception $e){
            \Log::error('Error updating category: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($model, $id){
        try {
            //Delete category data
            $category = $model::find($id);
            $category->delete();
            //Send flash massage
            session()->flash('delete',__('site.deleted_successfully'));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
    public function archive($model){
        try {
            return view('dashboard.categories.archive');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function restore($model,$id){
        try {
            // Find the th category that soft deleted
            $category = $model::withTrashed()->find($id);
            //check if category exists and restore it
            if ($category) {
                $category->restore();
                session()->flash('update',__('site.updated_successfully'));
                return redirect()->route('dashboard.categories.index');
            }

            return redirect()->route('dashboard.categories.index')->with('error', 'Category not found!');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
    public function forceDelete($model, $id){
        try {
            // Find the th category that soft deleted
            $category = $model::withTrashed()->find($id);
            //check if category exists and force delete it
            if ($category) {
                $category->forceDelete();
                session()->flash('delete',__('site.deleted_successfully'));
                return redirect()->route('dashboard.categories.index');
            }

            return redirect()->route('dashboard.categories.index')->with('error', 'Category not found!');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

}
