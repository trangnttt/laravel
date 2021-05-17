@extends('client.layouts.app')

@section('content')

<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Purchase</h6>
    </div>
    @include('client.partial.breadcrumb')
    <div class="clearfix"></div>
  </div>
</div>

<div class="container">
  <div id="content">
    <div class="your-order">
      <div class="your-order-head">
        <h5>Your order</h5>
      </div>
      <div class="your-order-body" style="padding: 0px 10px">
        <div class="your-order-item">
          @php
          $carts = [];
          if(Session::has('cart')) {
          $carts = Session::get('cart');
          }
          $total = 0;
          @endphp
          <div>
            @foreach($carts as $cart)
            @php
            $price = $cart['promotion_price'] == 0 ? $cart['unit_price'] : $cart['promotion_price'];
            $total += $cart['qty'] * $price;
            @endphp
            <!--  one item	 -->
            <div class="media">
              <img width="25%" src="assets/client/image/product/{{ $cart['image'] }}" alt="" class="pull-left">
              <div class="media-body">
                <p class="font-large">{{ $cart['name'] }}</p>
                @if($cart['promotion_price'] == 0)
                <span class="color-gray your-order-info">
                  Price: {{ number_format($cart['unit_price']) }} <small>VND</small>
                </span>
                @else
                <span class="color-gray your-order-info">Price:
                  <span class="flash-del"> {{ number_format($cart['unit_price']) }} <small>VND</small></span>
                  {{ number_format($cart['promotion_price']) }} <small>VND</small>
                </span>
                @endif

                <span class="color-gray your-order-info">Qty: {{ $cart['qty'] }}</span>
              </div>
            </div>
            <!-- end one item -->
            @endforeach
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="your-order-item">
          <div class="pull-left">
            <p class="your-order-f18">Total:</p>
          </div>
          <div class="pull-right">
            <h5 class="color-black">{{ number_format($total) }} <small>VND</small></h5>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      </div>
    </div> <!-- .your-order -->
  </div> <!-- #content -->
</div> <!-- .container -->

@endsection