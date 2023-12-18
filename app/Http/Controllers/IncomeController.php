<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Income;
use Carbon\Carbon;
use Session;
use Auth;

class IncomeController extends Controller
{
   public function __construct(){
    $this->middleware('auth');
   }

   public function index(){
    $all = Income::where('income_status',1)->orderBy('income_id','DESC')->get();
    return view('admin.income.main.all', compact('all'));
   }

   public function add(){
    return view('admin.income.main.add');
   }

   public function edit(){

   }

   public function view(){

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
