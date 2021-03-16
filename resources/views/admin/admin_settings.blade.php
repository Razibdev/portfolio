@extends('layouts.admin_layout.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Password</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{url('admin/update-pwd')}}" name="updatePasswordForm" id="updatePasswordForm">
                                {{csrf_field()}}
                                <div class="card-body">
                                    {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputEmail1">Admin Email</label>--}}
                                    {{--<input class="form-control" value="{{$adminDetails->name}}" placeholder="Enter Admin/Sub Admin  Name"--}}
                                    {{--id="admin_name" name="admin_name">--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Email</label>
                                        <input class="form-control" readonly value="{{$adminDetails->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Email</label>
                                        <input class="form-control" readonly value="{{$adminDetails->type}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Current Password</label>
                                        <input type="password" class="form-control" id="current_pwd" name="current_pwd" placeholder="Enter Current Password" required>
                                        <span id="chePwd"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New Password</label>
                                        <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="Enter New Password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Enter Confirm Password" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            // check admin password is correct or not
            $('#current_pwd').keyup(function () {
                let current_pwd = $("#current_pwd").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:'/admin/check-current-pwd',
                    data:{current_pwd:current_pwd},
                    success:function (resp) {
                        if(resp === 'false'){
                            $('#chePwd').html('<font color="red"> Current Password is Incorrect</font>')
                        }else if(resp === 'true'){
                            $('#chePwd').html('<font color="green"> Current Password is Correct</font>')

                        }
                    },
                    error:function () {
                        alert('Error');
                    }
                })
            })
        });

    </script>
@endpush
