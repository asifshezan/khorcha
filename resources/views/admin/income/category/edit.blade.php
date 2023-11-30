@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('dashboard/income/category/update')}}">
            @csrf
            <div class="card">
                <div class="card-header card_header">
                    <div class="row">
                        <div class="col-md-8"><h4>Update Income Category Information</h4></div>
                        <div class="col-md-4 card_button">
                            <a href="{{ url('dashboard/income/category')}}" class="btn btn-md btn-dark"><i class="mdi mdi-reorder-horizontal me-1"> All Income Category</i></a>
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
                                {{Session::get('error')}}
                              </div>
                            @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Income Category Name<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="hidden" name="id" value="{{$data->incate_id}}">
                            <input type="text" class="form-control" name="incate_name" placeholder="enter category name" value="{{$data->incate_name}}">
                        </div>
                    </div> 
                    
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Income Category Remarks<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="incate_remarks" placeholder="enter category remarks" value="{{$data->incate_remarks}}">
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
