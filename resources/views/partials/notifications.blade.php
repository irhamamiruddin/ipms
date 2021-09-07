@if(isset($notifications))
<li class="nav-item dropdown">
  <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
    <i class="icon-bell mx-0"></i>
    <span class="count"></span>
  </a>
  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
    <a class="dropdown-item">
      <p id="noti-count" class="mb-0 font-weight-normal float-left">You have {{ count($notifications) }} new notifications</p>
      <span id="mark-all" class="badge badge-pill badge-warning float-right">Mark as read</span>
    </a>
      @forelse($notifications as $notification)
      <div class="dropdown-divider"></div>
      <a class="dropdown-item preview-item notification-dropdown">
        <div class="preview-thumbnail">
        </div>
        <div class="preview-item-content">
          <h6 class="preview-subject font-weight-medium">{{ $notification->data['module'] }}</h6>
          <p class="font-weight-light small-text">
            {{ $notification->data['name'] }} expiring on {{ $notification->data['date'] }}
          </p>
        </div>
      </a>
      @empty
      @endforelse
  </div>
</li>
@endif

@push('js')
<script>
  function sendMarkRequest(id = null) {
      return $.ajax("{{ route('mark_as_read') }}", {
          method: 'POST',
          data: {
              _token: '{{csrf_token()}}',
              id
          }
      });
  }
  $(function() {
    $('#mark-all').click(function() {
        let request = sendMarkRequest();
        request.done(() => {
            $('.notification-dropdown').remove();
            $('#noti-count').text("You have 0 new notifications");
        })
    });
  });
  </script>
@endpush