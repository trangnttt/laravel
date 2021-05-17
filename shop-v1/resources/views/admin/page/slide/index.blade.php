@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">

  @if (Session::has('message'))
  @component('components.alert')
  @slot('class')
  {{ Session::get('class') }}
  @endslot
  @slot('title')
  {{ Session::get('flag') }}
  @endslot
  @slot('message')
  {{ Session::get('message') }}
  @endslot
  @endcomponent
  @endif


  <div class="col-12 mt-3">
    <div class="card card-primary">
      <div class="card-header">
        <h4 class="card-title">Slides</h4>
      </div>
      <div class="card-body">
        <div class="row">
          @foreach($slides as $slide)
          <div class="col-sm-2">
            <a href="#" data-toggle="modal" data-target="#deleteSlideModal{{ $slide->id }}" data-id="{{ $slide->id }}">
              <img src="assets/client/image/slide/{{ $slide->image }}" class="mb-2" alt="white sample" height="200px" width="100%" />
            </a>

            <div class="modal fade show" id="deleteSlideModal{{ $slide->id }}" style="padding-right: 17px;" aria-modal="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background: #f1c4c4; color: #ad2e2e;">
                    <h4 class="modal-title">DETELE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center" style="color: #ad2e2e;">Are you sure to delete slide
                    </p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <div style="margin:auto">
                      <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
                      <a href="{{ URL('admin/slide/delete/' . $slide->id) }}" id="delete" class="btn btn-primary btn-danger">Yes,
                        delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection