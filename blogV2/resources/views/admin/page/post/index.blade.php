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
                    <h1>Post List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post list</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">View</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">UserName</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>
                                                @if(isset($post->image))
                                                <img style="width:100px"
                                                    src="{{ URL::to('/') }}/images/{{ $post->image }}" />
                                                @else
                                                <span>No image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.post.edit', [$post->slug]) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </td>
                                            <td>1</td>
                                            <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>
                                                {{date('d-m-Y', strtotime($post->created_at))}} <br>
                                                <em>({{ $post->created_at->diffForHumans() }})</em>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('admin.post.edit', [$post->slug]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                                    data-target="#modal-default">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade show" id="modal-default" style="padding-right: 17px;"
                                            aria-modal="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background: #f1c4c4; color: #ad2e2e;">
                                                        <h4 class="modal-title">DETELE</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-center" style="color: #ad2e2e;">Are you sure to
                                                            delete member
                                                            "<strong>aa</strong>" </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <div style="margin:auto">
                                                            <a href="#" class="btn btn-success"
                                                                data-dismiss="modal">Cancel</a>
                                                            <a href="#" class="btn btn-primary btn-danger">Yes,
                                                                delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- {{-- Pagination --}} -->
                                <div class="d-flex justify-content-center">
                                    {!! $posts->links('pagination::bootstrap-4') !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

@endsection