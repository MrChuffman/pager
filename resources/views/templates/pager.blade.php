<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Hello World!</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metro/3.0.14/css/metro.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metro/3.0.14/css/metro-icons.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metro/3.0.14/css/metro-responsive.min.css">
		<link rel="stylesheet" href="css/pager.css">
	</head>
	<body>
		@include('templates.nav')	
		
		<div class="container">
			@yield('content')
		</div>

		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/metro/3.0.14/js/metro.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
		<script>
			$(function() {
				$('.select').select2();
                $(".phone").mask("(999) 999-9999");

                $('[data-show]').on('click', function() {
                    var $this = $(this),
                    $showEl = $($this.data('show'));

                    if ( $this.find('input').is(':checked') ) {
                        $showEl.slideDown();   
                    } else {
                        $showEl.slideUp();
                    }
                });
			});
		</script>
		@include('vendor.flash.message')
	</body>
</html>
