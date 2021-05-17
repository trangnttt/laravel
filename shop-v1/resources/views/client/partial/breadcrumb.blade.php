
@php
$crumbs = array_filter(explode("/",$_SERVER["REQUEST_URI"]), function($a) {return $a !== "";});
@endphp

<div class="pull-right">
  <div class="beta-breadcrumb">
    @foreach($crumbs as $crumb)
    <a href="{{ route('client.home') }}">Home</a> / <span class="sub_breadcrumb">{{$crumb}}</span>
    @endforeach
  </div>
</div>