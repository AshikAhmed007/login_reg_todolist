<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function process_login(Request $request){
        $request->validate(
        [
            'username'=>'required',
            'password'=>'required',
        ]);

        $credential=$request->only('username','password');

        if(Auth::attempt($credential)){
            $user=Auth::user();
            if ($user->status==0) {
                return redirect('login')->with('error','Wait for account activation');
            }else{
            if($user->level=='admin'){
                return redirect()->intended('admin');
            }elseif($user->level=='User'){
                return redirect()->intended('user');
            }
            return redirect()->intended('/');
        }
    }
            return redirect('login');

    }

    

    public function registration(){
        return view('registration');
    }
     public function process_reg(Request $request){
       $request->validate(
        [
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            
        ]);
        $user=new User();
        $user->name=$request->name;   
        $user->username=$request->username;   
        $user->email=$request->email;   
        $user->password=Hash::make($request->password);   
        $user->level='User';
        $user->status=0;
        $user->save();   

        return redirect('login');

    }

    public function reset_password()
    {
        return view('reset_password');
    }

    public function password_update(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->old_password;
      $newpass=$request->new_password;
      $confirm=$request->confirm_password;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->new_password);
                      $user->save();
                      Auth::logout();  
                       return Redirect()->route('login'); 
                 }else{
                       return Redirect()->back();
                 }     
      }else{
        
               return Redirect()->back();
      }
    }


    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
