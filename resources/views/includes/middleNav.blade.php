
@php( $route = \Illuminate\Support\Facades\Route::currentRouteName() )


<li class="{{ $route == "accueil" ? "active" : "" }}"><a href="{{route('accueil')}}">Home</a></li>
<li class="{{ $route == "shop" ? "active" : "" }}"><a href="{{route('shop')}}">Shop page</a></li>
<li class="{{ $route == "single-product" ? "active" : "" }}"><a href="{{route('single-product')}}">Single product</a></li>
<li class="{{ $route == "cart" ? "active" : "" }}"><a href="{{route('cart')}}">Cart</a></li>
<li class="{{ $route == "checkout" ? "active" : "" }}"><a href="{{route('checkout')}}">Checkout</a></li>
<li class="ifActive"><a href="#">Category</a></li>
<li class="ifActive"><a href="#">Others</a></li>
<li class="ifActive"><a href="#">Contact</a></li>