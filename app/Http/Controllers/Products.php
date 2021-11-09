<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isFalse;

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
        $categories = null;
        $path=[];
        if (null != $category) {
            $path = Category::with('ancestors')->where('id', $request->query('cat'))->get();
            $categories = $category->descendants()->pluck('id');

            // Include the id of category itself
            $categories[] = $category->getKey();
        }
        // Get goods

        $tree = Category::get()->toTree()->toArray();
        $products_query = Product::query()
            ->where('name', 'like', '%' . $request->post('search') . '%');
        if (null != $categories) {
            $products_query->whereIn('cat_id', $categories);
        }


if(is_array($path)){

}
else {
    $path->toArray();
}
        return view(
            'product.list',
            ['products' => $products_query
                ->paginate(10),
                'tree' => $tree,
                'path' => $path,

            ]
        );
    }
}
