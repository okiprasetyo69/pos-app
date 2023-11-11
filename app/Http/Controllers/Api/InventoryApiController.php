<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Controllers\Api\QueryFilters\InventoryQueryFilter;
use App\Models\Inventory;
use Auth;

class InventoryApiController extends BaseApiController{
    
    public function dataInventory(Request $request){

        $inventoryQueryFilter = new InventoryQueryFilter($request->all());
        $inventory = Inventory::orderBy('id', 'ASC');
        if($request->name != null){
            $inventory = $inventory->where('name', "like", "%" . $request->name. "%");
        }

        $result = $inventory->($inventoryQueryFilter->get_length())->offset($inventoryQueryFilter->get_start());
        $data = $this->set_datatable_response($inventoryQueryFilter->get_draw(), $inventory->count(), $result->get());
        return $this->success_response_datatable();
    }

}