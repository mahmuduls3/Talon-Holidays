@extends('index')

@section('allLocations')		
		
	<table class="table" id="myTable">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Place Image</th>
			<th scope="col">Counrty</th>
			<th scope="col">Place</th>
			<th scope="col">Price</th>
			<th scope="col">Days</th>
			<th scope="col">Nights</th>
			<th scope="col">Description</th>
			<th scope="col">Package Style</th>
			<th scope="col">Status</th>
			<th scope="col">Edited By</th>
			<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody id="dynamic-row">
		<?php
		foreach ($locations as $location) {
		?>
		<tr>
			<td> {{$location->id}} </td>
			<td> {{$location->image}} </td>
			<td> {{$location->country}} </td>
			<td> {{$location->place}} </td>
			<td> {{$location->price}} </td>
			<td> {{$location->days}} </td>
			<td> {{$location->nights}} </td>
			<td> {{$location->description}} </td>
			<td> {{$location->package}} </td>
			<td> {{$location->status}} </td>
			<td> {{$location->editedBy}} </td>
			<td>
				<a href="{{route('editLocation', $location->id)}}"><button class="btn btn-outline-warning">Edit</button></a>
				<a href="{{route('deleteLocation', $location->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
			</td>
		</tr>
			<?php 
		}
		?>
		</tbody>
	</table>
		
@endsection
