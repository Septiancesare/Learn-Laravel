<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Activity;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;





class StudentController extends Controller
{
    //
    public function filter()
    {
        $student= Student::where('score', '>=', 85)->get();
        return view('filter', ['students'=>$student]);
    }

    public function index ()
    {
        // $students=Student::all();
        $user = Auth::user();
        $id = Auth::id();

        $students=Student::paginate(10);
        return view('index', ['students'=>$students, 'user'=>$user, 'id'=>$id]);
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('show', ['student' => $student]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'score'=>'required'
        ]);

        Student::create([
            'name'=>$request->name,
            'score'=>$request->score,
            'teacher_id'=> 1
        ]);

        return Redirect::route('index');
    }

    public function edit($id)
    {
        
        $student = Student::find($id);
        return view('edit', ['student' => $student]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update([
            'name' => $request-> name,
            'score' => $request-> score
        ]);

        return Redirect::route('index');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return Redirect::route('index');
    }
}
