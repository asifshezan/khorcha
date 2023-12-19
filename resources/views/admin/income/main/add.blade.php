@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('dashboard/income/submit')}}">
            @csrf
            <div class="card">
                <div class="card-header card_header">
                    <div class="row">
                        <div class="col-md-8"><h4> My Income Information</h4></div>
                        <div class="col-md-4 card_button">
                            <a href="{{ url('dashboard/income')}}" class="btn btn-md btn-dark"><i class="mdi mdi-reorder-horizontal me-1"> All Income</i></a>
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
                    <div class="row mb-3 {{ $errors->has('income_title') ? 'has-error' : '' }}">
                        <label class="col-3 col-form-label col_form_label">Income Title<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control form_control" name="income_title" placeholder="enter title" value="{{old('income_title')}}"> 
                            @if($errors->has('income_title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('income_title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> 
                    @php
                        $allcate = App\Models\IncomeCategory::where('incate_status',1)->orderBy('incate_name','ASC')->get();
                    @endphp
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Income Category<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <select class="form-control" name="income_category">
                                <option value="">Selecte Category</option>
                                @foreach ($allcate as $cate)
                                    <option value="{{ $cate->incate_id }}">{{ $cate->incate_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('income_category'))
                            <span class='invalid-feedback' role="alert">
                                <strong>{{ $errors->first('income_category') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>   
                    <div class="row mb-3 {{ $errors->has('income_date') ? 'has-error' : '' }}">
                        <label class="col-3 col-form-label col_form_label">Income Date<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="date" class="form-control form_control" name="income_date" id="myDate" value="{{old('income_date')}}"> 
                            @if($errors->has('income_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('income_date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>      
                    <div class="row mb-3 {{ $errors->has('income_amount') ? 'has-error' : '' }}">
                        <label class="col-3 col-form-label col_form_label">Income Amount<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control form_control" name="income_amount" value="{{old('income_amount')}}"> 
                            @if($errors->has('income_amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('income_amount') }}</strong>
                            </span>
                            @endif
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
