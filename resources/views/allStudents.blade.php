@extends('index')

@section('allStudents')
    <table class="table" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Salary</th>
                <th scope="col">Department</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="dynamic-row">
            <?php
                foreach ($students as $student) {
                    ?>
            <tr>
                <td> {{$student->id}} </td>
                <td> {{$student->name}} </td>
                <td> {{$student->email}} </td>
                <td> {{$student->phone}} </td>
                <td> {{$student->salary}} </td>
                <td> {{$student->department}} </td>
                <td> {{$student->created_at}} </td>
                <td> {{$student->updated_at}} </td>
                <td>
                    <a href="{{route('editStudent', $student->id)}}"><button class="btn btn-outline-warning">Edit</button></a>
                    <a href="{{route('deleteStudent', $student->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
                </td>
            </tr>
            <?php 
                }
                    ?>
        </tbody>
    </table>
@endsection