<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Rules\ArabicText;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $searchQuery = $request->input('search');

        $employees = Employee::where('firstname', 'like', "%$searchQuery%")
            ->paginate(10); // Change the number 15 to your desired items per page

        return view('employees.list', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create', [
            'departments' => Department::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'fullname_ar' => ['required', new ArabicText],
            'position' => 'required',
            'department' => 'required',
            'idnumber' => 'required|max:10',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Employee::class],
            'current_year_days' => 'required|numeric|lte:22|gte:0',
            'previous_year_days' => 'required|numeric|lte:22|gte:0',
        ]);
        Employee::create($validatedData);
        return redirect()->route('employees.index')->with('success', 'L\'employé a bien été ajouté');
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
    public function edit(string $id): View
    {
        return view('employees.edit', [
            'employee' => Employee::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'fullname_ar' => ['required', new ArabicText()],
            'position' => 'required',
            'department' => 'required',
            'idnumber' => 'required|max:10',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:employees,email,'.$employee->id],
            'current_year_days' => 'required|numeric|lte:22|gte:0',
            'previous_year_days' => 'required|numeric|lte:22|gte:0',
        ]);

        $employee->update($validatedData);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
