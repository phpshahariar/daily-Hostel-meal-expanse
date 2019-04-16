@extends('admin.admin-master')

@section('content')
    <div class="container">
        <div class="text-center">
            <button class="btn btn-success" data-toggle="modal" data-target="#addDeposit">Add Deposit</button>
        </div>
        <div class="card-body table-responsive" id="showAllData">
            <table class="table table-bordered table-responsive-md" style="text-align: center; margin-top: 8px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Balance</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php( $i = 1)
                @php( $sum = 0)
                @foreach($deposit as $key => $show)
                    <tr>
                        <td width="5%">{!! $i++ !!}</td>
                        <td>{!! $show->name !!}</td>
                        <td>TK.{!! number_format($show->balance,2) !!}</td>
                        <td>{!!$show->date !!}</td>
                        <td width="15%">
                            <div class="btn-group">
                                <a href="{!! url('view/border/data') !!}" data-id="{!! $show->id !!}" id="view" class="btn btn-outline-primary">View</a>
                                <a href="{!! url('edit/border/data') !!}" data-id="{!! $show->id !!}" id="edit" class="btn btn-outline-success">Edit</a>
                                <a onclick="return confirm('Are You sure Delete This!')" href="{!! url('delete/border/data') !!}" data-id="{!! $show->id !!}" id="delete" class="btn btn-outline-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$deposit->render()}}
    </div>

    <div id="getalldata" data-url="{!! url('/get/deposit/data') !!}"></div>
    <div id="getalldatabypagination" data-url="{!! url('/get/deposit/data/pagination') !!}"></div>


    <div class="modal fade" id="addDeposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{!! url('/add/deposit/data') !!}"  method="POST" id="adddepositform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Deposit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                            <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-balance-scale"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Balance" name="balance">
                            <span style="color: red"> {{ $errors->has('balance') ? $errors->first('balance') : ' ' }}</span>
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
                        <button type="submit" class="btn btn-primary">Save Deposit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--    View Data--}}
    <div class="modal fade" id="viewDeposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bordername"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="bname"></div>
                        <div class="bbalance"></div>
                        <div class="bdate"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
    </div>
{{--    View Data--}}

{{--    Update Data--}}
    <div class="modal fade" id="updateDeposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{!! url('/update/deposit/data') !!}"  method="POST" id="updatedepositform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updatebordertitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="borderId">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" id="uname" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-balance-scale"></i></span>
                            </div>
                            <input type="number" id="ubalance" class="form-control" placeholder="Balance" name="balance">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-times"></i></span>
                            </div>
                            <input type="date" id="udate" class="form-control" name="date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Deposit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{--    Update Data end--}}


<div class="load" style="text-align: center; z-index: 9999; top: 20%; left: 50%; margin: auto; position: fixed; display: none;">
    <img src="{!! asset('/assets/') !!}/200.gif" style="text-align: center; margin: auto;" />
</div>
    {{--    Add Deposit end--}}

    {{--    Script file--}}
{{--    <script>--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script>
        $(document).ready(function () {
            $("#adddepositform").on("submit",function (e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr("action");
                var type = form.attr("method");
                var data = form.serialize();

                $.ajax({
                    url: url,
                    data: data,
                    type: type,
                    dataType: "JSON",
                    beforeSend: function () {
                        $('.load').fadeIn();
                    },
                    success: function (data) {
                        if ( data == "success"){
                            $("#addDeposit").modal("hide");
                            swal("Great", "Successfully Deposit Add", "success");
                            form[0].reset();
                            return getBorderDeposit();
                        }
                    },
                    complete: function () {
                        $('.load').fadeOut();
                    },
                });


            });

            function getBorderDeposit() {
                var url = $("#getalldata").data("url");
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "html",
                    success: function (response) {
                    $("#showAllData").html(response);
                }
                });
            }

            $(document).on("click", "#view", function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                var url = $(this).attr("href");
                console.log( id + url );

                $.ajax({
                    url:url,
                    data:{id:id},
                    type:"GET",
                    dataType:"JSON",
                    success:function (response) {
                        if ($.isEmptyObject(response) != null){
                            $("#viewDeposit").modal("show");
                            $("#bordername").text(response.name + " Data");
                            $(".bname").text("Name: " + response.name);
                            $(".bbalance").text("Balance: " + response.balance);
                            $(".bdate").text("Date: " + response.date);
                        }
                    }
                });

            });

            //edit data

            $(document).on("click", "#edit", function (e) {
               e.preventDefault();

               var id = $(this).data("id");
               var url = $(this).attr("href");
               console.log( id + url);

               $.ajax({
                   url:url,
                   data:{id:id},
                   type:"GET",
                   dataType:"JSON",
                   success(response){
                    $("#updateDeposit").modal("show");
                    $("#uname").val(response.name);
                    $("#ubalance").val(response.balance);
                    $("#udate").val(response.date);
                    $("#borderId").val(response.id);
                    $("#updatebordertitle").text("Update " + response.name + " Data");
                }
               });
            });

            //Update

            $("#updatedepositform").on("submit", function (e) {
               e.preventDefault();
               var form = $(this);
               var url = form.attr("action");
               var type = form.attr("method");
               var data = form.serialize();

               $.ajax({
                   url:url,
                   type:type,
                   data:data,
                   dataType: "JSON",
                   beforeSend: function () {
                       $('.load').fadeIn();
                   },
                   success: function (data) {
                       if ( data == "success"){
                           $("#updateDeposit").modal("hide");
                           swal("Data Updated", "Successfully Deposit Updated", "success");
                           form[0].reset();
                           return getBorderDeposit();
                       }
                   },
                   complete: function () {
                       $('.load').fadeOut();
                   },
               });
            });

            // Delete data

            $(document).on("click", "#delete", function (event) {
                event.preventDefault();
                var id = $(this).data("id");
                var url = $(this).attr("href");

                $.ajax({
                    url:url,
                    data:{id:id},
                    type:"GET",
                    dataType:"JSON",
                    success(response){
                        swal("Delete", "Deposit has been Deleted", "success");
                        return getBorderDeposit();
                    }
                });

            });

            $(document).on("click", ".pagination li a", function (e) {
                e.preventDefault();
                var page = $(this).attr("href");
                var pagenumber = page.split("?page=")[1];
                return getpagination(pagenumber);
            });

            function getpagination(pagechange) {
                var url = $("#getalldatabypagination").data("url") +"?page="+ pagechange;

                $.ajax({
                    url:url,
                    type:"GET",
                    dataType:"HTML",
                    success: function(response) {
                       $("#showAllData").html(response);
                       // console.log(response);
                    }
                });
            }

        });
    </script>

    @endsection