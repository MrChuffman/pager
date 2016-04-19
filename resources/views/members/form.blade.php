<label for="department_id">Department ID</label>
<div class="input-control text full-size">
    {!! Form::text('department_id', null, ['placeholder' => 'Department ID']) !!}
</div>
<label for="rank">Rank</label>
<div class="input-control full-size">
    {!! Form::select('rank', $ranks, old('rank'), ['class' => 'select full-size', 'style' => 'display: none']) !!}
</div>
<label for="name">Name</label>
<div class="input-control text full-size">
    {!! Form::text('name', null, ['placeholder' => 'Name']) !!}
</div>
<label for="phone">Phone Number</label>
<div class="input-control text full-size">
    {!! Form::text('phone', null, ['placeholder' => 'Phone Number', 'class' => 'phone']) !!}
</div>
<label for="carrier">Carrier</label>
<div class="input-control full-size">
    {!! Form::select('carrier', $carriers, old('carrier'), ['class' => 'select full-size', 'style' => 'display: none']) !!}
</div>
<div class="row cells2">
	<div class="cell">
		<label class="input-control checkbox">
            {!! Form::checkbox('rip_runs', 1) !!}
			<span class="check"></span>
			<span class="caption">Receive Rip &amp; Runs</span>
		</label>
	</div>
	<div class="cell">
		<label class="input-control checkbox">
            {!! Form::checkbox('notifications', 1) !!}
			<span class="check"></span>
			<span class="caption">Receive Notifications</span>
		</label>
	</div>
</div>
<label class="input-control checkbox" data-show=".is_admin">
    {!! Form::checkbox('admin', 1) !!}
    <span class="check"></span>
    <span class="caption">Can Maintain Members &amp; Send Messages</span> 
</label>
@if(isset($member['admin']) && $member['admin'])
<div class="is_admin">
@else
<div class="is_admin" style="display: none">
@endif
        <label for="password">Password</label>
        <div class="input-control full-size">
            {!! Form::password('password', null, ['placeholder' => 'Password']) !!}
        </div>
        <label for="password_confirmation">Confirm Password</label>
        <div class="input-control full-size">
            {!! Form::password('password_confirmation', null, ['placeholder' => 'Confirm Password']) !!}
        </div>
</div>

