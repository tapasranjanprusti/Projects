<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function adminIndex(){
        return view('Auth.loginPage');
    
      }
    
      public function logInCheck(Request $request){
        $input=$request->all();


        $user = User::where('Mob', $input['uname'])->first();

        if ($user && $user->password === $input['upass']) {
        
            Session::put('admin_id', $user->id);
            Session::put('logInUsername', $user->name);
            Session::put('role', $user->role);
            Session::put('office', $user->officeId);
            Session::put('marketComplex', $user->marketComplexId);
            
            return redirect()->route('dashboard');
        } else {
          
            return back()->withErrors(['message' => 'Invalid credentials'])->withInput();
        }
      }

      public function logout()
      {
          // Auth::guard('adminUserGuard')->logout();
          Session::forget('admin_id');
          return redirect()->route('adminLogin'); 
      }
}
