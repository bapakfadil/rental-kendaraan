<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomPasswordResetController extends Controller
{
    /**
     * Display the custom forgot password form.
     */
    public function showForgotPasswordForm()
    {
        return view('auth.lupa-password');
    }

    /**
     * Handle the forgot password request.
     */
    public function handleForgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'unique_code' => ['required', 'string'],
            'password' => ['required', 'confirmed'],
        ]);

        // Verify unique code
        $user = User::where('email', $request->email)->where('unique_code', $request->unique_code)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email atau kode unik tidak valid.']);
        }

        // Update the user's password
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return redirect()->route('login')->with('status', 'Password berhasil direset.');
    }
}
