<div id="header">
  <div class="header-top">
    <div class="container">
      <div class="pull-left auto-width-left">
        <ul class="top-menu menu-beta l-inline">
          <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
          <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
        </ul>
      </div>
      <div class="pull-right auto-width-right">
      <ul class="top-details menu-beta l-inline">
        @if(Auth::check())
            <li><a href="#"><i class="fa fa-user"></i>{{ Auth::user()->full_name }}</a></li>
            <li><a href="{{route('client.logout')}}">Logout</a></li>
        @else
          <li><a href="#"><i class="fa fa-user"></i>Account</a></li>
          <li><a href="{{route('client.signup')}}">Sign up</a></li>
          <li><a href="{{route('client.signin')}}">Sign in</a>
        @endif
      </ul>
      </div>
      <div class="clearfix"></div>
    </div> <!-- .container -->
  </div> <!-- .header-top -->
  <div class="header-body">
    <div class="container beta-relative">
      <div class="pull-left">
        <a href="index.html" id="logo"><img src="assets/client/dest/images/logo-cake.png" width="200px" alt=""></a>
      </div>
      <div class="pull-right beta-components space-left ov">
        <div class="space10">&nbsp;</div>
        <div class="beta-comp">
          <form role="search" method="get" id="searchform" action="{{route('client.search_product')}}">
            <input type="text" value="" name="key" placeholder="Enter keyword..." />
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
          </form>
        </div>

        <div class="beta-comp">
          <div class="cart">
            @php
            $carts = [];
            if(Session::has('cart')) {
            $carts = Session::get('cart');
            }
            $total = 0;
            @endphp
            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart ( <span class="amount">{{ !empty($carts) ? count($carts) : "0"}}</span> ) <i class="fa fa-chevron-down"></i>
            </div>
            <div class="beta-dropdown cart-body">
              @foreach($carts as $cart)
              @php
              $id = $cart['id'];
              $name = $cart['name'];
              $image = $cart['image'];
              $unit_price = $cart['unit_price'];
              $promotion_price = $cart['promotion_price'];

              $price = $cart['promotion_price'] == 0 ? $cart['unit_price'] : $cart['promotion_price'];
              $total += $cart['qty'] * $price;
              @endphp
              <div class="cart-item">
                <a class="cart-item-delete" href="#" onclick="deleteCart('{{$id}}')"><i class="fa fa-times"></i></a>
                <div class="media">
                  <a class="pull-left" href="#"><img src="assets/client/image/product/{{ $cart['image'] }}" alt=""></a>
                  <div class="media-body">
                    <span class="cart-item-title">{{ $cart['name'] }}</span>
                    <span class="cart-item-amount">
                      <input class="form-control" type="number" data-id="{{$id}}" data-name="{{$name}}" data-img="{{$image}}" data-unit-price="{{$unit_price}}" data-promotion-price="{{$promotion_price}}"  data-price="{{$price}}" id="quantity-ip" name="quantity" min="1" max="20" value="{{ $cart['qty'] }}">
                    </span>
                    <span class="cart-item-price">Price: {{ number_format($price) }} <small>VND</small></span>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="cart-caption">
                <div class="cart-total text-right">Total: <span class="cart-total-value">{{ number_format($total) }} <small>VND</small></span></div>
                <div class="clearfix"></div>

                <div class="center">
                  <div class="space10">&nbsp;</div>
                  <a href="{{ route('client.order') }}" class="beta-btn primary text-center">Order <i class="fa fa-chevron-right"></i></a>
                </div>
              </div>
            </div>
          </div> <!-- .cart -->
        </div>
      </div>
      <div class="clearfix"></div>
    </div> <!-- .container -->
  </div> <!-- .header-body -->
  <div class="header-bottom" style="background-color: #0277b8;">
    <div class="container">
      <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
      <div class="visible-xs clearfix"></div>
      <nav class="main-menu">
        <ul class="l-inline ov">
          <li><a href="{{ route('client.home') }}">Home</a></li>
          <li><a href="#">Product</a>
            <ul class="sub-menu">
              @foreach($product_type as $type)
              <li><a href="{{ route('client.product_type',$type->id) }}">{{$type->name}}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{route('client.about')}}">About</a></li>
          <li><a href="{{route('client.contact')}}">Contact</a></li>
        </ul>
        <div class="clearfix"></div>
      </nav>
    </div> <!-- .container -->
  </div> <!-- .header-bottom -->
</div>