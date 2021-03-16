@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Team</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Team Member</li>
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
                                <h3 class="card-title">Add Team Member</h3>
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
                            <form role="form" method="POST" action="{{url('admin/add-team')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" id="name" name="name" placeholder="Enter Member name" >
                                            </div>

                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input class="form-control" id="designation" name="designation" placeholder="Enter member designation" >
                                            </div>

                                            <div class="form-group">
                                                <label for="designation">Description</label>
                                                <textarea name="description" class="form-control"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="image"> Image</label><br>
                                                <input type="file"  id="image" name="image" style="margin-bottom: 10px;" >
                                                {{--@if(!empty($categoryData->category_image))--}}
                                                {{--<img src="{{asset('image/category_image/'.$categoryData->category_image)}}" width="50" height="50" alt="">--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="form-group">
                                                <label for="fb_url">Facebook URL</label>
                                                <input class="form-control" id="fb_url" name="fb_url" placeholder="Enter facekbook Url" >
                                            </div>

                                            <div class="form-group">
                                                <label for="skype_url">Skype URL</label>
                                                <input class="form-control" id="skype_url" name="skype_url" placeholder="Enter Skype Url" >
                                            </div>

                                            <div class="form-group">
                                                <label for="twitter_url">Twitter URL</label>
                                                <input class="form-control" id="twitter_url" name="twitter_url" placeholder="Enter twitter Url" >
                                            </div>


                                        </div>

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

