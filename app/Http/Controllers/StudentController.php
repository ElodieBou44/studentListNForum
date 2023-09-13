<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
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
        return view('site.create', ['cities'=>$cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newStudent = Student::create([
            'name'       => $request->name,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'birthdate'  => $request->birthdate,
            'city_id'    => $request->city_id,
        ]);

        return redirect(route('site.index'))->withSuccess('The student has been added with success.'); 
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
        $selectedStudent->update([
            'name'       => $request->name,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'birthdate'  => $request->birthdate,
            'city_id'    => $request->city_id,
        ]);

        // Retourner la vue avec l'id de l'article modifié.
        return redirect(route('site.show', $selectedStudent->id))->withSuccess('The student has been updated with success.');
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

        return redirect(route('site.index'))->withSuccess('The student has been deleted with success.'); 
    }
}
