<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ensure you have this line
use Illuminate\Support\Facades\Log; // Add this line

class RegisterStepTwoController extends Controller
{
    public function create(){
        return view('register-step2');
    }

    public function store(Request $request){
        $user = User::find(auth()->user()->id);
        
        // Encrypt the master_password before saving it
        $encryptedMasterPassword = encrypt($request->master_password);
        
        // Log the encrypted master_password for debugging purposes
        
        // Just for debugging, let's decrypt it right away to see what we get
        $decryptedMasterPassword = decrypt($encryptedMasterPassword);    
        $user->update([
            'master_password' => $encryptedMasterPassword,
            'has_visited' => 1,
        ]);
    
        return view('sideBar');
    }
    

    /**  If you want to decrtpt the master_password, you can use the following code:
            try {
                $decryptedMasterPassword = decrypt($user->master_password);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // Handle the error
            }
    */
}
