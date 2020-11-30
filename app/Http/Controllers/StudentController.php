<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program;

class StudentController extends Controller
{
    public function index()
    {
        $studs = Student::all();
        return view('home', ['studs' => $studs]);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student', ['student' => $student]);
    }

    public function create()
    {
        $programs = Program::all();
        return view('students.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'program' => 'required',
            'email' => 'required|email',
            'status' => 'required|integer'
        ]);
        $student = new Student([
            'name' => $request->input('name'),
            'program' => $request->input('program'),
            'program' => 1,
            'email' => $request->input('email'),
            'status' => $request->input('status')
        ]);
        $student->save();
        return redirect('/home')->with('status', 'Student has been added');
    }

    public function edit($id)
    {
        $stud = Student::find($id);
        return view('students.edit', compact('stud', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'name'=>'required',
          'email'=> 'required|email',
          'status' => 'required|integer'
        ]);
        $stud = Student::find($id);
        $stud->name = $request->input('name');
        $stud->email = $request->input('email');
        $stud->status = $request->input('status');
        $stud->save();
        return redirect('/home')->with('status', 'Student has been updated');
    }

    public function destroy($id)
    {
        $stud = Student::find($id);
        $stud->delete();
        return redirect('/home')->with('status', 'Student has been deleted!!');
    }
}
