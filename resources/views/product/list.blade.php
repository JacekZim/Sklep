<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style >
ul {
    list-style: circle;
margin-left: 30px;
}
li{
    padding-left:10px;
}
            .szczegoly{
                color:mediumpurple;
                font-weight:bold ;
                border:1px solid blue;
                padding:3px;
                background-color:white ;
            }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover  {
    background-color: red;
}

.drop1 {
    display: none;
    position: absolute;

    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

li.li1:hover ul.drop1 {
    display: block;
}
.drop2 {
    display : none;
}
.drop2 li{
    clear: both;
}
li.li2:hover ul.drop2{
    display: block;
    
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
@php
    $level=0;
@endphp
    @if (count($tree) > 0)
        <ul>
            @foreach ($tree as $cat)
                @include('product.category', [$cat,$level])
            @endforeach
        </ul>

    @endif

    <form action="{{route('search_link')}}" method="POST">
        @csrf
        <input id="search" placeholder="szukaj" name="search" type="text" class="border-green-400 m-4 border-2 @error('search') bg-red-300 @enderror">
        <input type="image" src="images/lupa.png" width="40" name="sub" />
    </form>
    <div class="grid grid-cols-3 gap-4 bg-yellow-200">




       @foreach ($products as $product)
<div class="bg-yellow-400" style="padding:10px">
    <img src="{{asset('storage/images/'.$product->image)}}"width="100">
           <p>This is product {{ $product->name. number_format($product->price/100, 2 )}}</p>
           <a class="szczegoly" href="{{route('product_link',['id'=>$product->id])}}">Szczegóły </a></div>
       @endforeach
    </div>
{{$products->links()}}


    </body>
</html>
