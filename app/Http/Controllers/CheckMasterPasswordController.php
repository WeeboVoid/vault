<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckMasterPasswordController extends Controller
{
    public function checkMasterPassword(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            if (isset($user->master_password)) {
                $masterPassword = $user->master_password;
                $decodeMasterPassword = decrypt($masterPassword);
                if ($request->master_password_login == $decodeMasterPassword) {
                    DB::table('users')->where('id', $user->id)->update(['master_password_set' => 1]);
                    return redirect('dashboard'); // change me to fisal view (dashboard -> list)
                } else {
                    return view('login-masterPassword')->with('error', 'The master password is incorrect.');
                }
            } else {
                // 'master_password' column does not exist
                echo "The 'master_password' column does not exist for the currently logged-in user.";
            }
        } else {
            // No user is logged in
            echo "No user is currently logged in.";
        }
    }
}
