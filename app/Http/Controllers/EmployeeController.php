<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $searchQuery = $request->input('search');
        return view('employees.list',[
            'employees' => Employee::where('firstname', 'like', "%$searchQuery%")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $employee = Employee::create($data);
        return redirect()->route('employees.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('employees.edit', [
            'employee' => Employee::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'position' => 'required',
            'department' => 'required',
            'idnumber' => 'required|max:10',
            'email' => 'required|email',
            'current_year_days' => 'required|numeric|lte:22|gte:0',
            'previous_year_days' => 'required|numeric|lte:22|gte:0',
        ]);

        $employee->update($validatedData);
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id); 
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
