<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class Cart extends Controller
{
    public function show()
    {
        $prod = \App\Models\Cart::query()->with('product')->where('user_id', Auth::id())->get();

        return view(
            'product.cart',
            ['products' => $prod]
        );
    }

    public function add($id)
    {
        $fun = \App\Models\Cart::query()->where('user_id', Auth::id())->where('product_id', $id)->first();
        if ($fun) {
            ++$fun->qty;
            $fun->save();
        } else {
            \App\Models\Cart::create([

                'product_id' => $id,
                'user_id' => Auth::id(),
                'qty' => 1,

            ]);
        }

        return redirect('/cart');
    }

    public function delete($id)
    {
        $fun = \App\Models\Cart::query()->where('user_id', Auth::id())->where('id', $id)->first();

        if ($fun) {
            $fun->delete();
        }

        return redirect('/cart');
    }

    public function incrementation($id)
    {
        \App\Models\Cart::query()->where('user_id', Auth::id())->where('id', $id)->increment('qty', 1);

        return redirect('/cart');
    }

    public function decrementation($id)
    {
        \App\Models\Cart::query()->where('user_id', Auth::id())->where('id', $id)->decrement('qty', 1);
        if (0 == \App\Models\Cart::query()->where('user_id', Auth::id())->where('id', $id)->value('qty')) {
            $this->delete($id);
        }


        return redirect('/cart');
    }
}
