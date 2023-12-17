@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8"><h4>View Income Category Information</h4></div>
                    <div class="col-md-4 card_button">
                        <a href="{{ url('dashboard/income/category') }}" class="btn btn-md btn-dark"><i class="mdi mdi-plus-circle me-1"> All Income Category</i></a>
                    </div>
                </div>
            </div>
            <div class="card-body card_body">
                <div class="row">
                  <div class="col-2"></div>
                  <div class="col-8">
                    <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>Income Category Name</td>
                        <td>:</td>
                        <td>{{ $data->incate_name }}</td>
                      </tr>
                      <tr>
                        <td>Income Category Remarks</td>
                        <td>:</td>
                        <td>{{ $data->incate_remarks }}</td>
                      </tr>
                      <tr>
                        <td>Income Category Creator</td>
                        <td>:</td>
                        <td>{{ $data->creatorInfo->name }}</td>
                      </tr>
                      <tr>
                        <td>Income Category Editor</td>
                        <td>:</td>
                        <td>
                          @if($data->incate_editor!='')
                          {{ $data->editorInfo->name }}
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Slug</td>
                        <td>:</td>
                        <td>{{ $data->incate_slug }}</td>
                      </tr>
                    <tr>
                      <td>Created Time</td>
                      <td>:</td>
                      <td>{{ $data->created_at->format('d-m-Y | h:i:s a') }}</td>
                    </tr>
                    <tr>
                      <td>Edited Time</td>
                      <td>:</td>
                      <td>
                        @if($data->updated_at!='')
                        {{ $data->updated_at->format('d-m-Y | h:i:s a') }}
                        @endif
                      </td>
                    </tr>
                    </table>
                  </div>
                  <div class="col-2"></div>
                </div>
            </div>
            <div class="card-footer card_footer">
                <div class="btn-group mb-2">
                    <a type="#" class="btn btn-primary">Print</a>
                    <a type="#" class="btn btn-secondary">PDF</a>
                    <a type="#" class="btn btn-success">Excel</a>
                </div>
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
