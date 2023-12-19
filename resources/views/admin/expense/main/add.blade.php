@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('dashboard/expense/submit')}}">
            @csrf
            <div class="card">
                <div class="card-header card_header">
                    <div class="row">
                        <div class="col-md-8"><h4>Expense Information</h4></div>
                        <div class="col-md-4 card_button">
                            <a href="{{ url('dashboard/expense')}}" class="btn btn-md btn-dark"><i class="mdi mdi-reorder-horizontal me-1"> All Expense</i></a>
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
                    <div class="row mb-3 {{ $errors-> has('exp_title') ? 'has-error' : ''}}">
                        <label class="col-3 col-form-label col_form_label">Expense Title<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="exp_title" placeholder="Enter Title" value="{{old('exp_title')}}">
                            @if ($errors->has('exp_title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('exp_title')}}</strong>
                            </span>
                        @endif
                        </div>
                    </div> 
                    
                    <div class="row mb-3 {{ $errors->has('exp_category') ? 'has-error' : ''}}">
                        <label class="col-3 col-form-label col_form_label">Expense Category<span class="req_star">*</span>:</label>
                        @php
                            $allexp = App\Models\ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','ASC')->get();
                        @endphp
                        <div class="col-7">
                            <select class="form-control" name="exp_category">
                                <option value="">Select an option</option>
                                @foreach ($allexp as $cate)
                                <option value="{{ $cate->expcate_id }}">{{ $cate->expcate_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('exp_category'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('exp_category')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>    
                    <div class="row mb-3 {{ $errors-> has('exp_date') ? 'has-error' : ''}}">
                        <label class="col-3 col-form-label col_form_label">Expense Date<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="date" class="form-control" name="exp_date" id="myDate" placeholder="Enter Date" value="{{old('exp_date')}}">
                            @if ($errors->has('exp_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('exp_date')}}</strong>
                            </span>
                        @endif
                        </div>
                    </div>   
                    <div class="row mb-3 {{ $errors-> has('exp_amount') ? 'has-error' : ''}}">
                        <label class="col-3 col-form-label col_form_label">Expense Amount<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="exp_amount" placeholder="Enter Amount" value="{{old('exp_amount')}}">
                            @if ($errors->has('exp_amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('exp_amount')}}</strong>
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
