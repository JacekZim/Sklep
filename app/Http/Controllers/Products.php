<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function show($id)
    {
        return view(
            'product.view',
            Product::query()->find($id)->toArray()
        );
    }

    public function list(Request $request)
    {

        $validated = $request->validate([
            'search' => 'min:3',

        ]);

        return view(
            'product.list',
            ['products' => Product::query()->where('name', 'like', '%' . $request->post('search') . '%')->paginate(10)]
        );
    }
}
