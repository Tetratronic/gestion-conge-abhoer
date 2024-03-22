<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller


{

    public function index(Request $request): View
    {
        $searchQuery = $request->input('search');
        return view('users.list',[
            'users' => User::with('employee')->where('login', 'like', "%$searchQuery%")->get(),
            'status' => Employee::where('email', $request->email)->first(),
        ]);
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'lowercase']
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $employee->id,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        return redirect(route('dashboard', absolute: false));
    }
}
