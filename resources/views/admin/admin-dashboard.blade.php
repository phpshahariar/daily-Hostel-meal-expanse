@extends('admin.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

        @php
            $totalmeal = 0
        @endphp
        @foreach($totalMeal as $key => $Info)
            @php
                $totalmeal = ($totalmeal + ($Info->breakfast+$Info->lunch+$Info->dinner));
            @endphp
        @endforeach
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Grand Total Meal (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalmeal}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Meal Rate</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($depositAmount/$totalmeal, 2)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @php
            $sum = 0
        @endphp
        @foreach($deposit as $key => $show)
            @php
                $sum = ($sum + ($show->balance));
            @endphp
        @endforeach
            <!-- Earnings (Monthly) Card Example -->

            @if($totalDeposit == 0)

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body bg-danger">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><b style="color: white;">Empty Balance</b></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <b style="color: white;">TK.{{ number_format($totalDeposit, 2) }}</b>
                                            </div>
                                            <p style="color: white; font-weight: bold;">Main Tk. {{ number_format($depositAmount, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($totalDeposit < 1000)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body bg-warning">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><b style="color: #ffffff;">Running Low Balance</b></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                TK.{{ number_format($totalDeposit, 2) }}
                                            </div>
                                            <p style="color: white; font-weight: bold;">Main Tk. {{ number_format($depositAmount, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else($totalDeposit > 1000)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body bg-success">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><b style="color: #ffffff;">Total Deposit Balance</b></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                TK. {{ number_format($totalDeposit, 2) }}
                                            </div>
                                            <p style="color: white; font-weight: bold;">Main Tk. {{ number_format($depositAmount, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
                @php
                    $sum = 0
                @endphp
                @foreach($show_expanse as $key => $show)
                    @php
                        $sum = ($sum + ($show->expanse));
                    @endphp
                @endforeach

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Expanse</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Tk.{{number_format($sum, 2)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $sum = 0
            @endphp
            @foreach($totalBorder as $key => $show)
                @php
                    $sum = ($sum + count([$show->name]));
                @endphp
            @endforeach

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Border</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sum}} Person</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->
        <!-- Content Row -->
    </div>
    <br/>
    <div class="container">


        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5%">#</th>
                <th scope="col">Name</th>
                <th scope="col" style="width: 15%">Total Meal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($totalMeal as $key => $Info)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $Info->name !!}</td>
                    <td>{!! $Info->breakfast+$Info->lunch+$Info->dinner !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection

