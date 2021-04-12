@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Posst</li>
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
                    <form method="POST" action="{{ route('admin.post.add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter Title">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id === old('category_id') ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                    @if ($category->children)
                                    @foreach ($category->children as $child)
                                    <option value="{{ $child->id }}"
                                        {{ $child->id === old('category_id') ? 'selected' : '' }}>
                                        &nbsp;&nbsp;{{ $child->name }}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                placeholder="Enter Slug">
                            @error('slug')
                            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4"
                                placeholder="Enter Description..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" class="textarea" placeholder="Place some text here"
                            class="editor"></textarea>
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
