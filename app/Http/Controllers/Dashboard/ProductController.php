<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\ProductStoreRequest;
use App\Http\Requests\Dashboard\Products\ProductUpdateRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productRepositoryInterface , $product;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface ,Product $product)
    {
        $this->middleware(['permission:products_read'])->only('index');
        $this->middleware(['permission:products_create'])->only('create');
        $this->middleware(['permission:products_update'])->only(['edit','update']);
        $this->middleware(['permission:products_delete'])->only('delete');

        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->product = $product;
    }
    public function index()
    {
        return $this->productRepositoryInterface->index();
    }
    public function create()
    {
        return $this->productRepositoryInterface->create('dashboard.products.create');
    }
    public function store(ProductStoreRequest $request)
    {
        return $this->productRepositoryInterface->store($this->product,$request->all());

    }
    public function edit(string $id)
    {
        return $this->productRepositoryInterface->edit($this->product,$id);
    }
    public function update(ProductUpdateRequest $request, string $id)
    {
        return $this->productRepositoryInterface->update($this->product,$id,$request->all());
    }
    public function destroy(string $id)
    {
        return $this->productRepositoryInterface->destroy($this->product,$id);
    }
    public function archive()
    {
        return $this->productRepositoryInterface->archive($this->product);
    }
    public function restore($id)
    {
        return $this->productRepositoryInterface->restore($this->product,$id);
    }
    public function forceDelete($id)
    {
        return $this->productRepositoryInterface->forceDelete($this->product,$id);
    }
}
