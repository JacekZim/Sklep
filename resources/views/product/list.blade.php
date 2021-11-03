<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
    <div class="grid grid-cols-3 gap-4 bg-yellow-200">


       @foreach ($products as $product)
<div class="bg-yellow-400">
           <p>This is product {{ $product->name. number_format($product->price/100, 2 )}}</p>
           <a href="{{route('product_link',['id'=>$product->id])}}">Szczegóły </a></div>
       @endforeach
    </div>
{{$products->links()}}


    </body>
</html>
