@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1244.06px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Detail</h1>
        </div>
        <div class="col-sm-6">
          @include('admin.partial.breadcrumb')
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Product: <strong>{{ $products->name }}</strong></h3>
        </div>
        <form method="POST" action="{{ URL('admin/product/edit/' . $products->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="">Name</label>
              <input type="name" class="form-control" name="name" value="{{ $products->name }}">
            </div>
            <div class="form-group">
              <label for="">Product Type</label>
              <select name="id_type" class="form-control select2">
                @foreach ($product_type as $type)
                <option value="{{ $type->id }}" {{ $type->id === $products->id_type ? 'selected' : '' }}>
                  {{ $type->name }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" rows="4" placeholder="Enter description">{{$products->description}}</textarea>
            </div>
            <div class="form-group">
              <label>Unit Price</label>
              <input type="text" class="form-control money" name="unit_price" value="{{ $products->unit_price }}">
            </div>
            <div class="form-group">
              <label>Promotion Price</label>
              <input type="text" class="form-control money" name="promotion_price" value="{{ $products->promotion_price }}">
            </div>
            <div class="form-group">
              <label>Unit </label> <br>
              <input type="radio" class="input-radio" name="unit" value="cake" {{ ($products->unit == "cake") ? "checked" : "" }} style="width: 2%"><span style="margin-right: 2%">Cake</span>
              <input type="radio" class="input-radio" name="unit" value="box" {{ ($products->unit == "box") ? "checked" : "" }} style="width: 2%"><span>Box</span>
            </div>
            <div class="checkbox">
              <label style="margin-right: 2%"> New Product</label>
              <input name="new" type="checkbox" {{ ($products->new == 1) ? "checked" : "" }}>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div id="msg"></div>
                <input type="file" name="image" class="file" accept="image/*">
                <div class="input-group my-3">
                  <input type="text" name="filename" class="form-control" disabled placeholder="Choose file..." id="file">
                  <div class="input-group-append">
                    <button type="button" class="browse btn btn-default">Upload image</button>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                @if(isset($products->image))
                <img src="assets/client/image/product/{{ $products->image }}" id="preview" class="img-thumbnail" width="250px" />
                @else
                <img src="//placehold.it/140?text=IMAGE" id="preview" class="img-thumbnail">
                @endif
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
  </section>
</div>

@endsection