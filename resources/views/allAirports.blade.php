@extends('index')

@section('allAirports')
	<table class="table" id="myTable">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Counrty</th>
			<th scope="col">Airport</th>
			<th scope="col">Created</th>
			<th scope="col">Updated</th>
			<th scope="col">Action</th>
		</tr>
		</thead>
		<tbody id="dynamic-row">
		<?php
		foreach ($airports as $airport) {
		?>
		<tr>
			<td> {{$airport->id}} </td>
			<td> {{$airport->country_name}} </td>
			<td> {{$airport->airport_name}} </td>
			<td> {{$airport->created_at}} </td>
			<td> {{$airport->updated_at}} </td>
			<td>
			<a href="{{route('editAirportIndex', $airport->id)}}"><button class="btn btn-outline-primary">Edit</button></a>
			<a href="{{route('deleteAirportIndex', $airport->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
			</td>
		</tr>
			<?php 
		}
		?>
		</tbody>
	</table>
@endsection