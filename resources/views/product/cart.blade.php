<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style >
            .szczegoly{
                color:mediumpurple;
                font-weight:bold ;
                border:1px solid blue;
                padding:3px;
                background-color:white ;
            }
        </style>
    </head>
    <body >

       @foreach ($products as $cart)

           <p>This is product {{ $cart->product->name.' '. number_format($cart->product->price/100, 2 ).' '.$cart->qty}}</p>
           <a class="szczegoly" href="{{route('cart_delete',['id'=>$cart->id])}}">Usuń </a>
           <a class="szczegoly" href="{{route('cart_incrementation',['id'=>$cart->id])}}">Dodaj </a>
           <a class="szczegoly" href="{{route('cart_decrementation',['id'=>$cart->id])}}">Zmniejsz </a>
       @endforeach
       <br />
       <br />
       <a class="szczegoly" href="{{route('products')}}">Powrót </a><br />





    </body>
</html>
