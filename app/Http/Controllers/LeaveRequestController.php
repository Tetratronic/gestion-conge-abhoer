<?php

namespace App\Http\Controllers;

use App\Http\Requests\vacationRequest;
use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(vacationRequest $request): RedirectResponse
    {
        $employeeRequest = LeaveRequest::create([
            'employee_id' => $employee->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
        ]);

        event(new Registered($employeeRequest));
        // return \App::make('redirect')->back()->with('flash_success', 'Thank you,!');

        return redirect(route('dashboard', absolute: false));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
