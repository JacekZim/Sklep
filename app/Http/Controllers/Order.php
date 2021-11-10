<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Order extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'adres' => 'required',
                'telefon' => 'required',
                'product' => 'array',
                'cart_id' => 'integer',
            ]
        );

        $order = \App\Models\Order::create(
            ['name' => $validated['name'],
                'adres' => $validated['adres'],
                'telefon' => $validated['telefon'],
                'user_id' => Auth::id(),
            ]
        );
        foreach ($validated['product'] as $product => $qty) {
            $prod = Product::query()->find($product);

            $order_product = \App\Models\Order_products::create(
                ['name' => $prod->name,
                    'price' => $prod->price,
                    'qty' => $qty['qty'],
                    'product_id' => $prod->id,
                    'order_id' => $order->id,
                ]
            );
        }

        $fun = \App\Models\Cart::query()->where('user_id', Auth::id())->delete();



        return redirect(route('cart'));
    }
}
