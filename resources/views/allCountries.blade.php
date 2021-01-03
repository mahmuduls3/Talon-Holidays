<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

</head>
<body>
	<div class="container">
		<h4>Hello, {{session('user')}}</h4>
		<a href="{{route('index')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">Home</button></a>
		<a href="{{route('allStudents')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">All Students</button></a>
		<button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-student">Add Student</button>
		<a href="{{route('allCountries')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3 active">All Countries</button></a>
		<button class="btn btn-outline-success mr-3 mt-3 mb-3"  data-toggle="modal" data-target="#add-airport">Add Airport</button>
		<a href="{{route('logout')}}"><button class="btn btn-outline-secondary mr-3 mt-3 mb-3">Logout</button></a>
		@if(session('airport_name'))
			<h4 style="color: green">{{session('airport_name')}} has been added</h4>
		@endif
		<div>
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
              foreach ($countries as $country) {
                ?>
                <tr>
                  <td> {{$country->id}} </td>
                  <td> {{$country->country_name}} </td>
                  <td> {{$country->airport_name}} </td>
                  <td> {{$country->created_at}} </td>
                  <td> {{$country->updated_at}} </td>
                  <td>
                    <a href="{{route('editAirportIndex', $country->id)}}"><button class="btn btn-outline-primary">Edit</button></a>
                    <a href="{{route('deleteAirportIndex', $country->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
                  </td>
                </tr>
                 <?php 
               }
                ?>
              </tbody>
		    </table>
		</div>
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
							<input type="text" name="name" class="form-control"  placeholder="Enter your name..." value="{{old('name')}}">
							<span style="color: red;"> @error('name'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email..." value="{{old('email')}}">
							<span style="color: red;"> @error('email'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" class="form-control"  placeholder="Enter your phone..." value="{{old('phone')}}">
							<span style="color: red;"> @error('phone'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Salary</label>
							<input type="number" name="salary" class="form-control" placeholder="Enter your salary..." value="{{old('salary')}}">
							<span style="color: red;"> @error('salary'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label>Department</label>
							<select name="department" id="" class="form-control">
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
					<h5 class="modal-title">Add Airport</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('addAirport')}}" class="ml-0 col-md-12 col-lg-12 col-sm-12 col-xs-12">
					@csrf
						<div class="form-group">
							<label >Counrty name</label>
							<input type="text" name="country_name" class="form-control"  placeholder="Bangladesh" value="{{old('country_name')}}">
							<span style="color: red;"> @error('country_name'){{$message}} @enderror </span>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Airport Name</label>
							<input type="text" name="airport_name" class="form-control" placeholder="Hazrat Shahjalal International Airport (DAC)" value="{{old('airport_name')}}">
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
	<!-- Modal Ends -->

	<!-- Scripts -->
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