<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductRepository implements ProductRepositoryInterface {
    public function index()
    {
        try{
            return view('dashboard.products.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
    public function create($viewName){
        $categories = Category::all();
        return view($viewName,compact('categories'));
    }
    public function store($model, array $request){
        try {
            // Initialize an empty image path
            $imagePath = 'storage/products/default.png'; // Default image path

            // Check if an image exists in the request
            if (isset($request['image']) && $request['image']) {
                // Generate a unique image name with timestamp
                $imageName = time() . '.' . $request['image']->getClientOriginalExtension();

                // Save the image in the "products" directory under the "public" disk
                $request['image']->storeAs('products', $imageName, 'public');

                // Update the image path
                $imagePath = 'storage/products/' . $imageName;
            }

            // Create a new product using the provided model and request data
            $product = $model::create([
                'category_id' => $request['category_id'],
                'name' => $request['name'],
                'description' => $request['description'],
                'purchase_price' => $request['purchase_price'],
                'sale_price' => $request['sale_price'],
                'stock' => $request['stock'],
                'image' => $imagePath, // Store the image path in the database
            ]);

            // Set a success message
            session()->flash('add', __('site.added_successfully'));

            // Redirect to the products index page
            return redirect()->route('dashboard.products.index');
        } catch (\Exception $e) {
            // Log the error for debugging and return with an error message
            \Log::error('Error storing product: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($model,$id){
        try {
            $product = $model::with('category')->find($id);
            $categories = Category::all();
            return view('dashboard.products.edit',compact('product','categories'));
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function update($model, $id, array $request){
        try {
            //find product by id
            $product = $model::find($id);

            // Check if the request has an image
            if (isset($request['image']) && $request['image']) {
                // Delete the old image if it exists and is not the default
                if ($product->image !== 'storage/products/default.png' && \File::exists(public_path($product->image))) {
                    File::delete(public_path($product->image));
                }
                // Generate a unique image name with timestamp
                $imageName = time() . '.' . $request['image']->getClientOriginalExtension();

                // Save the image in the "products" directory under the "public" disk
                $request['image']->storeAs('products', $imageName, 'public');

                // Update the image path to be stored in the database
                $imagePath = 'storage/products/' . $imageName;
            }else{
                // If no image send in request then the image will be old image path
                $imagePath = $product->image;
            }

            //update product
            $product->update([
                'category_id' => $request['category_id'],
                'name' => $request['name'],
                'description' => $request['description'],
                'purchase_price' => $request['purchase_price'],
                'sale_price' => $request['sale_price'],
                'stock' => $request['stock'],
                'image' => $imagePath, // Update the image
            ]);
            //send flash message
            session()->flash('update',__('site.updated_successfully'));
            return redirect()->route('dashboard.products.index');
        }catch(\Exception $e){
            \Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function destroy($model, $id){
        try {
            //Delete product data
            $product = $model::find($id);
            $product->delete();

            //Send flash massage
            session()->flash('delete',__('site.deleted_successfully'));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function archive($model){
        try {
            return view('dashboard.products.archive');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function restore($model,$id){
        try {
            // Find the th product that soft deleted
            $product = $model::withTrashed()->find($id);
            //check if product exists and restore it
            if ($product) {
                $product->restore();
                session()->flash('update',__('site.updated_successfully'));
                return redirect()->route('dashboard.products.index');
            }

            return redirect()->route('dashboard.products.index')->with('error', 'Product not found!');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
    public function forceDelete($model, $id){
        try {
            // Find the th product that soft deleted
            $product = $model::withTrashed()->find($id);
            //check if product exists and force delete it
            if ($product) {
                $product->forceDelete();
                // Delete the product image if it exists and is not the default image
                if ($product->image !== 'storage/products/default.png' && File::exists(public_path($product->image))) {
                    File::delete(public_path($product->image));
                }
                session()->flash('delete',__('site.deleted_successfully'));
                return redirect()->route('dashboard.products.index');
            }

            return redirect()->route('dashboard.products.index')->with('error', 'Product not found!');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
