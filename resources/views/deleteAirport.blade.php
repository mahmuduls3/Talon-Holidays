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
        <a href="{{route('allCountries')}}"><button class="btn btn-outline-primary mr-3 mt-3 mb-3">All Countries</button></a>
        <a href="{{route('logout')}}"><button class="btn btn-outline-secondary mr-3 mt-3 mb-3">Logout</button></a>
        <form method="POST" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
            <table class="table">
            @csrf
                <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <td>{{$country->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>{{$country->country_name}}</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Airport</th>
                        <td>{{$country->airport_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created At</th>
                        <td>{{$country->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated At</th>
                        <td>{{$country->updated_at}}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <button type="submit" class="btn btn-outline-danger mr-3">Delete Permanently</button></a>
            </div>
        </form>
    </div>
</body>

</html>
