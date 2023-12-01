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
    
    public function edit($slug){
        $data = ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
        return view('admin.expense.category.edit', compact('data'));
    }

    public function view($slug){
        $data = ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
        return view('admin.expense.category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request, [
            'exp_name' => 'required|max:100|unique:expense_categories,expcate_name',
        ], [
            'exp_name.required' => 'Please insert the expense category name.'
        ]);

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
            Session::flash('success','Successfully add income category.');
            return redirect('dashboard/expense/category');
        }else{
            Session::flash('error','Opss! Sorry, try again.');
            return redirect('dashboard/expense/category/all');
        }
        
    }

    public function update(Request $request){
        $id=$request['id'];
        $this->validate($request,[
          'exp_name'=>'required|max:100|unique:expense_categories,expcate_name,'.$id.',expcate_id',
        ],[
          'exp_name.required'=>'Please enter expense category name!',
          'exp_name.unique'=>'Expense category name has already been taken!',
        ]);
  
        $slug=Str::slug($request['exp_name'],'-');
        $editor=Auth::user()->id;
  
        $update=ExpenseCategory::where('expcate_status',1)->where('expcate_id',$id)->update([
          'expcate_name'=>$request['exp_name'],
          'expcate_remarks'=>$request['exp_remarks'],
          'expcate_editor'=>$editor,
          'expcate_slug'=>$slug,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
  
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/expense/category/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/expense/category/edit/'.$slug);
        }
      }

    public function softdelete(){
        
    }

    public function delete(){
        
    }

}
