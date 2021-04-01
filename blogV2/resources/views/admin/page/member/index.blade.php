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
            <li class="breadcrumb-item active">List Member</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Member</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
              @php 
                $i = 1;
              @endphp
              @foreach($data as $key => $value)
                <tr>
                  <th scope="row">{{ $i++ }}</th>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->email }}</td>
                  <td style="text-align: center;">
                    <span class="badge bg-primary">
                      <a href="{{ URL('admin/member/edit/' . $value->id) }}">
                        <ion-icon name="create-outline"></ion-icon>
                      </a>
                    </span>

                  </td>
                  <td style="text-align: center;">
                    <span class="badge bg-danger">
                      <a href="">
                        <ion-icon name="trash-outline"></ion-icon>
                      </a>
                    </span>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
</div>


@endsection