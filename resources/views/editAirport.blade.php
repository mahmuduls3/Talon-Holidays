@extends('index')

@section('editAirport')
    <form method="POST" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
        <table class="table">
        @csrf
            <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{$airport->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>
                        <input class="form-control" type="text" name="country_name" value="{{$airport->country_name}}">
                        <span style="color: red;"> @error('country_name'){{$message}} @enderror </span>
                    </td>
                    
                </tr>
                <tr>
                    <th scope="row">Airport</th>
                    <td>
                        <input class="form-control" type="text" name="airport_name" value="{{$airport->airport_name}}">
                        <span style="color: red;"> @error('airport_name'){{$message}} @enderror </span>                           
                    </td>
                </tr>
                <tr>
                    <th scope="row">Created At</th>
                    <td>{{$airport->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">Updated At</th>
                    <td>{{$airport->updated_at}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <button type="submit" class="btn btn-outline-success mr-3">Update</button></a>
        </div>
    </form>
@endsection
