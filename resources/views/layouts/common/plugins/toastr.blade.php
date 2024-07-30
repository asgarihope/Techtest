<script type="module">
	$(document).ready(function () {
		toastr.options.escapeHtml = true;
		toastr.options.closeButton = true;
		// toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
		toastr.options.closeMethod = 'fadeOut';
		toastr.options.closeDuration = 300;
		toastr.options.closeEasing = 'swing';
		toastr.options.rtl = false;
		toastr.options.progressBar = true;
		toastr.options.newestOnTop = false;
        @if ($errors->any())

            @foreach ($errors->all() as $error)
            toastr['error']('{{$error}}');
            @endforeach

        @endif

		@foreach (['error', 'warning', 'success', 'info'] as $msg)
            @if(\Illuminate\Support\Facades\Session::has($msg))
            toastr['{{$msg}}']('{{Session::get($msg)}}');
            @endif
		@endforeach
			toastr.options = {}
	});
</script>
