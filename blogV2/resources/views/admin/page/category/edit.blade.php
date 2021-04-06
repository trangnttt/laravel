@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.category.edit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select a Category</option>

                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id === $post->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection