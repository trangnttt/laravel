@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">

    @if (Session::has('message'))
    @component('components.alert')
    @slot('class')
    success
    @endslot
    @slot('title')
    {{ Session::get('message') }}
    @endslot
    @endcomponent
    @endif

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        {{ $category->name }}

                                        <div class="button-group d-flex">
                                            <a class="btn btn-primary text-white btn-sm mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteCategoryModal">
                                                Delete
                                            </a>
                                        </div>
                                    </div>

                                    @if ($category->children)
                                    <ul class="list-group mt-2">
                                        @foreach ($category->children as $child)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                {{ $child->name }}

                                                <div class="button-group d-flex">
                                                    <a class="btn btn-info text-white btn-sm mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}">
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="#">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        @include('admin.page.category.edit')
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
</div>
</section>
</div>


@endsection