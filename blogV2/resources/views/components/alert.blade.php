
<!-- <div class="alert alert-{{ $class }}" id="success-alert">{{ $title }}</div> -->

<div aria-live="polite" aria-atomic="true" style="position: relative; z-index:1;">
  <div class="toast fade show bg-{{ $class }}" style="position: absolute; top: 0; right: 0; width:100%">
    <div class="toast-header">
      <strong class="mr-auto">Success</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{ $title }}
    </div>
  </div>
</div>