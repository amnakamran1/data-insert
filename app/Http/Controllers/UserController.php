<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return view('form');
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

        return redirect()->back()->with('success', 'Student registered successfully.');
    }
}

