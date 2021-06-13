<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Models\Group;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $group = Group::where("id",$request->get("group"))->select("id","name")->firstOrFail();
        $students = Student::where("group_id","=",$request->group)->get();
        return view("students.list",[
            "group"=>$group,
            "students"=>$students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Student::insert($request->all());
        return response()->json([
            "message"=>"Student was created"
        ],200);
    
    }

    public function getStudent($request){
        if($request->get("name")){
            $student  = Student::where("name","LIKE","%".$request->name."%")->firstOrFailt();
            return $student;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where("id","=",$id)->firstOrFail();
        return view("students.student")->with("student",$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where("id",$id)->firstOrFail();
        return view("students.edit")->with("student",$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where("id",$id)->update($request->all());
        if($student){
            return response()->json([
                "student_info"=>$student
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where("id",$id)->destroy();
        return true;
    }
}
