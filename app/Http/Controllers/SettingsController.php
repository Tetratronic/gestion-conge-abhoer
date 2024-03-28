<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        $departments = Department::all();  

        return view('settings.edit', [
            'departments' => $departments,
        ]);
    }
}
