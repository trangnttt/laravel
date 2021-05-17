@extends('client.layouts.app')

@section('content')

<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-12">
          <div class="beta-products-list">
            <h4>Search</h4>
            <div class="beta-products-details">
              <p class="pull-left">{{count($product)}} product found</p>
              <div class="clearfix"></div>
            </div>

            <div class="row">
              @foreach($product as $new)
              @php
              $price = ($new->promotion_price == 0) ? $new->unit_price : $new->promotion_price
              @endphp
              <div class="col-sm-3">
                <div class="single-item">
                  @if($new->promotion_price)
                  <div class="ribbon-wrapper">
                    <div class="ribbon sale">Sale</div>
                  </div>
                  @endif
                  <div class="single-item-header">
                    <a href="{{ route('client.product_detail',$new->id) }}"><img src="assets/client/image/product/{{$new->image}}" alt="" height="250px"></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$new->name}}</p>
                    <p class="single-item-price">
                      @if($new->promotion_price == 0)
                      <span class="flash-sale">{{number_format($new->unit_price)}} <small>VND</small></span>
                      @else
                      <span class="flash-del">{{number_format($new->unit_price)}} <small>VND</small></span>
                      <span class="flash-sale">{{number_format($new->promotion_price)}} <small>VND</small></span>
                      @endif
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="#" onclick="setCart('{{$new->id}}','{{$new->name}}','{{$new->image}}','{{$new->unit_price}}','{{$new->promotion_price}}','{{$price}}')"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="{{ route('client.product_detail',$new->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div> <!-- .beta-products-list -->

          <div class="space50">&nbsp;</div>
        </div>
      </div> <!-- end section with sidebar and main content -->


    </div> <!-- .main-content -->
  </div> <!-- #content -->
</div>

@endsection