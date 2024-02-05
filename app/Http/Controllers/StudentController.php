<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        return StudentResource::collection(
            Student::all()
        );
    }

    public function store(StoreStudentRequest $request)
    {
        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $student = Student::create($data);
 
        return new StudentResource($student);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return new StudentResource($student);
    }
}
