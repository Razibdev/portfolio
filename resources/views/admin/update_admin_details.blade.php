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
                                <h3 class="card-title">Update Admin Details</h3>
                            </div>
                            <!-- /.card-header -->
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- form start -->
                            <form role="form" method="POST" action="{{url('admin/update-admin-details')}}" name="updateAdminDetails" id="updateAdminDetails" enctype="multipart/form-data">
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
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" value="{{$adminDetails->name}}" id="admin_name" name="admin_name" placeholder="Enter Admin Name ">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mobile</label>
                                        <input type="text" class="form-control" value="{{$adminDetails->mobile}}" id="admin_mobile" name="admin_mobile" placeholder="Enter Admin Mobile ">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image</label>

                                        <input type="file" class="form-control" id="admin_image" name="admin_image" style="margin-bottom: 10px;">
                                        @if(!empty($adminDetails->image))

                                            <input type="hidden" name="current_admin_image" value="{{$adminDetails->image}}">
                                            <img src="{{asset('image/admin_images/admin_photos/'.$adminDetails->image)}}" width="50" height="50" alt="">

                                        @endif
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

@endpush
