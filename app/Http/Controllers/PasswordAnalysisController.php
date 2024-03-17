<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class PasswordAnalysisController extends Controller
{
    public function analyzePasswords()
    {
        // Fetch hashed passwords from the users table
        $hashedPasswords = DB::table('users')->pluck('password');

        // Fetch encrypted passwords from the dashboards table
        $encryptedPasswords = DB::table('dashboards')->pluck('yourPassword');

        // Placeholder arrays for categorized passwords
        $weakPasswords = collect();
        $compromisedPasswords = collect();
        $duplicatePasswords = collect();
        $strongPasswords = collect();

        // Function to determine if a password is strong
        function isStrongPassword($password) {
            return strlen($password) >= 8 && preg_match('/[a-z]/', $password) &&
                   preg_match('/[A-Z]/', $password) && preg_match('/[0-9]/', $password) &&
                   preg_match('/[\W]/', $password);
        }

        // Categorize hashed passwords
        foreach ($hashedPasswords as $password) {
            // Check for weak passwords
            if (!Hash::check('yourLoginPassword', $password)) {
                $weakPasswords->push($password);
            } else {
                $strongPasswords->push($password);
            }

            // Here you'd integrate with a compromised password checking service
            // If compromised, add to $compromisedPasswords collection
        }

        // Decrypt and categorize encrypted passwords
        foreach ($encryptedPasswords as $password) {
            $decryptedPassword = Crypt::decryptString($password);
            // Check for weak passwords
            if (!isStrongPassword($decryptedPassword)) {
                $weakPasswords->push($decryptedPassword);
            } else {
                $strongPasswords->push($decryptedPassword);
            }

            // Here you'd integrate with a compromised password checking service
            // If compromised, add to $compromisedPasswords collection
        }

        // Combine all passwords into a single collection
        $allPasswords = $hashedPasswords->merge($encryptedPasswords);

        // Find duplicates in the combined collection
        $duplicatePasswords = $allPasswords->duplicates();

        // Now for visualization, let's pass the counts to the view
        $passwordCounts = [
            'total' => $allPasswords->count(),
            'weak' => $weakPasswords->count(),
            'compromised' => $compromisedPasswords->count(),
            'duplicates' => $duplicatePasswords->count(), // Count duplicates
            'strong' => $strongPasswords->count(),
        ];

        return view('analysis', ['passwordCounts' => $passwordCounts]);
    }
}
