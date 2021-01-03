<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h4>Hello, {{session('user')}}</h4>
        <a href="{{route('index')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">Home</button></a>
        <a href="{{route('allStudents')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">All Students</button></a>
        <a href="{{route('addStudent')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3 active">Add Student</button></a>
        <a href="{{route('logout')}}"><button class="btn btn-outline-secondary mr-3 mt-3 mb-3">Logout</button></a>
        <h4>Add Student</h4>
        <form method="POST" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
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
            @if(session('student'))
            <h4 style="color: green">{{session('student')}} has been added</h4>
            @endif
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
</body>

</html>
