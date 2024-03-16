<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //List Employees
    public function show(): View
    {
        return view('employees-list', [
            'employees' => Employee::All()
        ]);
    }
}
