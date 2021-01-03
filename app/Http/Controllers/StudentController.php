<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('allStudents', ['students' => $students]);
    }
    
    
    public function add(Request $request)
    {
//         Storing values with Query Builder. Does not require Model
//        DB::table('students')->insert([
//            ['name' => $request->name, 'email' => $request->email, 'phone' => $request->phone]
//        ]);
//        return redirect('allStudents');
        
// Validating and storing values using Eloquent. Requires Model
        $validate = $request->validate([
            'name' => 'required | min: 4 | max: 255',
            'email' => 'required | email | min: 5',
            'phone' => 'required | regex:/(01)[0-9]{9}/',
            'salary' => 'required | min: 4 | max: 8',
            'department' => 'required | not_in: 0'
        ]);

        if($validate){
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->salary = $request->salary;
            $student->department = $request->department;
            $student->save();
            $request->session()->flash('student', $student->name);
            return redirect()->route('allStudents');
        } 
    }
    
    public function editIndex($id){
        $student = Student::where('id', $id)->first();
        return view('editStudent', ['student'=>$student]);
    }
    
    public function edit($id, Request $request){
        $validate = $request->validate([
            'name' => 'required | min: 4 | max: 255',
            'email' => 'required | email | min: 5',
            'phone' => 'required | regex:/(01)[0-9]{9}/',
            'salary' => 'required | min: 4 | max: 8',
            'department' => 'required | not_in: 0'
        ]);
        
       if($validate){
            Student::where('id', $id)
                    ->update(['name' => $request->name,
                                'email' => $request->email,
                                'phone' => $request->phone,
                                'salary' => $request->salary,
                                'department' => $request->department
                            ]);
            return redirect()->route('allStudents');
       }
    }

    public function deleteIndex($id){
        $student = Student::where('id', $id)->first();
        return view('deleteStudent', ['student'=>$student]);
    }
    
    public function delete($id){
        Student::where('id', $id)->delete();
        return redirect()->route('allStudents');
    }

    // public function search(Request $request){
    //     $students = Student::where('name', 'like', '%'.$request -> get('query'). '%')->get();
    //     return json_encode($students);
    // }
    
}
