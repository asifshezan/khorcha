<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Session;

class IncomeCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $allcate = IncomeCategory::where('incate_status',1)->orderBy('incate_id','DESC')->get();
        return view('admin.income.category.all',compact('allcate'));
    }

    public function add(){
        return view('admin.income.category.add');
    }

    public function edit(){
        
    }

    public function view($slug){
        $data = IncomeCategory::where('incate_status',1)->where('incate_slug',$slug)->firstOrFail();
        return view('admin.income.category.view',compact('data'));
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
