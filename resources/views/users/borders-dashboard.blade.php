@extends('users.borders-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ Auth::user()->name }} Your Account</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
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

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Add Daily Meals--}}
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#borderAddModal">
            <i class="fas fa-plus-circle"> Add Meal</i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="borderAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daily Meal Submission Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addExpanse" action="{!! url('/add-data') !!}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" readonly value="{!! Auth::user()->name !!}"/>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" required class="form-control" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="date">BreakFast</label>
                                <input type="number" required class="form-control" id="breakfast" name="breakfast">
                            </div>
                            <div class="form-group">
                                <label for="date">Lunch</label>
                                <input type="number" required class="form-control" id="lunch" name="lunch">
                            </div>
                            <div class="form-group">
                                <label for="date">Dinner</label>
                                <input type="number" required class="form-control" id="dinner" name="dinner">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn" id="insert" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    End Meal Modal--}}
    <br/>
{{--    Data Table--}}
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Data Tables</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum = 0)
                        @foreach(Auth::user()->Border as $key => $data)
                            <tr>
                                <td>{!! $key+1 !!}</td>
                                <td>{!! $data->date !!}</td>
                                <td>{!! $data->name !!}</td>
                                <td>{!! $data->breakfast !!}</td>
                                <td>{!! $data->lunch !!}</td>
                                <td>{!! $data->dinner !!}</td>
                                <td>
                                    {!! $total = $data->breakfast+$data->lunch+$data->dinner !!}
                                </td>
                            </tr>
{{--                            @php($sum = $sum+$total)--}}
                        @endforeach
                        </tbody>
                        <div class="alert alert-heading"></div>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--    AJAX Crud--}}
{{--    Insert Data--}}
{{--    <script type="text/javascript">--}}
{{--        $('#insert').click(function(){--}}
{{--            $.ajax({--}}
{{--                type:'post',--}}
{{--                url: 'insertdata',--}}
{{--                data:{--}}
{{--                    '_token':$('input[name=_token]').val(),--}}
{{--                    'name':$('input[name=name]').val(),--}}
{{--                    'date':$('input[name=date]').val(),--}}
{{--                    'breakfast':$('input[name=breakfast]').val(),--}}
{{--                    'lunch':$('input[name=lunch]').val(),--}}
{{--                    'dinner':$('input[name=dinner]').val()--}}
{{--                },--}}
{{--                success:function(data){--}}
{{--                    window.location.reload();--}}
{{--                },--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection