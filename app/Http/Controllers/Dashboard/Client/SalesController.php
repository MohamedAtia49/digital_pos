<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Sales\SaleStoreRequest;
use App\Interfaces\SaleRepositoryInterface;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    protected $saleRepositoryInterface;
    protected $sale;
    public function __construct(SaleRepositoryInterface $saleRepositoryInterface ,Sale $sale)
    {
        $this->saleRepositoryInterface = $saleRepositoryInterface;
        $this->sale = $sale;
    }
    public function index()
    {

    }

    public function create($id)
    {
        return $this->saleRepositoryInterface->create('dashboard.clients.sales.create',$id);
    }

    public function store($id ,SaleStoreRequest $request)
    {
        return $this->saleRepositoryInterface->store($id,$this->sale,$request->all());
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
