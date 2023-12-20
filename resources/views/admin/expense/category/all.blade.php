@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card_header">
                <div class="row">
                    <div class="col-md-8"><h4>Expense Category Information</h4></div>
                    <div class="col-md-4 card_button">
                        <a href="{{ url('dashboard/expense/category/add') }}" class="btn btn-md btn-dark"><i class="mdi mdi-plus-circle me-1"> Add Expense Category</i></a>
                    </div>
                </div>
            </div>
            <div class="card-body card_body">
                <table id="allTableInfo" class="table table-bordered table-striped dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Expense Category Name</th>
                            <th>Expense Category Remarks</th>
                            <th>Total Expense</th>
                            <th>Expense Category Creator</th>
                            <th>Expense Category Editor</th>
                            <th>Slug</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allexp as $data)
                        <tr>
                            <td>{{ $data-> expcate_name }}</td>
                            <td>{{ $data-> expcate_remarks }}</td>
                            <td>
                                @php
                                $cateId = $data->expcate_id;
                                $totalExpense = App\Models\Expense::where('expense_status',1)->where('expcate_id',$cateId)->sum('expense_amount');
                                @endphp
                                {{number_format($totalExpense,2)}}
                            </td>
                            <td>{{ $data-> creatorrInfo-> name }}</td>
                            <td>{{ $data-> expcate_editor }}</td>
                            <td>{{ $data-> expcate_slug }}</td>
                            <td>
                                <!-- Info -->
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('dashboard/expense/category/view/'.$data->expcate_slug)}}">View</a>
                                        <a class="dropdown-item" href="{{url('dashboard/expense/category/edit/'.$data->expcate_slug)}}">Edit</a>
                                        <a class="dropdown-item" href="#">delete</a>
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
