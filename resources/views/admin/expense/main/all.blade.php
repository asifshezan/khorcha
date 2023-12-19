@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8"><h4>Expense Information</h4></div>
                    <div class="col-md-4 card_button">
                        <a href="{{ url('dashboard/expense/add') }}" class="btn btn-md btn-dark"><i class="mdi mdi-plus-circle me-1"> Add Expense</i></a>
                    </div>
                </div>
            </div>
            <div class="card-body card_body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Expense Date</th>
                            <th>Expense Title</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($data->expcate_date)) }}</td>
                            <td>{{ $data-> expense_title }}</td>
                            <td>{{ $data-> expcate_id}}</td>
                            <td>{{ $data-> expense_amount }}</td>
                            <td>
                                <!-- Info -->
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('dashboard/expense/view/'.$data->expense_slug)}}">View</a>
                                        <a class="dropdown-item" href="{{url('dashboard/expense/edit/'.$data->expense_slug)}}">Edit</a>
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
