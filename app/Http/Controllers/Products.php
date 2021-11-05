<?php
namespace App\Http\Controllers;

use App\Models\Category;
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
        // dd($request->query('cat'));
        $validated = $request->validate([
            'search' => 'min:3',

        ]);
        $category = Category::find($request->query('cat'));
        $categories = $category->descendants()->pluck('id');

        // Include the id of category itself
        $categories[] = $category->getKey();

        // Get goods

        $tree = Category::get()->toTree()->toArray();

        return view(
            'product.list',
            ['products' => Product::query()
                ->where('name', 'like', '%' . $request->post('search') . '%')
                ->whereIn('cat_id', $categories)
                ->paginate(10),
                'tree' => $tree,

            ]
        );
    }
}
