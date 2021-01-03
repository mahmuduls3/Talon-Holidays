<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container d-flex mt-5">
        <div class="login col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <h4>Login</h4>
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email...">
                    <span style="color: red;"> @error('password'){{$message}} @enderror </span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Enter your password...">
                    <span style="color: red;"> @error('password'){{$message}} @enderror </span>
                </div>
                @if(session('loginError'))
                <h4 style="color: crimson">Email or password does not matched</h4>
                @endif
                <button type="submit" class="btn btn-outline-success">Login</button>
            </form>
        </div>
        <div class="register col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <h4>Register</h4>
            <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter your name...">
                    <span style="color: red;"> @error('name'){{$message}} @enderror </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email...">
                    <span style="color: red;"> @error('email'){{$message}} @enderror </span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Enter your password...">
                    <span style="color: red;"> @error('password'){{$message}} @enderror </span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm your password...">
                    <span style="color: red;"> @error('password_confirmation'){{$message}} @enderror </span>
                </div>
                @if(session('newUser'))
                <h4 style="color: green">{{session('newUser')}} has been added</h4>
                @endif
                <button type="submit" class="btn btn-outline-success">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
