<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::select('students.*', 'cities.city_name')
                ->join('cities', 'city_id', '=', 'cities.id')
                ->get(); 
        return view('site.index', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all(); 
        $user_id = request('user');
        $user = User::find($user_id);
        return view('site.create', ['cities'=>$cities, 'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:50',
            'address'   => 'string|max:255',
            'phone'     => 'string|max:15',
            'email'     => 'required|email|unique:students,email|max:200',
            'birthdate' => 'required|date|before:today',
            'city_id'   => 'exists:cities,id',
        ];
        
        $request->validate($rules);
        
        $newStudent = Student::create([
            'name'       => $request->name,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'birthdate'  => $request->birthdate,
            'city_id'    => $request->city_id,
            'user_id'    => $request->user
        ]);

        if ($newStudent) {
            return redirect(route('site.index'))->withSuccess(trans('lang.text_student_created'));
        } else {
            return redirect()->back()->withError(trans('lang.text_student_not_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

    public function show(Student $selectedStudent)
    {
        $student = Student::select('students.*', 'cities.city_name')
                ->join('cities', 'city_id', '=', 'cities.id')
                ->where('students.id', $selectedStudent->id)
                ->first(); 

        return view('site.student', ['student' => $student]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $selectedStudent)
    {
        $student = Student::select()
            ->join('cities', 'city_id', '=', 'cities.id')
            ->where('students.id', $selectedStudent->id)
            ->first();
        $cities = City::all();

        return view('site.edit', ['student' => $student, 'cities' => $cities]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $selectedStudent)
    {

        $rules = [
            'name'      => 'required|string|min:2|max:50',
            'address'   => 'string|max:255',
            'phone'     => 'string|max:15',
            'email'     => 'required|email|max:200',
            'birthdate' => 'required|date|before:today',
            'city_id'   => 'exists:cities,id',
        ];
        
        $request->validate($rules);

        $selectedStudent->update([
            'name'       => $request->name,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'birthdate'  => $request->birthdate,
            'city_id'    => $request->city_id,
        ]);

        // Retourner la vue avec l'id de l'article modifié.
        return redirect(route('site.show', $selectedStudent->id))->withSuccess(trans('lang.text_student_updated'));

        if ($selectedStudent) {
            return redirect(route('site.show', $selectedStudent->id))->withSuccess(trans('lang.text_student_updated')); 
        } else {
            return redirect()->back()->withError(trans('lang.text_student_not_updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $selectedStudent)
    {
        $selectedStudent->delete();

        return redirect(route('site.index'))->withSuccess(trans('lang.text_student_deleted')); 
    }
}
