@extends('index')

@section('deleteAirport')
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
                        <td>{{$location->country}}</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Place</th>
                        <td>{{$location->place}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <td>{{$location->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Days</th>
                        <td>{{$location->days}}</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Nights</th>
                        <td>{{$location->nights}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <td>{{$location->description}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Edited By</th>
                        <td>{{$location->editedBy}}</td>
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
@endsection
