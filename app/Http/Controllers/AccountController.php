<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\User;

class AccountController extends Controller
{
    public function deleteAccount(Request $request)
    {
        $user = User::find(auth()->id());
        $loginPassword = $request->input('login_password');
        $inputMasterPassword = $request->input('master_password');
        
        if (Hash::check($loginPassword, $user->password)) {
            try {
                $decryptedMasterPassword = decrypt($user->master_password);

                if ($inputMasterPassword === $decryptedMasterPassword) {
                    if ($request->has('confirmation')) {
                        // Use forceDelete to permanently remove the user record from the database
                        $user->forceDelete(); 
                        return redirect()->route('index')->with('message', 'Account successfully deleted.');
                    } else {
                        return back()->withErrors(['confirmation' => 'You must confirm that you want to delete your account.']);
                    }
                } else {
                    return back()->withErrors(['master_password' => 'The provided credentials does not match our records.']);
                }
            } catch (DecryptException $e) {
                return back()->withErrors(['master_password' => 'Something Went Wrong!']);
            }
        } else {
            return back()->withErrors(['login_password' => 'The provided credentials does not match our records.']);
        }
    }


    public function changeMaster(Request $request)
    {
        $user = User::find(auth()->id());
        $loginPassword = $request->input('login_password');
        $inputMasterPassword = $request->input('master_password');
        
        if (Hash::check($loginPassword, $user->password)) {
            try {
                $decryptedMasterPassword = decrypt($user->master_password);

                if ($inputMasterPassword === $decryptedMasterPassword) {
                        // Use forceDelete to permanently remove the user record from the database
                        // let has_visited be 0
                        $user->update([
                            'master_password' => null,
                            'has_visited' => 0,
                        ]);
                        return view('register-step2');

                } else {
                    return back()->withErrors(['master_password' => 'The provided credentials does not match our records.']);
                }
            } catch (DecryptException $e) {
                return back()->withErrors(['master_password' => 'Something Went Wrong!']);
            }
        } else {
            return back()->withErrors(['login_password' => 'The provided credentials does not match our records.']);
        }
    }

    public function changeLoginPassword(Request $request)
    {
        $user = User::find(auth()->id());
        $OldloginPassword = $request->input('old_login_password');
        $newLoginPassword = $request->input('new_login_password');
        $reEnterLoginPassword = $request->input('re_enter_login_password');
        
        if (Hash::check($OldloginPassword, $user->password)) {
            if ($newLoginPassword === $reEnterLoginPassword) {
                $user->password = Hash::make($newLoginPassword);
                $user->save();
                return view('sideBar');
            } else {
                return back()->withErrors(['re_enter_login_password' => 'The New Login Passwords are not the same.']);
            }
        } else {
            return back()->withErrors(['login_password' => 'Your Old Login Password is incorrect.']);
        }
    }

}
