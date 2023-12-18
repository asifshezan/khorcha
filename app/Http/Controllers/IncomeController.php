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

   public function insert(Request $request){
      $this->validate($request, [
         'income_title' => 'required',
         'income_category' => 'required',
         'income_date' => 'required',
         'income_amount' => 'required'
      ], [
         'income_title.required' => "Please insert income title",
         'income_category.required' => "Please select the income category",
         'income_date.required' => "Please select the income date",
         'income_amount.required' => "Please insert the income amount"
      ]);

      $slug = uniqid('INC');
      $creator = Auth::user()->id;
      $insert = Income::insert([
         'income_title' => $request['income_title'],
         'incate_id' => $request['income_category'],
         'income_date' => $request['income_date'],
         'income_amount' => $request['income_amount'],
         'income_slug' => $slug,
         'income_creator' => $creator,
         'created_at' => Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
         Session::flash('success','Successfully income insert');
         return redirect('dashboard/income/add');
      }else{
         Session::flash('error','Opps! Failed to income insert');
         return redirect('dashboard/income/add');
      }
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
