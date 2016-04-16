@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal', 
            'title'      => session('flash_notification.title'), 
            'body'       => session('flash_notification.message')
        ])
    @else
	<script>
		$.Notify({
			content: "{!! session('flash_notification.message') !!}",
			type: "{!! session('flash_notification.level') !!}"
		});
	</script>
    @endif
@endif

