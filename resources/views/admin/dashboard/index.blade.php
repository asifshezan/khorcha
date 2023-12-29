@extends('layouts/admin')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12">

        <div class="row">
            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        @php
                            $totaluser = App\Models\user::count();
                        @endphp
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Users</h5>
                        <h3 class="mt-3 mb-3">
                            @if($totaluser < 10)
                            0{{ $totaluser }}
                            @else
                            {{ $totaluser }}
                            @endif
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon"></i>
                        </div>
                        @php
                            $totalIncome = App\Models\Income::where('income_status',1)->sum('income_amount');
                        @endphp
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Income</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($totalIncome,2) }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->


            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon"></i>
                        </div>
                        @php
                            $totalExpense = App\Models\Expense::where('expense_status',1)->sum('expense_amount');
                        @endphp
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Expense</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($totalExpense,2) }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        @php
                            $totalSevings = $totalIncome - $totalExpense;
                        @endphp
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Total Sevings</h5>
                        <h3 class="mt-3 mb-3">{{ number_format($totalSevings,2) }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- end col -->
</div>

                        
@endsection