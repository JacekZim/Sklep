<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class Products extends Controller
{
    public function show($id)
    {
        return view('product.view',
            Product::query()->find($id)->toArray()
        );
    }
    public function list()
    {
        return view('product.list',
            ['products'=>Product::query()->paginate(10)]
        );
    }
}
