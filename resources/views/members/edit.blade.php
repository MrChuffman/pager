@extends('templates.pager')

@section('content')
	<div class="grid">
		<div class="row">
			<div class="cell">
				<h1>Update Member</h1>
			</div>
		</div>
		<div class="row cells12">
            <div class="cell colspan5">
                @include('templates/errors')
            </div>
			<div class="cell colspan7">
                {{ Form::model($member, [ 'method' => 'put', 'route' => ['members.update', $member['id']]] ) }}
                    @include('members.form')
					<button class="button info full-size" id="Member__Edit__submit"><span class="mif-clipboard"></span> Update Member...</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection
