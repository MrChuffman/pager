@extends('templates.pager')

@section('content')
	<h1>Send Message</h1>
	{{ Form::open(['route' => 'messages.create']) }}
	<div class="input-control textarea full-size">
		<textarea></textarea>
	</div>
	<button class="button success full-size"><span class="mif-paper-plane mif-2x"></span> Send Message</button>
	{{ Form::close() }}
	<hr>
	<h3>Messages Log</h3>
	<hr>
	<div class="panel panel-collapse" data-role="panel">
		<div class="heading">
			<span class="title">04/14/2016 at 1900</span>
		</div>
		<div class="content padding10">
			Dolor ratione fuga ab eius consequuntur? Cupiditate excepturi suscipit animi ipsam obcaecati sequi, eos perspiciatis saepe voluptatibus. Ipsam porro commodi dolore aliquam corporis. Quos magnam quisquam ad illo natus voluptatum.
		</div>
	</div>
@endsection
