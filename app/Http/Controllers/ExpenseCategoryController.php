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
        return view('admin.expense.category.all', compact('allexp'));
    }

    public function add(){
        return view('admin.expense.category.add');
    }
    
    public function edit(){
        
    }

    public function view($slug){
        $data = ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
        return view('admin.expense.category.view', compact('data'));
    }

    public function insert(Request $request){
        $slug = Str::slug($request['exp_name'], '-');
        $creator = Auth::user()->id;
        $insert = ExpenseCategory::insert([
            'expcate_name' => $request['exp_name'],
            'expcate_remarks' => $request['exp_remarks'],
            'expcate_creator' => $creator,
            'expcate_slug' => $slug,
            'expcate_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            return redirect('dashboard/expense/category');
        }else{
            return redirect('dashboard/expense/category/all');
        }
        
    }

    public function update(){
        
    }

    public function softdelete(){
        
    }

    public function delete(){
        
    }

}
