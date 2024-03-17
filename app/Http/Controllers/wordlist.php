<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\word_list;

class wordlist extends Controller
{
    public function index()
    {
        return view('custome-wordlist');
    }

    public function add(Request $request)
    {
        $request->validate([
            'firstname' => 'nullable',
            'middlename' => 'nullable', 
            'lastname' => 'nullable',
            'nickname' => 'nullable',
            'DOB' => 'nullable',
            'phone' => 'nullable',
            'favcolor' => 'nullable',
            'petname' => 'nullable',
            'partnername' => 'nullable'
        ]);
    
        // Retrieve authenticated user's data
        $userData = word_list::where('user_id', Auth::id())->first();
    
        // Prepare data to be inserted or updated
        $data = [
            'user_id' => Auth::id(),
            'firstname' => $request->input('firstname') ?? $userData->firstname ?? null,
            'middlename' => $request->input('middlename') ?? $userData->middlename ?? null,
            'lastname' => $request->input('lastname') ?? $userData->lastname ?? null,
            'nickname' => $request->input('nickname') ?? $userData->nickname ?? null,
            'DOB' => $request->input('DOB') ?? $userData->DOB ?? null,
            'phone' => $request->input('phone') ?? $userData->phone ?? null,
            'favcolor' => $request->input('favcolor') ?? $userData->favcolor ?? null,
            'petname' => $request->input('petname') ?? $userData->petname ?? null,
            'partnername' => $request->input('partnername') ?? $userData->partnername ?? null
        ];
    
        // Insert or update data
        $query = word_list::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );
    
        if ($query) {
            return back()->with('success', 'Data has been successfully inserted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
