<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Expense;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
       }
    
       public function index(){
        $all = Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
        return view('admin.expense.main.all', compact('all'));
       }
    
       public function add(){
        return view('admin.expense.main.add');
       }
    
       public function edit(){
    
       }
    
       public function view(){
    
       }

       Public function insert(Request $_request){
        $this->validate($_request, [
            'exp_title' => 'required',
            'exp_date' => 'required',
            'exp_amount' => 'required',
            'exp_category' => 'required'
        ], [
            'exp_title.required' => "Please enter the expense title.",
            'exp_date.required' => 'Please pick up a date',
            'exp_amount.required' => 'Please write the expense amount',
            'exp_category.required' => 'Please select the category'
        ]);

        $slug = uniqid('EXP');
        $creator = Auth::user()->id;
        $insertdata = Expense::insert([
            'expense_title' => $_request['exp_title'],
            'expcate_id' => $_request['exp_category'],
            'expense_date' => $_request['exp_date'],
            'expense_amount' => $_request['exp_amount'],
            'expense_slug' => $slug,
            'expense_creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insertdata){
            Session::flash('success', 'Successfully insert the expense');
            return redirect('dashboard/expense/add');
        }else{
            Session::flash('error', 'Opps! Failed to insert the expense');
            return redirect('dashboard/expense/add');
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
