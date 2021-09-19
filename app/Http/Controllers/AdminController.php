<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
      public function index(){
        $user=User::where('level','User')->latest()->get();
        $admin=User::where('level','admin')->latest()->get();
        return view('dashboard',compact('user','admin'));
    }

public function inactive($id){
        User::where('id',$id)->update(['status'=>0]);
        
      return Redirect()->route('admin');
    }

    public function active($id){
        User::where('id',$id)->update(['status'=>1]);
        
    return Redirect()->route('admin');
    }

    public function delete(User $id){
      $id->delete();
     return Redirect()->back();
    }

}
