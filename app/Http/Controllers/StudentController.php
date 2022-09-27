<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::latest()->paginate(5);
        return view('studentspage.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentspage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name'          =>  'required',
            'student_email'         =>  'required|email|unique:students',
            'student_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        $input =$request->all();
        if ($image = $request->file('student_image')) {
            $destinationPath = 'images/';
            $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $input['student_image'] = $file_name;
        }
        Student::create($input);

        return redirect()->route('students.index')->with('success', 'Student Added successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('studentspage.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('studentspage.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_name'      =>  'required',
            'student_email'     =>  'required|email'
        ]);
        $destinationPath = 'images/';
        
        $input =$request->all();
        if ($image = $request->file('student_image')) {
            $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $pathimgold = $destinationPath.$request->hidden_student_image;
            if (file_exists($pathimgold)) {
                @unlink($pathimgold);
            }
            $input['student_image'] = $file_name;
        }else{
            unset($input['image']);
        }

        // echo $pathimgold;
        $student->update($input);

        return redirect()->route('students.index')->with('success', 'Student Data has been updated successfully');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // $cardata = Student::findorfail($request->id);
        $destinationPath = 'images/';
        $pathimgold = $destinationPath.$student->student_image;
            if (file_exists($pathimgold)) {
                @unlink($pathimgold);
            }
        
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Data deleted successfully');
 
    }
}
