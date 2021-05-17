@extends('client.layouts.app')

@section('content')

<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Order</h6>
    </div>
    @include('client.partial.breadcrumb')
    <div class="clearfix"></div>
  </div>
</div>

<div class="container">
  <div id="content">
    <form action="{{ route('client.order') }}" method="post" class="beta-form-checkout">
      @csrf
      @if (Session::has('message'))
      @component('components.alert')
      @slot('class')
      {{ Session::get('class') }}
      @endslot
      @slot('title')
      {{ Session::get('flag') }}
      @endslot
      @slot('message')
      {{ Session::get('message') }}
      @endslot
      @endcomponent
      @endif
      <div class="row">
        <div class="col-sm-6">
          <h4>Order</h4>
          <div class="space20">&nbsp;</div>

          <div class="form-block">
            <label for="name">Full name*</label>
            <input type="text" name="name" value="{{ Auth::user()->full_name }}" required>
          </div>
          <div class="form-block">
            <label>Gender </label>
            <input id="gender" type="radio" class="input-radio" name="gender" value="male" checked="checked" style="width: 10%"><span style="margin-right: 10%">male</span>
            <input id="gender" type="radio" class="input-radio" name="gender" value="female" style="width: 10%"><span>female</span>

          </div>

          <div class="form-block">
            <label for="email">Email*</label>
            <input type="email" name="email" required value="{{ Auth::user()->email }}">
          </div>

          <div class="form-block">
            <label for="adress">Address*</label>
            <input type="text" name="address" value="{{ Auth::user()->address }}" required>
          </div>


          <div class="form-block">
            <label for="phone">Tel*</label>
            <input type="text" name="phone_number" required value="{{ Auth::user()->phone }}">
          </div>

          <div class="form-block">
            <label for="notes">Note</label>
            <textarea name="note"></textarea>
          </div>
        </div>
        <div class="col-sm-6">
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
            <div class="your-order-head">
              <h5>Payment form</h5>
            </div>

            <div class="your-order-body">
              <ul class="payment_methods methods">
                <li class="payment_method_bacs">
                  <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                  <label for="payment_method_bacs">Payment on delivery </label>
                  <div class="payment_box payment_method_bacs" style="display: block;">
                    The store will send the goods to your address, you check the goods and pay the delivery staff
                  </div>
                </li>

                <li class="payment_method_cheque">
                  <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
                  <label for="payment_method_cheque">Transfer </label>
                  <div class="payment_box payment_method_cheque" style="display: none;">
                    Transfer money to the following account:
                    <br>- Account number: 123 456 789
                    <br>- Account holder: Nguyễn A
                    <br>- ACB Bank, HCMC Branch
                  </div>
                </li>

              </ul>
            </div>

            <div class="text-center"><button type="submit" class="beta-btn primary">Order <i class="fa fa-chevron-right"></i></button>
            </div>
          </div> <!-- .your-order -->
        </div>
      </div>
    </form>
  </div> <!-- #content -->
</div> <!-- .container -->

@endsection