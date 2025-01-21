<?php

namespace App\Interfaces;

interface SaleRepositoryInterface{
    public function index();
    public function create($viewName,$id);
    public function store($id,$model,array $request);
    public function edit($model,$id);
    public function update($model,$id,array $request);
    public function destroy($model,$id);
    public function archive($model);
    public function restore($model,$id);
    public function forceDelete($model,$id);
}
