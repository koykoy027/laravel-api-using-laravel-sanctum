<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\Psr7\Message;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        return response()->json($student);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => ['required','string', 'min:2', 'max:50'],
            'email' => ['required','string', 'min:2', 'max:50', 'unique:students,email'],
            'gender' => ['required','string', 'min:2', 'max:50'],
            'mobile_number' => ['required', 'digits:11'],
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->messages()
            ]);
        }
        else{
            // $student = Student::create($request->all());
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'mobile_number' => $request->mobile_number,
            ]);
            return response()->json($student);
        }
    }

    public function show($id){
        $student = Student::findOrFail($id);
        return response()->json($student);
    }






}
