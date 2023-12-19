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
    
       public function update(){
    
       }
    
       public function softdelete(){
    
       }
    
       public function restore(){
    
       }
    
       public function delete(){
        
       }
}
