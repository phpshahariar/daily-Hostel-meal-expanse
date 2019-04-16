@extends('admin.admin-master')

@section('title')
    Daily Expanse
@endsection

@section('content')
    <div class="container">
        <div class="text-center">
            <button class="btn btn-success" data-toggle="modal" data-target="#addExpanse">Add Expanse</button>
        </div>
        <div class="load" style="text-align: center; z-index: 9999; top: 10%; left: 40%; display: none; margin: auto; position: fixed;">
            <img src="{!! asset('/assets/') !!}/giphy.gif" style="text-align: center" />
        </div>
        <div class="card-body table-responsive" id="showAllExpanse">
            <table class="table table-bordered table-responsive-md" style="text-align: center; margin-top: 8px;">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Expanse</th>
                </tr>
                </thead>
                <tbody>
                @php( $i = 1)
                @php( $sum = 0)
                @foreach($show_expanse as $key => $show)
                    <tr>
                        <td width="5%">{!! $i++ !!}</td>
                        <td>{!! $show->date !!}</td>
                        <td>TK.{!! number_format($show->expanse,2) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
{{--        {{$deposit->render()}}--}}
    </div>
    <div id="getallexpanse" data-url="{!! url('/get/expanse/data') !!}"></div>
{{--    Add Expanse--}}
    <div class="modal fade" id="addExpanse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{!! url('/add/expanse/data') !!}"  method="POST" id="addexpanseform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Expanse Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-balance-scale"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Expanse" name="expanse">
                            <span style="color: red"> {{ $errors->has('expanse') ? $errors->first('expanse') : ' ' }}</span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-times"></i></span>
                            </div>
                            <input type="date" class="form-control" name="date">
                            <span style="color: red"> {{ $errors->has('date') ? $errors->first('date') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Expanse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



{{--    End Expanse--}}
{{--CDN Ajax Link--}}
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


{{--    Ajax Data Add--}}
    <script>
        $(document).ready(function () {
           $("#addexpanseform").on("submit", function (e) {
               e.preventDefault();
               var form = $(this);
               var url = form.attr("action");
               var type = form.attr("method");
               var data = form.serialize();

               $.ajax({
                   url:url,
                   type:type,
                   data:data,
                   dataType:"JSON",
                   beforeSend: function () {
                        $('.load').fadeIn();
                   },
                   success:function (data) {
                    if (data == "success"){
                        $("#addExpanse").modal('hide');
                        swal('Great', 'Expanse Add Successfully', 'success');
                        form[0].reset();
                        return getAllExpanseData();
                    }
                   },
                   complete:function () {
                       $('.load').fadeOut();
                   },
               });
           });

            function getAllExpanseData() {
                var url = $("#getallexpanse").data("url");
                $.ajax({
                    url:url,
                    type: "GET",
                    dataType:"html",
                    success:function (response) {
                        $("#showAllExpanse").html(response);
                    }
                });
            }
        });
    </script>


    @endsection