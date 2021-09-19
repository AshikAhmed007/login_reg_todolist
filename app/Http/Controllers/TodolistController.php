<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use Illuminate\Support\Facades\Auth;


class TodolistController extends Controller
{
    public function show(){
        $tasks=Todolist::latest()->get(); 
         
        return view('dashboard',compact('tasks')); 
    }

    public function store(Request $req){
    $store=new Todolist;
    $store->task_name=$req->task_name;
    $store->user_id=Auth::user()->id;
    $store->status=0;
    $store->save($this->validateArticle());
    return Redirect()->back();
    }


    public function delete(Todolist $taskById){
    $taskById->delete();
    return Redirect()->back();
    }


    public function inactive($id){
        Todolist::where('id',$id)->update(['status'=>0]);
        
      return Redirect()->route('tasks');
    }

    public function active($id){
        Todolist::where('id',$id)->update(['status'=>1]);
        
    return Redirect()->route('tasks');
    }

    protected function validateArticle(){
    return request()->validate([
        'task_name'=>'required | unique:todolists',
        
    ]);

}
}
