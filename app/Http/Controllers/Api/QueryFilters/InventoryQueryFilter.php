<?php

namespace App\Http\Controllers\Api\QueryFilters;

use App\Http\Controllers\Api\QueryFilters\BaseQueryFilter;

class InventoryQueryFilter extends BaseQueryFilter
{
    private $id;
    private $code;
    private $name;
    private $price;
    private $stock;

    function __construct($request)
    {
        parent::__construct($request);
        $this->id = isset($request['id']) ? $request['id'] : 0;
        $this->name = isset($request['name']) ? $request['name'] : 0;
    }

    
    public function get_inventory_name()
    {
        return $this->name;
    }
}