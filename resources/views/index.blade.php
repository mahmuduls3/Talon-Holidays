<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body>
	
	<div class="container">
		@if(session('user'))
			<h4>Hello, {{session('user')}}</h4>
		@endif
		<a href="{{route('index')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">Home</button></a>
		<a href="{{route('allStudents')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">All Students</button></a>
		<button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-student">Add Student</button>
		<a href="{{route('allAirports')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">All Airports</button></a>
		<button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-airport">Add Airport</button>
		<a href="{{route('allLocations')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">All Locations</button></a>
		<button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-location">Add Location</button>
		<a href="{{route('logout')}}"><button class="btn btn-outline-secondary mr-3 mt-3 mb-3">Logout</button></a>
	
		@if(session('student'))
			<h4 style="color: green">{{session('student')}} has been added</h4>
		@endif
		@if(session('airport_name'))
			<h4 style="color: green">{{session('airport_name')}} has been added</h4>
		@endif
		@if(session('place'))
			<h4 style="color: green">{{session('place')}} has been added</h4>
		@endif

		@yield('allLocations')
		@yield('editLocation')
		@yield('deleteLocation')
		@yield('allStudents')
		@yield('editStudent')
		@yield('deleteStudent')
		@yield('allAirports')
		@yield('editAirport')
		@yield('deleteAirport')

	</div>

	<!-- Modal -->
	
	<!-- Add Student -->
	<div class="modal fade" id="add-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('addStudent')}}" class="ml-0 col-md-12 col-lg-12 col-sm-12 col-xs-12">
					@csrf
						<div class="form-group">
							<label >Name</label>
							<input type="text" name="name" class="form-control"  placeholder="Enter your name..." value="{{old('name')}}" required>
							<span style="color: red;"> @error('name'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email..." value="{{old('email')}}" required>
							<span style="color: red;"> @error('email'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" class="form-control"  placeholder="Enter your phone..." value="{{old('phone')}}" required>
							<span style="color: red;"> @error('phone'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Salary</label>
							<input type="number" name="salary" class="form-control" placeholder="Enter your salary..." value="{{old('salary')}}" required>
							<span style="color: red;"> @error('salary'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Department</label>
							<select name="department" id="" class="form-control" required>
								<option value="" disabled="disabled" selected="selected">Select your department</option>
								<option value="Accounting">Accounting</option>
								<option value="Sales">Sales</option>
								<option value="Marketing">Marketing</option>
								<option value="Quality">Quality</option>
								<option value="Networking">Networking</option>
								<option value="IT">IT</option>
							</select>
							<span style="color: red;"> @error('department'){{$message}} @enderror </span>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-outline-success">Add Student</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Airport -->
	<div class="modal fade" id="add-airport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Airport</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('addAirport')}}" class="ml-0 col-md-12 col-lg-12 col-sm-12 col-xs-12">
					@csrf
						<div class="form-group">
							<label>Country name</label>
							<input type="text" name="country_name" class="form-control"  placeholder="Bangladesh" value="{{old('country_name')}}">
							<span style="color: red;"> @error('country_name'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Airport Name</label>
							<input type="text" name="airport_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hazrat Shahjalal International Airport (DAC)" value="{{old('airport_name')}}">
							<span style="color: red;"> @error('airport_name'){{$message}} @enderror </span>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-outline-success">Add Airport</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>	 

	<!-- Add Location -->
	<div class="modal fade" id="add-location" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Location</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('addLocation')}}" class="ml-0 col-md-12 col-lg-12 col-sm-12 col-xs-12">
					@csrf
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="country" class="form-control"  placeholder="Bangladesh" value="{{old('country')}}">
							<span style="color: red;"> @error('country'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Place</label>
							<input type="text" name="place" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sajek" value="{{old('place')}}">
							<span style="color: red;"> @error('place'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="number" name="price" class="form-control"  placeholder="7500" value="{{old('price')}}" required>
							<span style="color: red;"> @error('price'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>No. of Days</label>
							<input type="number" name="days" class="form-control"  placeholder="2" value="{{old('days')}}" required>
							<span style="color: red;"> @error('days'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>No. of Nights</label>
							<input type="number" name="nights" class="form-control"  placeholder="3" value="{{old('nights')}}" required>
							<span style="color: red;"> @error('nights'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Description</label>
							<input type="text" name="description" class="form-control"  placeholder="A wonderful place to visit" value="{{old('description')}}" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editedBy" class="form-control"  placeholder="" value="{{session('user')}}" required>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-outline-success">Add Location</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Ends -->         
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>
