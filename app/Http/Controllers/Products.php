<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Products extends Controller
{
    public function show()
    {
        return view('product.view',
            Product::query()->first()->toArray()
        );
    }
    public function list()
    { $items=Product::query()->paginate(10);
        return view('product.list',
            ['products'=>new LengthAwarePaginator($items, $items->count(),10)]
        );
    }
}
