<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DashboardEntriesExport;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Imports\DashboardImport;


class DashboardController extends Controller
{
    public function index()
    {
        $dashboardEntries = Dashboard::where('user_id', Auth::id())->get();

        // Decrypt the password for each entry before sending to the view
        $dashboardEntries = $dashboardEntries->map(function ($entry) {
            try {
                //$entry->yourPassword = Crypt::decryptString($entry->yourPassword);
                $entry->yourPassword = Crypt::decryptString($entry->yourPassword);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                $entry->yourPassword = 'Error decrypting password';
            }
            return $entry;
        });

        return view('dashboard.index', compact('dashboardEntries'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'websiteUrl' => 'required|url',
            'yourEmail' => 'required|email',
            'yourPassword' => 'required|min:0',
        ]);

        // Encrypt the password before saving to the database
        $validatedData['yourPassword'] = Crypt::encryptString($validatedData['yourPassword']);
        $validatedData['user_id'] = Auth::id();

        Dashboard::create($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Entry created successfully.');
    }

    public function edit(Dashboard $dashboard)
    {
        // Decrypt the password before editing
        try {
            $dashboard->yourPassword = Crypt::decryptString($dashboard->yourPassword);
            
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            $dashboard->yourPassword = 'Error decrypting password';
        }

        return view('dashboard.edit', compact('dashboard'));
    }

    public function update(Request $request, Dashboard $dashboard)
    {
        $validatedData = $request->validate([
            'websiteUrl' => 'required|url',
            'yourEmail' => 'required|email',
            'yourPassword' => 'nullable|min:0',
        ]);

        // Only update and encrypt the password if a new one is provided
        if ($request->filled('yourPassword')) {
            $validatedData['yourPassword'] = Crypt::encryptString($request->yourPassword);
        } else {
            unset($validatedData['yourPassword']);
        }

        $dashboard->update($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Entry updated successfully.');
    }

    public function destroy(Dashboard $dashboard)
    {
        $dashboard->delete();
        return back()->with('success', 'Entry deleted successfully.');
    }

    // public function export()
    // {
    //     return Excel::download(new DashboardEntriesExport, 'dashboard-entries.xlsx');
    // }


    public function export()
{
    // Fetch the authenticated user
    $user = Auth::user();

    // Decrypt the user's master password
    $masterPassword = decrypt($user->master_password);

    // Instantiate the export class with the decrypted password
    $dashboardExport = new DashboardEntriesExport($masterPassword);

    // Call the export method which handles creating the Excel file, zipping it, and encrypting it
    return $dashboardExport->export();
}

public function importExcel(Request $request)
{
    // Validate the request to ensure the uploaded file is a .xlsx file
    $request->validate([
        'excel_file' => 'required|file|mimes:xlsx',
    ]);

    try {
        $user = Auth::user(); // Get the authenticated user
        

        Excel::import(new DashboardImport($user->id), $request->file('excel_file'));

        return back()->with('success', 'Data imported successfully.');
    } catch (\Exception $e) {
        // Handle the exception
        return back()->withErrors(['excel_file' => 'There was an error processing your file. Please ensure it is a valid .xlsx file and try again.']);
    }
}

}
