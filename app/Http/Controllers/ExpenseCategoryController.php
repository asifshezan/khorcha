<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenseCategoryController extends Controller
{
    public function __contruct(){
        return $this->middleware('auth');
    }

    public function index(){
        $allexp = ExpenseCategory::where('expcate_status', 1)->orderBy('expcate_id', 'DESC')->get();
        return view('dashboard.expense.category', compact('allexp'));
    }

    public function add(){
        return view('dashboard.expense.category.add');
    }
    
    public function edit(){
        
    }

    public function view(){
        
    }

    public function insert(){
        
    }

    public function update(){
        
    }

    public function softdelete(){
        
    }

    public function delete(){
        
    }

}
