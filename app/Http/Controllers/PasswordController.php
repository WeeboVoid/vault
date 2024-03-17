<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordHistory; // Add this line

class PasswordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        // Assuming you have user authentication and a user is logged in
        $userId = auth()->id();
        PasswordHistory::create([
            'user_id' => $userId,
            'password' => $request->password, // Consider encrypting this if storing sensitive data
        ]);

        return response()->json(['message' => 'Password saved successfully']);
    }

    public function index()
    {
        $userId = auth()->id();
        $passwords = PasswordHistory::where('user_id', $userId)->get();

        // Pass the passwords to your view (or return as JSON for a SPA approach)
        return view('passwordGen', ['passwords' => $passwords]);
    }

    public function history()
    {
        $userId = auth()->id(); // Ensure you're getting the correct user id
        $passwordHistories = PasswordHistory::where('user_id', $userId)->get();
    
        return response()->json($passwordHistories);
    }

}
