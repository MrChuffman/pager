@extends('templates/pager')

@section('content')
<h1 class="text-light">
	<span class="mif-users"></span>
	Members	
	<a href="{{ route('members.create') }}" class="button primary place-right"><span class="mif-plus"></span> Add Member...</a>
</h1>
<hr class="thin bg-grayLighter">
<table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
	<thead>
		<tr>
			<td class="sortable-column" style="width: 100px">Dept ID</td>
			<td class="sortable-column">Name</td>
			<td class="sortable-column">Phone Number</td>
			<td class="sortable-column">Carrier</td>
			<td class="sortable-column">Rip &amp; Runs</td>
			<td class="sortable-column">Notifications</td>
			<td style="width: 125px">Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach($members as $member)
		<tr>
			<td>{{ $member['deptid'] }}</td>
			<td>{{ $member['name'] }}</td>
			<td>{{ $member['phone'] }}</td>
			<td>{{ $member['carrier'] }}</td>

			@if($member['ripruns'])
			<td data-sort="1" style="text-align: center">
				<span class="mif-checkmark fg-green"></span>
			</td>	
			@else
			<td data-sort="0" style="text-align: center">
				<span class="mif-stop fg-red"></span>
			</td>
			@endif

			@if($member['notifications'])
			<td data-sort="1" style="text-align: center">
				<span class="mif-checkmark fg-green"></span>
			</td>	
			@else
			<td data-sort="0" style="text-align: center">
				<span class="mif-stop fg-red"></span>
			</td>
			@endif	

			<td>
				<div class="split-button">
					<a href="{{ route('members.edit', 1) }}" class="button primary">Edit</a>
					<a class="split dropdown-toggle primary"></a>
					<ul class="split-content d-menu" data-role="dropdown">
						<li><a href="#">Delete</a></li>					
					</ul>
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
