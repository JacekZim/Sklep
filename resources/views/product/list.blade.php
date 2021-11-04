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
    <body class="antialiased">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('search_link')}}" method="POST">
        @csrf
        <input id="search" placeholder="szukaj" name="search" type="text" class="border-green-400 m-4 border-2 @error('search') bg-red-300 @enderror">
        <input type="image" src="images/lupa.png" width="40" name="sub" />
    </form>
    <div class="grid grid-cols-3 gap-4 bg-yellow-200">


       @foreach ($products as $product)
<div class="bg-yellow-400" style="padding:10px">
    <img src="{{$product->image}}"width="100">
           <p>This is product {{ $product->name. number_format($product->price/100, 2 )}}</p>
           <a class="szczegoly" href="{{route('product_link',['id'=>$product->id])}}">Szczegóły </a></div>
       @endforeach
    </div>
{{$products->links()}}


    </body>
</html>
