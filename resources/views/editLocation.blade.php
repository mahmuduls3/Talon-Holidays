@extends('index')

@section('editLocation')
    <form method="POST" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
        <table class="table">
            @csrf       
            <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{$location->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td>
                        <input class="form-control" type="text" name="country" value="{{$location->country}}">
                        <span style="color: red;"> @error('country'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Place</th>
                    <td>
                        <input class="form-control" type="text" name="place" value="{{$location->place}}">
                        <span style="color: red;"> @error('place'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Price</th>
                    <td>
                        <input class="form-control" type="text" name="price" value="{{$location->price}}">
                        <span style="color: red;"> @error('price'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Days</th>
                    <td>
                        <input class="form-control" type="text" name="days" value="{{$location->days}}">
                        <span style="color: red;"> @error('days'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Nights</th>
                    <td>
                        <input class="form-control" type="text" name="nights" value="{{$location->nights}}">
                        <span style="color: red;"> @error('nights'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td>
                        <input class="form-control" type="text" name="description" value="{{$location->description}}">
                        <span style="color: red;"> @error('description'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Edited By</th>
                    <td>
                        <input class="form-control" disabled type="text" name="editedBy" value="{{$location->editedBy}}">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Created At</th>
                    <td>{{$location->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">Updated At</th>
                    <td>{{$location->updated_at}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <button type="submit" class="btn btn-outline-success mr-3">Update</button></a>
        </div>
    </form>
@endsection