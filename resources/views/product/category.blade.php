<li><a href="{{route('products').'?cat='.$cat['id']}} " @if( app('request')->input('cat')==$cat['id'] )style="font-weight:bold; "@endif >{{ $cat['name'] }}</a>
@if (count($cat['children']) > 0)
    <ul>
        @foreach($cat['children'] as $cat)
            @include('product.category', $cat)
        @endforeach
    </ul>
@endif
</li>
