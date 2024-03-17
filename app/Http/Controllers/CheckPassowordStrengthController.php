<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt; // Add this line
use App\Models\Dashboard;
use App\Models\word_list;

class CheckPassowordStrengthController extends Controller
{
    public function index()
    {
        $dashboardEntries = Dashboard::where('user_id', Auth::id())->get();

        // Decrypt the password for each entry before sending to the view
        $dashboardEntries = $dashboardEntries->map(function ($entry) {
            try {
                $entry->yourPassword = Crypt::decryptString($entry->yourPassword);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                $entry->yourPassword = 'Error decrypting password';
            }
            return $entry;
        });
        $userData = word_list::where('user_id', Auth::id())->first();

        // Convert data to dictionary
        $dictionary = [
            'firstname' => $userData->firstname ?? null,
            'middlename' => $userData->middlename ?? null,
            'lastname' => $userData->lastname ?? null,
            'nickname' => $userData->nickname ?? null,
            'DOB' => $userData->DOB ?? null,
            'phone' => $userData->phone ?? null,
            'favcolor' => $userData->favcolor ?? null,
            'petname' => $userData->petname ?? null,
            'partnername' => $userData->partnername ?? null,
        ];

        return view('password-check', compact('dashboardEntries'), compact('dictionary'));
    }

}
