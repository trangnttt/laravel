@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Posst</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General Elements</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}"
                                        placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id === $post->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                    @if ($category->children)
                                    @foreach ($category->children as $child)
                                    <option value="{{ $child->id }}"
                                        {{ $child->id === $post->category_id ? 'selected' : '' }}>
                                        &nbsp;&nbsp;{{ $child->name }}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $post->slug }}"
                                placeholder="Enter Slug">
                            @error('slug')
                            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="{{$post->description}}"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" class="textarea" placeholder="Enter content"
                                style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="msg"></div>
                                <input type="file" name="image" class="file" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="text" name="filename" class="form-control" disabled
                                        placeholder="Choose file..." id="file">
                                    <div class="input-group-append">
                                        <button type="button" class="browse btn btn-default">Upload image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <img src="//placehold.it/140?text=IMAGE" id="preview" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script>
$('input[name="title"]').change(function() {
    var text = $(this).val();
    text = text.replace(" ", "-");
    text = text.toLowerCase()
    $('input[name="slug"]').val(text);

});
$(document).ready(function(){
    $(".note-editable").text("{!! nl2br(e($post->content)) !!}");
    alert("ready!");
});
</script>
@endpush