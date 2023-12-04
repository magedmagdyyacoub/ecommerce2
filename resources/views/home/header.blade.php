<div class="container">
  <ul class="header-links pull-left">
    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
  </ul>
  <ul class="header-links pull-right">
    <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
    @if (Route::has('login'))
    @auth
  <li><a href="{{ url('/dashboard') }}">logout</a></li>
    @else
    <li><a href="{{route('login')}}"><i class="fa fa-user-o"></i> Login</a></li>
    <li><a href="{{route('register')}}"><i class="fa fa-user-o"></i> Register</a></li>
    @endauth
    @endif
    
  </ul>
</div>
</div>
<!-- /TOP HEADER -->

<!-- MAIN HEADER -->
<div id="header">
<!-- container -->
<div class="container">
  <!-- row -->
  <div class="row">
    <!-- LOGO -->
    <div class="col-md-3">
      <div class="header-logo">
        <a href="#" class="logo">
          <img src="home/img/logo.png" alt="">
        </a>
      </div>
    </div>
    <!-- /LOGO -->

    <!-- SEARCH BAR -->
    <div class="col-md-6">
      <div class="header-search">
        <form>
          <select class="input-select">
            <option value="0">All Categories</option>
            <option value="1">Category 01</option>
            <option value="1">Category 02</option>
          </select>
          <input class="input" placeholder="Search here">
          <button class="search-btn">Search</button>
        </form>
      </div>
    </div>
    <!-- /SEARCH BAR -->

    <!-- ACCOUNT -->
    <div class="col-md-3 clearfix">
      <div class="header-ctn">
        <!-- Wishlist -->
        <div>
          <a href="#">
            <i class="fa fa-heart-o"></i>
            <span>Your Wishlist</span>
            <div class="qty">{{ count((array) session('cart')) }}</div>
          </a>
        </div>
        <!-- /Wishlist -->

        <!-- Cart -->
        <div class="dropdown">
          @php $total = 0 @endphp
          @foreach((array) session('cart') as $id => $details)
              @php $total += $details['price'] * $details['quantity'] @endphp
          @endforeach
          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-shopping-cart"></i>
            <span>Your Cart</span>
            <div class="qty">{{ count((array) session('cart')) }}</div>
          </a>
          @if(session('cart'))
          @foreach(session('cart') as $id => $details)
          <div class="cart-dropdown">
            <div class="cart-list">
              <div class="product-widget">
                <div class="product-img">
                  <img src="/image/{{ $details['image'] }}"width="100" height="100" class="img-responsive" alt="">
                </div>
                <div class="product-body">
                  <h3 class="product-name"><a href="#">{{ $details['name'] }}</a></h3>
                  <h4 class="product-price"><span class="qty">{{ $details['quantity'] }}x</span> ${{ $details['price'] }}</h4>
                </div>
                <button class="delete"><i class="fa fa-close"></i></button>
              </div>
              <div class="cart-summary">
              <small>{{ $details['quantity'] }} Item(s) selected</small>
              <h5>SUBTOTAL:${{ $total }}</h5>
            </div>
            <div class="cart-btns">
              <a href="{{ route('cart') }}">View Cart</a>
              <a href="{{ url('/checkout') }}">Checkout<i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>
            </div>
            @endforeach
            @endif
            </div>
            
        <!-- /Cart -->

        <!-- Menu Toogle -->
        <div class="menu-toggle">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Menu</span>
          </a>
        </div>
        <!-- /Menu Toogle -->
      </div>
    </div>
    <!-- /ACCOUNT -->
  </div>
  <!-- row -->
</div>
<!-- container -->
</div>
<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->