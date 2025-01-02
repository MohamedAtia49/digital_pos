<?php

namespace App\Interfaces;

interface ProductRepositoryInterface{
    public function index();
    public function create($viewName);
    public function store($model,array $request);
    public function edit($model,$id);
    public function update($model,$id,array $request);
    public function destroy($model,$id);
    public function archive($model);
    public function restore($model,$id);
    public function forceDelete($model,$id);
}
