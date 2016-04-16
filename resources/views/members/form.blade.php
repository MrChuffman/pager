<label for="department_id">Department ID</label>
<div class="input-control text full-size">
	<input type="text" id="department_id" name="department_id" value="{{ old('department_id') }}" placeholder="Department ID">
</div>
<label for="rank">Rank</label>
<div class="input-control full-size">
    {!! Form::select('rank', $ranks, old('rank'), ['class' => 'select full-size', 'style' => 'display: none']) !!}
</div>
<label for="name">Name</label>
<div class="input-control text full-size">
	<input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
</div>
<label for="phone">Phone Number</label>
<div class="input-control text full-size">
	<input type="text" id="phone" class="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
</div>
<label for="carrier">Carrier</label>
<div class="input-control full-size">
    {!! Form::select('carrier', $carriers, old('carrier'), ['class' => 'select full-size', 'style' => 'display: none']) !!}
</div>
<div class="row cells2">
	<div class="cell">
		<label class="input-control checkbox">
			<input type="checkbox" name="rip_runs" value="1" checked>
			<span class="check"></span>
			<span class="caption">Receive Rip &amp; Runs</span>
		</label>
	</div>
	<div class="cell">
		<label class="input-control checkbox">
			<input type="checkbox" name="notifications" value="1" checked>
			<span class="check"></span>
			<span class="caption">Receive Notifications</span>
		</label>
	</div>
</div>
<label class="input-control checkbox" data-show=".is_admin">
    <input type="checkbox" name="admin" value="1" />
    <span class="check"></span>
    <span class="caption">Can Maintain Members &amp; Send Messages</span> 
</label>
<div class="is_admin" style="display: none">
        <label for="password">Password</label>
        <div class="input-control full-size">
            <input type="password" id="password" name="password" placeholder="Password">
        </div>
        <label for="password_confirmation">Confirm Password</label>
        <div class="input-control full-size">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
        </div>
</div>

