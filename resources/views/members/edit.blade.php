@extends('templates.pager')

@section('content')
	<div class="grid">
		<div class="row">
			<div class="cell">
				<h1>Update Member</h1>
			</div>
		</div>
		<div class="row cells12">
			<div class="cell colspan8 offset4">
				{{ Form::open([ 'route' => ['members.update', 1]] ) }}
					@include('members.form')
					<button class="button info full-size"><span class="mif-clipboard"></span> Update Member...</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection
