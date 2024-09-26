<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $url = url("/form");
        $title = "Student Registration";
        $data = compact('url');
        return view('form')->with($data);

    }

    public function store(Request $request)
    {
        //echo "<pre>";
//print_r($request->all());

        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        // $student->city = $request['city'];
       // $customer->date_of_birth = ['date_of_birth']; // Change date format
        $student->gender = $request['gender'];
        $student->password = md5($request['password']);
        $student->points = $request['points'];
        $student->status = $request['status'];
        $student->save();

        return redirect('/student/view');
    }
    public function view()  {
        $students = Student::all();
        // echo "<pre>";
        // print_r($customers);
        // echo "</pre>";
        // die;
        $data = compact('students');
        return view('student-view')->with($data);
    }
    // public function delete($id) {
    //     Student::find($id)->delete();
    //     return redirect()->back();
    // }
    public function delete($id) {
        $student = Student::find($id);
        
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student not found.');
        }
    }
    public function edit($id) {
        $student = student::find($id);
        if (is_null($student)) {
            # code...
            return redirect('/student/view');
        } else {
            $title = "Update Student";
            $url = url('/student/update') . "/" . $id;
            $data = compact('form', 'url', 'title');
            return view('form')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $student = Student::find($id);
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->address = $request['address'];
      
        $student->gender = $request['gender'];
        $student->points = $request['points'];
        $student->status = $request['status'];
        $student->save();
        return redirect('form'); 
    }
    }
       


