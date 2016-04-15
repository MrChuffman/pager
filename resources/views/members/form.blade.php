<label for="department_id">Department ID</label>
<div class="input-control text full-size">
	<input type="text" id="department_id" name="department_id" value="{{ old('department_id') }}" placeholder="Department ID">
</div>
<label for="rank">Rank</label>
<div class="input-control full-size">
	<select name="rank" class="select full-size" style="display: none">
		<optgroup label="Tactical Members">
			<option value="Firefighter">Firefighter</option>
			<option value="Probationary">Probationary Firefighter</option>
			<option value="Lieutenant">Lieutenant</option>
			<option value="Captain">Captain</option>
			<option value="Battalion Chief">Battalion Chief</option>
			<option value="Assistance Chief">Assistance Chief</option>
			<option value="Chief">Chief</option>
		</optgroup>
		<optgroup label="Members">
			<option value="Cadet">Cadet</option>
			<option value="Recruit">Recruit</option>
			<option value="Auxillary">Auxiliary</option>
			<option value="Medical Officer">Medical Officer</option>
			<option value="Safety Officer">Safety Officer</option>
		</optgroup>
	</select>
</div>
<label for="name">Name</label>
<div class="input-control text full-size">
	<input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name">
</div>
<label for="phone">Phone Number</label>
<div class="input-control text full-size">
	<input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
</div>
<label for="carrier">Carrier</label>
<div class="input-control full-size">
	<select name="carrier" class="select full-size" style="display: none">
		<option value="1">AT&amp;T</option>
		<option value="2">Verizon</option>
	</select>
</div>
<div class="row cells2">
	<div class="cell">
		<label class="input-control checkbox">
			<input type="checkbox" checked>
			<span class="check"></span>
			<span class="caption">Receive Rip &amp; Runs</span>
		</label>
	</div>
	<div class="cell">
		<label class="input-control checkbox">
			<input type="checkbox" checked>
			<span class="check"></span>
			<span class="caption">Receive Notifications</span>
		</label>
	</div>
</div>
