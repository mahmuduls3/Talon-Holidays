@extends('index')

@section('deleteStudent')
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
                    <td>{{$student->name}}</td>
                    
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>{{$student->email}}</td>
                </tr>
                <tr>
                    <th scope="row">Phone</th>
                    <td>{{$student->phone}}</td>
                </tr>
                <tr>
                    <th scope="row">Salary</th>
                    <td>{{$student->salary}}</td>
                </tr>
                <tr>
                    <th scope="row">Department</th>
                    <td>{{$student->department}}</td>
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
            <button type="submit" class="btn btn-outline-danger mr-3">Delete Permanently</button></a>
        </div>
    </form>
@endsection