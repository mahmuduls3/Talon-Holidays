@extends('index')

@section('editStudent')
    <form method="POST" class="ml-0 col-md-6 col-lg-6 col-sm-8 col-xs-12">
        <table class="table">
        @csrf
            <tbody>
                <tr>
                    <th scope="row">Id</th>
                    <td>{{$student->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td>
                        <input class="form-control" type="text" name="name" value="{{$student->name}}">
                        <span style="color: red;"> @error('name'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <input class="form-control" type="text" name="email" value="{{$student->email}}">
                        <span style="color: red;"> @error('email'){{$message}} @enderror </span>                           
                    </td>
                </tr>
                <tr>
                    <th scope="row">Phone</th>
                    <td>
                        <input class="form-control" type="text" name="phone" value="{{$student->phone}}">
                        <span style="color: red;"> @error('phone'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Salary</th>
                    <td>
                        <input class="form-control" type="text" name="salary" value="{{$student->salary}}">
                        <span style="color: red;"> @error('salary'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Department</th>
                    <td>
                        <select name="department" id="" class="form-control">
                            <option value="" disabled="disabled">Select your department</option>
                            <option {{ ($student->department) == 'Accounting' ? 'selected' : '' }} value="Accounting">Accounting</option>
                            <option {{ ($student->department) == 'Sales' ? 'selected' : '' }} value="Sales">Sales</option>
                            <option {{ ($student->department) == 'Marketing' ? 'selected' : '' }} value="Marketing">Marketing</option>
                            <option {{ ($student->department) == 'Quality' ? 'selected' : '' }} value="Quality">Quality</option>
                            <option {{ ($student->department) == 'Networking' ? 'selected' : '' }} value="Networking">Networking</option>
                            <option {{ ($student->department) == 'IT' ? 'selected' : '' }} value="IT">IT</option>
                        </select>
                        <span style="color: red;"> @error('department'){{$message}} @enderror </span>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Created At</th>
                    <td>{{$student->created_at}}</td>
                </tr>
                <tr>
                    <th scope="row">Updated At</th>
                    <td>{{$student->updated_at}}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <button type="submit" class="btn btn-outline-success mr-3">Update</button></a>
        </div>
    </form>
@endsection