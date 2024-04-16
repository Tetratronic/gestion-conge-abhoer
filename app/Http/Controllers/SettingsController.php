<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Holiday;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        $departments = Department::all();
        $holidays = Holiday::all();

        return view('settings.edit', [
            'departments' => $departments,
            'holidays' => $holidays,
        ]);
    }
}
