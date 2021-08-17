@if (session('flash_message'))

<div class="flash-msg-popup is-dismissed p-lg-1">
  <div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-success text-white">
      <strong class="me-auto">Cool!</strong>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      {{ session('flash_message') }}
    </div>
  </div>
</div>
@endif
