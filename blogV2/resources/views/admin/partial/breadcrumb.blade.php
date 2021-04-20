<ol class="breadcrumb float-sm-right">
  @php
  $crumbs = array_filter(explode("/",$_SERVER["REQUEST_URI"]), function($a) {return $a !== "";});
  @endphp

  @foreach($crumbs as $crumb)
  @if($crumb == 'admin')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  @else
  <li class="breadcrumb-item active">{{$crumb}}</li>
  @endif
  @endforeach
</ol>