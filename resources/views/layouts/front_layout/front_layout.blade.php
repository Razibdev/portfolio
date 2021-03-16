<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PortfolioPerfect</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="front/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="front/assets/img/favicon.png">

    <!-- Stylesheets
    ================================================== -->
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/font-awesome.min.css')}}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/responsive.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

@include('layouts.front_layout.front_header')

<div id="hero" class="hero">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h1>Razib</h1>
                <div class="page-scroll">
                    <p class="job-title">Full Stack Developer</p>
                    <a href="#contact" class="btn btn-fill ">Hire me</a>
                    <div class="clearfix visible-xxs"></div>
                    <a href="#portfolio" class="btn btn-border">Explore more</a>
                </div>
            </div>

            <div class="col-md-6 text-right">
                <img src="front/assets/img/alex-vidal.png" alt="alex-vidal">
            </div>

        </div>
    </div>
</div><!-- /.hero -->

@yield('content')

@include('layouts.front_layout.front_footer')

<!-- Modals -->
@foreach($projectDetails as $project)
<div id="{{$project->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                <img class="img-res" src="{{asset('image/project_image/'.$project->image)}}" alt="">
            </div>
            <div class="modal-body">
                <h4 class="modal-title">{{$project->project_title}}</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo finibus tristique. Maecenas dignissim condimentum sem eu tincidunt. Curabitur in dui quis magna vestibulum pulvinar a ut urna. Nam pellentesque mattis urna. Aenean eget lectus sit amet turpis facilisis consectetur quis vel ante. Integer in massa ut nibh ultricies sagittis imperdiet in ante. Nam sed turpis vel ante placerat feugiat ac tempus magna. Nam aliquet ullamcorper dolor non hendrerit.</p>
            </div>
            <div class="modal-footer">
                <a href="{{$project->project_url}}" class="btn btn-fill">Visit Page</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endforeach







<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{url('front/assets/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="{{url('front/assets/js/skrollr.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-progressbar/0.9.0/bootstrap-progressbar.min.js"></script>
<script src="{{url('front/assets/js/jquery.countTo.min.js')}}"></script>
<script src="{{url('front/assets/js/script.js')}}"></script>

</body>
</html>
