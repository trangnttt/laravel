@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1244.06px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-sm-6">
          <h1>Create Slide</h1>
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Slide</strong></h3>
        </div>
        <form method="POST" action="{{ route('admin.slide.add') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div id="msg"></div>
                <input type="file" name="image" class="file @error('image') is-invalid @enderror" accept="image/*">
                @error('image')
                <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                @enderror
                <div class="input-group my-3">
                  <input type="text" name="filename" class="form-control" disabled placeholder="Choose file..."
                    id="file">
                  <div class="input-group-append">
                    <button type="button" class="browse btn btn-default">Upload image</button>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <img src="//placehold.it/140?text=IMAGE" id="preview" class="img-thumbnail">
              </div>
            </div>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </section>
</div>

@endsection