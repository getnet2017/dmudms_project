<?php

// namespace App\Http\Controllers;

// use App\Http\Requests\ProfileUpdateRequest;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
// use Inertia\Inertia;
// use Inertia\Response;

// class ProfileController extends Controller
// {
//     /**
//      * Display the user's profile form.
//      */
//     public function edit(Request $request): Response
//     {
//         return Inertia::render('Profile/Edit', [
//             'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
//             'status' => session('status'),
//         ]);
//     }

//     /**
//      * Update the user's profile information.
//      */
//     public function update(ProfileUpdateRequest $request): RedirectResponse
//     {
//         $request->user()->fill($request->validated());

//         if ($request->user()->isDirty('email')) {
//             $request->user()->email_verified_at = null;
//         }

//         $request->user()->save();

//         return Redirect::route('profile.edit');
//     }

//     /**
//      * Delete the user's account.
//      */
//     public function destroy(Request $request): RedirectResponse
//     {
//         $request->validate([
//             'password' => ['required', 'current-password'],
//         ]);

//         $user = $request->user();

//         Auth::logout();

//         $user->delete();

//         $request->session()->invalidate();
//         $request->session()->regenerateToken();

//         return Redirect::to('/');
//     }
// }




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Employee;

class ProfileController extends Controller
{
    public function edit()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Fetch the corresponding employee details
        $employee = Employee::where('email', $user->email)->first();

        return view('profile.edit', compact('user', 'employee'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the input data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'second_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:employees,email,' . $user->id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'citizenship' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update employee details
        $employee = Employee::where('email', $user->email)->first();
        if ($employee) {
            $employee->update([
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'citizenship' => $request->citizenship,
            ]);
        }

        // Update user details
        $user->update([
            'email' => $request->email,
            'username' => $request->username,
        ]);

        // Update password if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}