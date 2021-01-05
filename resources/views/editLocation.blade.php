@extends('index')

@section('editLocation')
    <form method="POST" enctype="multipart/form-data" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
        <table class="table">
            @csrf       
            <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{$location->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Place Image (Recommended size: 700 x 460)</th>
                    <td>
                        <input type="file" name="image" class="form-control"  value="{{old('image')}}">
						<span style="color: red;"> @error('image'){{$message}} @enderror </span>
                    </td>
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
                    <th scope="row">Package Style</th>
                    <td>
                        <select name="package" id="" class="form-control">
                            <option value="" disabled="disabled">Select Package Style</option>
                            <option {{ ($location->package) == 'Domestic' ? 'selected' : '' }} value="Domestic">Domestic</option>
                            <option {{ ($location->package) == 'International' ? 'selected' : '' }} value="International">International</option>
                        </select>
                        <span style="color: red;"> @error('package'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>
                        <select name="status" id="" class="form-control">
                            <option value="" disabled="disabled">Select Status</option>
                            <option {{ ($location->status) == 'Normal' ? 'selected' : '' }} value="Normal">Normal</option>
                            <option {{ ($location->status) == 'Featured' ? 'selected' : '' }} value="Featured">Featured</option>
                        </select>
                        <span style="color: red;"> @error('status'){{$message}} @enderror </span>
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
            <button type="submit" class="btn btn-outline-warning mr-3">Update</button></a>
        </div>
    </form>
@endsection