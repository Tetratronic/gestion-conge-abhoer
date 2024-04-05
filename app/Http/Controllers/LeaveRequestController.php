<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationRequest;
use App\Helpers\DateCalculationHelper;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\LeaveRequest;
use Carbon\Carbon;
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

public function store(VacationRequest $request): RedirectResponse
{
    #array of holidays from the database
    $holidays = Holiday::whereYear('date', date('Y'))->get()->pluck('date')->map(function ($date) {
        return Carbon::parse($date)->format('d-m-Y');
    })->toArray();
    $employee = Employee::where('fullname_ar', $request->fullname_ar)->first();
    $availableDays = $employee->current_year_days + $employee->previous_year_days;

    // Check if start date or end date falls on a weekend or holiday
    if (DateCalculationHelper::isWeekendOrHoliday($request->start_date, $holidays)) {
        return back()->withInput()->withErrors(['start_date' => 'La date de début ne peut pas etre un Weekend']);
    }
    if ($request->has('end_date') && DateCalculationHelper::isWeekendOrHoliday($request->end_date, $holidays)) {
        return back()->withInput()->withErrors(['end_date' => 'La date de fin ne peut pas etre un Weekend']);
    }

    if ($request->duration == null) {
        $duration = DateCalculationHelper::calculateDays($request->start_date, $request->end_date, $holidays);
        $enoughDays = $availableDays - $duration >= 0;

    } else {
        $end_date = DateCalculationHelper::calculateEndDate($request->start_date, $request->duration, $holidays);
        $enoughDays = $availableDays - $request->duration >= 0;
    }
    
    if(!$enoughDays){
        return back()->withInput()->withErrors(['duration' => 'Cet employe n\'a pas de jours de conge suffisants']);
    }

    $employeeRequest = LeaveRequest::create([
        'employee_id' => $employee->id,
        'fullname_ar' => $request->fullname_ar,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date ??  $end_date,
        'duration' => $request->duration ?? $duration,
    ]);

    return redirect()->route('vacation.print', $employeeRequest->id);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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

    public function printable(int $vacationRequestId){
        $request = LeaveRequest::findOrFail($vacationRequestId);
        $request->start_date = Carbon::parse($request->start_date);
        $request->end_date = Carbon::parse($request->end_date); 

        return view('requests.vacation-printable', ['request' => $request ]);
    }
}
