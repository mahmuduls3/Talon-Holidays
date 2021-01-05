@extends('index')

@section('editProfile')
    <form method="POST" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
        <table class="table">
            @csrf       
            <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        <span style="color: red;"> @error('name'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th scope="row">Password</th>
                    <td>
                        <input class="form-control" type="password" name="password" value="{{$user->password}}">
                        <span style="color: red;"> @error('password'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Confirm Password</th>
                    <td>
                        <input class="form-control" type="password" name="password_confirmation" value="{{$user->password}}">
                        <span style="color: red;"> @error('password_confirmation'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Created At</th>
                    <td>{{$user->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">Updated At</th>
                    <td>{{$user->updated_at}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <button type="submit" class="btn btn-outline-warning mr-3">Update</button></a>
        </div>
    </form>
@endsection