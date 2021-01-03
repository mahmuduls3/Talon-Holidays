@extends('index')

@section('deleteAirport')
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
                        <td>{{$airport->country_name}}</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Airport</th>
                        <td>{{$airport->airport_name}}</td>
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
                <button type="submit" class="btn btn-outline-danger mr-3">Delete Permanently</button></a>
            </div>
        </form>
@endsection
