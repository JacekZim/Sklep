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
                background-color:DarkGray ;
            }
            body {
                background-color: #4a5568;
            }
        </style>
    </head>
    <body >

    <form action="{{route('order')}}" method="POST">
        @csrf



       @foreach ($products as $cart)

           <p>This is product {{ $cart->product->name.' '. number_format($cart->product->price/100, 2 ).' '.$cart->qty}}</p>
           <a class="szczegoly" href="{{route('cart_delete',['id'=>$cart->id])}}">Usuń </a>
           <a class="szczegoly" href="{{route('cart_incrementation',['id'=>$cart->id])}}">Dodaj </a>
           <a class="szczegoly" href="{{route('cart_decrementation',['id'=>$cart->id])}}">Zmniejsz </a>
            <input type="hidden" name="product[{{$cart->product->id}}][qty]" value="{{$cart->qty}}"/>
            <input type="hidden" name="cart_id" value="{{$cart->id}}"/>
       @endforeach
       <br />
       <br />
       <input type="submit" value="Złóż zamówienie"/>
       <br />
       <br />
        <input  placeholder="Imię i Nazwisko" name="name" type="text" class="border-green-400 m-4 border-2 @error('name') bg-red-300 @enderror">
        <input  placeholder="adres" name="adres" type="text" class="border-green-400 m-4 border-2 @error('adres') bg-red-300 @enderror">
        <input  placeholder="telefon" name="telefon" type="text" class="border-green-400 m-4 border-2 @error('telefon') bg-red-300 @enderror">
    </form>
       <a class="szczegoly" href="{{route('products')}}">Powrót </a><br />





    </body>
</html>
