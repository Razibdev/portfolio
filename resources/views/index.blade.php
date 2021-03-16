@extends('layouts.front_layout.front_layout')
@push('css')
<style>
.razib{
    margin-bottom:30px;
}
    .portfolio-item{
        margin-bottom:0px;
    }
</style>
@endpush
@section('content')
<main id="main" class="site-main">

    <section id="about" class="site-section section-about text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2>About</h2>
                    <img src="front/assets/img/lines.svg" class="img-lines" alt="lines">
                    <p>Hello! I'm Razib, a full stuck developer, a php and a guy slighty obsessed for code quality. Also I'm a co-founder of websolves.net. I’m currently available for freelance work. If you have a project that you want to get started or think you need my help with something, then get in touch.</p>
                    <a href="{{url('front/assets/mycv.pdf')}}" class="btn btn-fill" target="_blank" download>Download my cv</a>
                </div>
            </div>
        </div>
    </section><!-- /.secton-about -->

    <section class="site-section section-skills">
        <div class="container">
            <div class="text-center">
                <h3>My Skills</h3>
                <img src="front/assets/img/lines.svg" class="img-lines" alt="lines">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="skill">
                        <h4>Html/css</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" data-transitiongoal="100"></div><!-- /.progress-bar -->
                        </div><!-- /.progress -->
                    </div><!-- /.skill -->
                    {{--<div class="skill">--}}
                        {{--<h4>Python</h4>--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar" role="progressbar" data-transitiongoal="75"></div><!-- /.progress-bar -->--}}
                        {{--</div><!-- /.progress -->--}}
                    {{--</div><!-- /.skill -->--}}
                </div>
                <div class="col-md-4">
                    <div class="skill">
                        <h4>Javascript</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" data-transitiongoal="82"></div><!-- /.progress-bar -->
                        </div><!-- /.progress -->
                    </div><!-- /.skill -->
                    {{--<div class="skill">--}}
                        {{--<h4>Ruby</h4>--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar" role="progressbar" data-transitiongoal="66"></div><!-- /.progress-bar -->--}}
                        {{--</div><!-- /.progress -->--}}
                    {{--</div><!-- /.skill -->--}}
                </div>
                <div class="col-md-4">
                    <div class="skill">
                        <h4>Php</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" data-transitiongoal="97"></div><!-- /.progress-bar -->
                        </div><!-- /.progress -->
                    </div><!-- /.skill -->
                    {{--<div class="skill">--}}
                        {{--<h4>Java</h4>--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar" role="progressbar" data-transitiongoal="45"></div><!-- /.progress-bar -->--}}
                        {{--</div><!-- /.progress -->--}}
                    {{--</div><!-- /.skill -->--}}
                </div>
            </div>
        </div>
    </section><!-- /.secton-skills -->

    <section id="service" class="site-section section-services overlay text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>What i do</h3>
                    <img src="front/assets/img/lines.svg" class="img-lines" alt="lines">
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <img src="front/assets/img/front-end.svg" alt="Front End Developer">
                        <h4>Front-end</h4>
                        <p>As a javascript developer, I have experience in HTML5 and CSS3 techniques working with jQuery or more advanced javascript MVC frameworks such as angular</p>
                    </div><!-- /.service -->
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <img src="front/assets/img/back-end.svg" alt="Back End Developer">
                        <h4>Back-end</h4>
                        <p>Utilising php frameworks such as laravel or creating bespoke code, I've written services supporting ten of users, including REST APIs, e-learning applications and more.</p>
                    </div><!-- /.service -->
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <img src="front/assets/img/consultancy.svg" alt="Coding">
                        <h4>Consultancy</h4>
                        <p>As well as providing development services, I can also help you decide strategic roadmaps via consultancy services.</p>
                    </div><!-- /.service -->
                </div>
            </div>
        </div>
    </section><!-- /.secton-services -->

    <section id="portfolio" class="site-section section-portfolio">
        <div class="container">
            <div class="text-center">
                <h3>My recent Works</h3>
                <img src="front/assets/img/lines.svg" class="img-lines" alt="lines">
            </div>
            <div class="row">
                @foreach($projectDetails as $project)
                <div class="col-md-4 col-xs-6 razib">
                    <div class="portfolio-item">
                        <img src="{{asset('image/project_image/'.$project->image)}}" class="img-res" alt="">
                        <div class="portfolio-item-info">
                            <h4>{{$project->project_title}}</h4>
                            <a href="#" data-toggle="modal" data-target="#{{$project->id}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a target="_blank" href="{{url($project->project_url)}}"><span class="glyphicon glyphicon-link"></span></a>
                        </div><!-- /.portfolio-item-info -->
                    </div><!-- /.portfolio-item -->
                </div>
               @endforeach
            </div>
        </div>
    </section><!-- /.secton-portfolio -->

    <section class="site-section section-counters text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <p class="counter start" data-to="03" data-speed="2000">0</p>
                    <h4>Years Experience</h4>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <p class="counter start" data-to="10" data-speed="2000">0</p>
                    <h4>Projects Delivered</h4>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <p id="infinity" class="counter" data-from="0" data-to="1" data-speed="1000">0</p>
                    <h4>Seconds on this site!<br>What are you waiting for?</h4>
                </div>
            </div>
        </div>
    </section><!-- /.section-counters -->



    <section id="contact" class="site-section section-form text-center">
        <div class="container">

            <h3>Contact</h3>
            <img src="front/assets/img/lines.svg" class="img-lines" alt="lines">
            <form method="POST" action="{{"/contact"}}" >{{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control mt-x-0" placeholder="Name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-sm-12">
                        <textarea name="message" id="mesaage" class="form-control" placeholder="Message" required></textarea>
                    </div>
                </div>
                <button href="#" class="btn btn-border" type="submit">Hire Me <span class="glyphicon glyphicon-send"></span></button>
            </form>
        </div>
    </section><!-- /.section-form -->


    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="title text-center text-uppercase">
                        <h2>our Team</h2>
                    </div>
                </div>
            </div>
            <div class="team_area">
                <div class="row">

                    @foreach($teams as $team)

                    <div class="col-lg-4 col-md-4" style="margin-bottom: 20px;">
                        <div class="team_img">
                            <img class=" teamimg img-fluid" src="{{asset('image/team_image/'.$team->image)}}" alt="">
                            <div class="team_title">
                                <h2>{{$team->name}}</h2>
                                <h6>{{$team->designation}}</h6>
                                <p>{{ Str::substr($team->description, 0, 100)}}</p>
                            </div>
                            <div class="team_icn text-center">
                                <a href="{{url($team->fb_url)}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{url($team->skype_url)}}"><i class="fa fa-skype"></i></a>
                                <a href="{{url($team->twitter_url)}}"><i class="fa fa-twitter"></i></a>
                                <a href="#" data-toggle="modal" data-target="#"><span class="glyphicon glyphicon-eye-open"></span></a>
                            </div>
                        </div>
                    </div>
                        @endforeach

                </div>

                <!--@foreach($teams as $team)-->
                <!--    <div id="{{$team->id}}" class="modal fade" role="dialog">-->
                <!--        <div class="modal-dialog">-->
                <!--            <div class="modal-content">-->
                <!--                <div class="modal-header">-->
                <!--                    <a class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>-->
                <!--                    <img class="img-res" src="{{asset('image/team_image/'.$team->image)}}" alt="">-->
                <!--                </div>-->
                <!--                <div class="modal-body">-->
                <!--                    <h4 class="modal-title">{{$team->name}}</h4>-->
                <!--                    <h6>{{$team->designation}}</h6>-->
                <!--                    <p>{{$team->description}}</p>-->
                <!--                </div>-->
                <!--                <div class="modal-footer">-->
                <!--                    <button class="close" data-dismiss="modal">Close</button>-->
                <!--                </div>-->
                <!--            </div><!-- /.modal-content -->-->
                <!--        </div><!-- /.modal-dialog -->-->
                <!--    </div><!-- /.modal -->-->

                <!--@endforeach-->

            </div>
        </div>
    </section>



</main><!-- /#main -->

@endsection

@push('js')

@endpush
