<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Session;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $allUser = User::orderBy('id','DESC')->get();
        return view('admin.user.all', compact('allUser'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function edit(){
        
    }

    public function view($id){
        $data = User::orderBy('id','ASC')->firstOrFail();
        return view('admin.user.view',compact('data'));
    }

    public function insert(){
        
    }

    public function update(){
        
    }

    public function softdelete(){
        
    }

    public function restore(){
        
    }

    public function delete(){
        
    }
}
