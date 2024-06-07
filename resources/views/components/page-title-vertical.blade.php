@if ($btnBack == 'true')
<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last mb-3">
          <h3>
            <a href="@isset($redirect) {{ $redirect }} @else {{  url()->previous() }} @endisset" class="float-xs-start">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left text-primary" viewBox="0 0 16 16" style="margin-right: 8px">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg>
            </a>
            {{ $title ?? '' }}
          </h3>
      </div>
  </div>
</div>

@else

<div class="page-title">
  <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last mb-3">
          <h3>{{ $title ?? 'Data' }}</h3>
      </div>
  </div>
</div>

@endif
