<?php

namespace App\Interfaces;

interface ClientRepositoryInterface{
    public function index();
    public function create($viewName);
    public function store($model,array $request);
    public function edit($model,$id);
    public function update($model,$id,array $request);
    public function destroy($model,$id);
}
