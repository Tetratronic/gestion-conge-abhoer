<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{

    public function index(Request $request): View
    {
        $searchQuery = $request->input('search');
        return view('users.list',[
            'users' => User::with('employee')->where('login', 'like', "%$searchQuery%")->get(),
        ]);
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'lowercase']
        ]);

        // $isEmployee = Employee::where('email', $request->email)->first();

    function checkEmployee(Request $request) {
            $employee = Employee::where('email', $request->email)->first();
            if($employee){
                return $employee->id;
            } else{
                return null;
            }
        };

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'employee_id' => checkEmployee($request),
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));
        // return \App::make('redirect')->back()->with('flash_success', 'Thank you,!');

        return redirect(route('dashboard', absolute: false));
    }

    public function edit(string $id): View
    {
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'login' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'Employee modified successfully');
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Employee deleted successfully');
    }
}
