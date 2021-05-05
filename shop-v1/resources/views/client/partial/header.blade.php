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
          <li><a href="#"><i class="fa fa-user"></i>Account</a></li>
          <li><a href="#">Sign up</a></li>
          <li><a href="#">Sign in</a></li>
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
          <form role="search" method="get" id="searchform" action="/">
            <input type="text" value="" name="s" id="s" placeholder="Enter keyword..." />
            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
          </form>
        </div>

        <div class="beta-comp">
          <div class="cart">
            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart (Empty) <i
                class="fa fa-chevron-down"></i></div>
            <div class="beta-dropdown cart-body">
              <div class="cart-item">
                <div class="media">
                  <a class="pull-left" href="#"><img src="assets/client/dest/images/products/cart/1.png" alt=""></a>
                  <div class="media-body">
                    <span class="cart-item-title">Sample Woman Top</span>
                    <span class="cart-item-options">Size: XS; Colar: Navy</span>
                    <span class="cart-item-amount">1*<span>$49.50</span></span>
                  </div>
                </div>
              </div>

              <div class="cart-item">
                <div class="media">
                  <a class="pull-left" href="#"><img src="assets/client/dest/images/products/cart/2.png" alt=""></a>
                  <div class="media-body">
                    <span class="cart-item-title">Sample Woman Top</span>
                    <span class="cart-item-options">Size: XS; Colar: Navy</span>
                    <span class="cart-item-amount">1*<span>$49.50</span></span>
                  </div>
                </div>
              </div>

              <div class="cart-item">
                <div class="media">
                  <a class="pull-left" href="#"><img src="assets/client/dest/images/products/cart/3.png" alt=""></a>
                  <div class="media-body">
                    <span class="cart-item-title">Sample Woman Top</span>
                    <span class="cart-item-options">Size: XS; Colar: Navy</span>
                    <span class="cart-item-amount">1*<span>$49.50</span></span>
                  </div>
                </div>
              </div>

              <div class="cart-caption">
                <div class="cart-total text-right">Total: <span class="cart-total-value">$34.55</span></div>
                <div class="clearfix"></div>

                <div class="center">
                  <div class="space10">&nbsp;</div>
                  <a href="checkout.html" class="beta-btn primary text-center">Order <i
                      class="fa fa-chevron-right"></i></a>
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
      <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i
          class="fa fa-bars"></i></a>
      <div class="visible-xs clearfix"></div>
      <nav class="main-menu">
        <ul class="l-inline ov">
          <li><a href="{{ route('client.home') }}">Home</a></li>
          <li><a href="#">Product</a>
            <ul class="sub-menu">
              <li><a href="{{ route('client.product_type') }}">Product 1</a></li>
              <li><a href="product_type.html">Product 2</a></li>
              <li><a href="product_type.html">Product 4</a></li>
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