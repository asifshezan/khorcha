@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <form class="form-horizontal" method="post" action="{{url('dashboard/expense/category/update')}}" enctype="multipart/form-data">
      @csrf
      <div class="card">
          <div class="card-header card_header">
              <div class="row">
                <div class="col-md-8 card_header_title">
                  <i class="mdi mdi-contactless-payment-circle"></i> Update Expense Category Information
                </div>
                <div class="col-md-4 card_button_part">
                  <a class="btn btn-md btn-dark" href="{{url('dashboard/expense/category')}}"><i class="mdi mdi-reorder-horizontal me-1"></i> <span>All Category</span> </a>
                </div>
              </div>
          </div>
          <div class="card-body card_body">
            <div class="row mb-3 {{ $errors->has('exp_name') ? ' has-error' : '' }}">
                <label class="col-3 col-form-label col_form_label">Category Name<span class="req_star">*</span>:</label>
                <div class="col-7">
                    <input type="hidden" name="id" value="{{$data->expcate_id}}">
                    <input type="text" class="form-control form_control" name="exp_name" value="{{$data->expcate_name}}">
                    @if ($errors->has('exp_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('exp_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-3 col-form-label col_form_label">Remarks:</label>
                <div class="col-7">
                    <input type="text" class="form-control form_control" name="exp_remarks" value="{{$data->expcate_remarks}}">
                </div>
            </div>
          </div>
          <div class="card-footer card_footer text-center">
              <button type="submit" class="btn btn-md btn-dark">UPDATE</button>
          </div>
      </div>
    </form>
  </div>
</div>
@endsection
