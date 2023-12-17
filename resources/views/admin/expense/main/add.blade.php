@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('dashboard/expense/category/submit')}}">
            @csrf
            <div class="card">
                <div class="card-header card_header">
                    <div class="row">
                        <div class="col-md-8"><h4>Expense Category Information</h4></div>
                        <div class="col-md-4 card_button">
                            <a href="{{ url('dashboard/expense/category')}}" class="btn btn-md btn-dark"><i class="mdi mdi-reorder-horizontal me-1"> All Category</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body card_body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                              </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error')}}
                              </div>
                              @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row mb-3 {{ $errors-> has('exp_name') ? 'has-error' : ''}}">
                        <label class="col-3 col-form-label col_form_label">Expense Category Name<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="exp_name" placeholder="enter category name" value="{{old('exp_name')}}">
                            @if ($errors->has('exp_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('exp_name')}}</strong>
                            </span>
                        @endif
                        </div>
                    </div> 
                    
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Expense Category Remarks<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="exp_remarks" placeholder="enter category remarks" value="{{old('exp_remarks')}}">
                        </div>
                    </div>                          
                </div> <!-- end card body-->
                <div class="card-footer card_footer text-center">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </div> <!-- end card -->
        </form>
    </div><!-- end col-->
</div>
@endsection
