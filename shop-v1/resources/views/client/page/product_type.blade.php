@extends('client.layouts.app')

@section('content')

<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title">Product: <strong>{{$type_item->name}}</strong></h6>
    </div>
    <div class="pull-right">
      <div class="beta-breadcrumb font-large">
        <a href="{{ route('client.home') }}">Home</a> / <span>Product type</span>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-3">
          <ul class="aside-menu">
          @foreach($types as $type_name)
            <li><a href="{{ route('client.product_type',$type_name->id) }}">{{$type_name->name}}</a></li>
          @endforeach
          </ul>
        </div>
        <div class="col-sm-9">
          <div class="beta-products-list">
            <h4>New Products</h4>
            <div class="beta-products-details">
              <p class="pull-left">{{count($product_type)}} styles found</p>
              <div class="clearfix"></div>
            </div>

            <div class="row">
              @foreach($product_type as $product)
              <div class="col-sm-4">
                <div class="single-item">
                  @if($product->promotion_price)
                  <div class="ribbon-wrapper">
                    <div class="ribbon sale">Sale</div>
                  </div>
                  @endif
                  <div class="single-item-header">
                    <a href="{{ route('client.product_detail',$product->id) }}"><img src="assets/client/image/product/{{$product->image}}" alt="" height="250px"></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$product->name}}</p>
                    <p class="single-item-price">
                      @if($product->promotion_price == 0)
                      <span class="flash-sale">{{number_format($product->unit_price)}} <small>VND</small></span>
                      @else
                      <span class="flash-del">{{number_format($product->unit_price)}} <small>VND</small></span>
                      <span class="flash-sale">{{number_format($product->promotion_price)}} <small>VND</small></span>
                      @endif
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="{{ route('client.product_detail',$product->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div> <!-- .beta-products-list -->

          <div class="space50">&nbsp;</div>

          <div class="beta-products-list">
            <h4>Top Products</h4>
            <div class="beta-products-details">
              <p class="pull-left">{{count($product_other)}} styles found</p>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              @foreach($product_other as $other)
              <div class="col-sm-4">
                <div class="single-item">
                  @if($other->promotion_price)
                  <div class="ribbon-wrapper">
                    <div class="ribbon sale">Sale</div>
                  </div>
                  @endif
                  <div class="single-item-header">
                    <a href="{{ route('client.product_detail',$other->id) }}"><img src="assets/client/image/product/{{$other->image}}" alt="" height="250px"></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$other->name}}</p>
                    <p class="single-item-price">
                      @if($other->promotion_price == 0)
                      <span class="flash-sale">{{number_format($other->unit_price)}} <small>VND</small></span>
                      @else
                      <span class="flash-del">{{number_format($other->unit_price)}} <small>VND</small></span>
                      <span class="flash-sale">{{number_format($other->promotion_price)}} <small>VND</small></span>
                      @endif
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="{{ route('client.product_detail',$other->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            
            <div class="row">
            {!! $product_other->links('pagination::bootstrap-4') !!}
            </div>

          </div> <!-- .beta-products-list -->
        </div>
      </div> <!-- end section with sidebar and main content -->


    </div> <!-- .main-content -->
  </div> <!-- #content -->
</div> <!-- .container -->

@endsection