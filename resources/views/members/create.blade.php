@extends('templates.pager')

@section('content')
	<div class="grid">
		<div class="row">
			<div class="cell">
				<h1>Add A New Member</h1>
			</div>
		</div>
		<div class="row cells12">
            <div class="cell colspan5">
                @include('templates/errors')
            </div>
			<div class="cell colspan7">
				{{ Form::open([ 'route' => 'members.store'] ) }}
					@include('members.form')
					<button class="button success full-size" id="Member__Create__submit"><span class="mif-plus"></span> Add Member...</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection
