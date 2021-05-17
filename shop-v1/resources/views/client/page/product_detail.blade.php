@extends('client.layouts.app')

@section('content')
<div class="inner-header">
  <div class="container">
    <div class="pull-left">
      <h6 class="inner-title"><strong>{{$product->name}}</strong></h6>
    </div>
    @include('client.partial.breadcrumb')
    <div class="clearfix"></div>
  </div>
</div>

<div class="container">
  <div id="content">
    <div class="row">
      <div class="col-sm-9">

        <div class="row">
          <div class="col-sm-4">
            <img src="assets/client/image/product/{{$product->image}}" alt="">
          </div>
          <div class="col-sm-8">
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

            <div class="clearfix"></div>
            <div class="space20">&nbsp;</div>

            <div class="single-item-desc">
              <p>{{$product->description}}</p>
            </div>
            <div class="space20">&nbsp;</div>

            <p>Options:</p>
            <div class="single-item-options">
              <select class="wc-select" name="color">
                <option>Qty</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>

        <div class="space40">&nbsp;</div>
        <div class="woocommerce-tabs">
          <ul class="tabs">
            <li><a href="#tab-description">Description</a></li>
            <li><a href="#tab-reviews">Reviews (0)</a></li>
          </ul>

          <div class="panel" id="tab-description">
            <p>{{$product->description}}</p>
          </div>
          <div class="panel" id="tab-reviews">
            <p>No Reviews</p>
          </div>
        </div>
        <div class="space50">&nbsp;</div>
        <div class="beta-products-list">
          <h4>Related Products</h4>

          <div class="row">
            @foreach($same_product as $same)
            <div class="col-sm-4">
              <div class="single-item">
                @if($same->promotion_price)
                <div class="ribbon-wrapper">
                  <div class="ribbon sale">Sale</div>
                </div>
                @endif
                <div class="single-item-header">
                  <a href="{{ route('client.product_detail',$same->id) }}"><img src="assets/client/image/product/{{$same->image}}" alt="" height="250px"></a>
                </div>
                <div class="single-item-body">
                  <p class="single-item-title">{{$same->name}}</p>
                  <p class="single-item-price">
                    @if($same->promotion_price == 0)
                    <span class="flash-sale">{{number_format($same->unit_price)}} <small>VND</small></span>
                    @else
                    <span class="flash-del">{{number_format($same->unit_price)}} <small>VND</small></span>
                    <span class="flash-sale">{{number_format($same->promotion_price)}} <small>VND</small></span>
                    @endif
                  </p>
                </div>
                <div class="single-item-caption">
                  <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                  <a class="beta-btn primary" href="{{ route('client.product_detail',$same->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row">
            {!! $same_product->links('pagination::bootstrap-4') !!}
            </div>
        </div> <!-- .beta-products-list -->
      </div>
      <div class="col-sm-3 aside">
        <div class="widget">
          <h3 class="widget-title">Best Sellers</h3>
          <div class="widget-body">
            <div class="beta-sales beta-lists">
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/1.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/2.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/3.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/4.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- best sellers widget -->
        <div class="widget">
          <h3 class="widget-title">New Products</h3>
          <div class="widget-body">
            <div class="beta-sales beta-lists">
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/1.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/2.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/3.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
              <div class="media beta-sales-item">
                <a class="pull-left" href="product.html"><img src="assets/client/dest/images/products/sales/4.png" alt=""></a>
                <div class="media-body">
                  Sample Woman Top
                  <span class="beta-sales-price">$34.55</span>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- best sellers widget -->
      </div>
    </div>
  </div> <!-- #content -->
</div> <!-- .container -->
@endsection