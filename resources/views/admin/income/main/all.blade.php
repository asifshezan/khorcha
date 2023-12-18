@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8"><h4>Income Information</h4></div>
                    <div class="col-md-4 card_button">
                        <a href="{{ url('dashboard/income/add') }}" class="btn btn-md btn-dark"><i class="mdi mdi-plus-circle me-1"> Add Income Category</i></a>
                    </div>
                </div>

            </div>
            <div class="card-body card_body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Income Date</th>
                            <th>Income Title</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                        <tr>
                            <td>{{ $data-> income_date }}</td>
                            <td>{{ $data-> income_title }}</td>
                            <td>{{ $data-> category->incate_name}}</td>
                            <td>{{ $data-> income_amount }}</td>
                            <td>
                                <!-- Info -->
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('dashboard/income/view/'.$data->income_slug)}}">View</a>
                                        <a class="dropdown-item" href="{{url('dashboard/income/edit/'.$data->income_slug)}}">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                                           
            </div> <!-- end card body-->
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
