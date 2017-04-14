<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEmployees = employee::all();
        return view('employees',compact('allEmployees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allEmployees = employee::all();
        return view('create')->with('allEmployees',$allEmployees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new employee;
        $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'age'=>'required',
                'gender'=>'required',
                'office'=>'required',
            ]);
        $employee->first_name = trim($request->first_name);
        $employee->last_name = trim($request->last_name);
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->office = trim($request->office);
        $employee->supervisor = $request->supervisor;
        $employee->save();
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::find($id);
        $allEmployees = employee::all();
        return view('view')->with('employee',$employee)->with('allEmployees',$allEmployees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/employee/' . $id);
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
        $employee = employee::find($id);
        $this->validate($request,[
                'first_name'=>'required',
                'last_name'=>'required',
                'age'=>'required',
                'gender'=>'required',
                'office'=>'required',
            ]);
        $employee->first_name = trim($request->first_name);
        $employee->last_name = trim($request->last_name);
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->office = trim($request->office);
        $employee->supervisor = $request->supervisor;
        $employee->save();
        session()->flash('message','Employee Updated');
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        session()->flash('message','Employee Erased');
        return redirect('employee');
    }
}
