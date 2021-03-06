@extends('client.layouts.app')

@section('content')
<div class="rev-slider">
  <div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
      <div class="bannercontainer">
        <div class="banner">
          <ul>
            <!-- THE FIRST SLIDE -->
            @foreach($slide as $sl)
            <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
              <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="assets/client/image/slide/{{$sl->image}}" data-src="assets/client/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('assets/client/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                </div>
              </div>

            </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="tp-bannertimer"></div>
    </div>
  </div>
  <!--slider-->
</div>
<div class="container">
  <div id="content" class="space-top-none">
    <div class="main-content">
      <div class="space60">&nbsp;</div>
      <div class="row">
        <div class="col-sm-12">
          <div class="beta-products-list">
            <h4>New Products</h4>
            <div class="beta-products-details">
              <p class="pull-left">{{count($new_product)}} new product found</p>
              <div class="clearfix"></div>
            </div>

            <div class="row">
              @foreach($new_product as $new)
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
            <div class="row">
              {!! $new_product->links('pagination::bootstrap-4') !!}
            </div>
          </div> <!-- .beta-products-list -->

          <div class="space50">&nbsp;</div>

          <div class="beta-products-list">
            <h4>Top Products</h4>
            <div class="beta-products-details">
              <p class="pull-left">{{count($top_product)}} styles found</p>
              <div class="clearfix"></div>
            </div>
            <div class="row">
              @foreach($top_product as $top)
              @php
              $price = ($top->promotion_price == 0) ? $top->unit_price : $top->promotion_price
              @endphp
              <div class="col-sm-3">
                <div class="single-item">
                  @if($top->promotion_price)
                  <div class="ribbon-wrapper">
                    <div class="ribbon sale">Sale</div>
                  </div>
                  @endif

                  <div class="single-item-header">
                    <a href="{{ route('client.product_detail',$top->id) }}"><img src="assets/client/image/product/{{$top->image}}" alt="" width="250px" height="200px"></a>
                  </div>
                  <div class="single-item-body">
                    <p class="single-item-title">{{$top->name}}</p>
                    <p class="single-item-price">
                      @if($top->promotion_price == 0)
                      <span class="flash-sale">{{number_format($top->unit_price)}} <small>VND</small></span>
                      @else
                      <span class="flash-del">{{number_format($top->unit_price)}} <small>VND</small></span>
                      <span class="flash-sale">{{number_format($top->promotion_price)}} <small>VND</small></span>
                      @endif
                    </p>
                  </div>
                  <div class="single-item-caption">
                    <a class="add-to-cart pull-left" href="#" onclick="setCart('{{$top->id}}','{{$top->name}}','{{$top->image}}','{{$top->unit_price}}','{{$top->promotion_price}}','{{$price}}')"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="{{ route('client.product_detail',$top->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row">
              {!! $top_product->links('pagination::bootstrap-4') !!}
            </div>
          </div> <!-- .beta-products-list -->
        </div>
      </div> <!-- end section with sidebar and main content -->


    </div> <!-- .main-content -->
  </div> <!-- #content -->
</div> <!-- .container -->

@endsection