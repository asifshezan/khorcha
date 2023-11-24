@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
            <div class="card">
                <div class="card-header card_header">
                    <div class="row">
                        <div class="col-md-8"><h4>User Registration</h4></div>
                        <div class="col-md-4 card_button">
                            <a href="{{ url('dashboard/user')}}" class="btn btn-md btn-dark"><i class="mdi mdi-reorder-horizontal me-1"> All User</i></a>
                        </div>
                    </div>

                </div>
                <div class="card-body card_body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="" placeholder="your name">
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Phone<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="" placeholder="phone number">
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="text" class="form-control" name="" placeholder="email address">
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="password" class="form-control" name="" placeholder="password">
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Confirm Password<span class="req_star">*</span>:</label>
                        <div class="col-7">
                            <input type="password" class="form-control" name="" placeholder="confirm password">
                        </div>
                    </div>      
                    <div class="row mb-3">
                        <label class="col-3 col-form-label col_form_label">Select Role<span class="req_star">*</span>:</label>
                        <div class="col-4">
                            <Select class="form-control" name="">
                                <option value="">Select an option</option>
                                <option value="">SuperAdmin</option>
                                <option value="">Admin</option>
                            </Select>
                        </div>
                    </div>                       
                </div> <!-- end card body-->
                <div class="card-footer card_footer text-center">
                    <button type="submit" class="btn btn-md btn-primary">Register</button>
                </div>
            </div> <!-- end card -->
        </form>
    </div><!-- end col-->
</div>
@endsection
