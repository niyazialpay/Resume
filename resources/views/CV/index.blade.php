<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$basic_information->name_surname}} - {{$basic_information->job_title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{config('app.url')}}/public/CV/css/aos.css?ver=1.1.0" rel="stylesheet">
    <link href="{{config('app.url')}}/public/CV/css/bootstrap.min.css?ver=1.1.0" rel="stylesheet">
    <link href="{{config('app.url')}}/public/CV/css/main.min.css?ver=1.1.0" rel="stylesheet">
    <link rel="shortcut icon" href="{{config('app.url')}}/storage/images/site/{{$global_settings->favicon}}" type="image/x-icon">
    <link rel="icon" href="{{config('app.url')}}/storage/images/site/{{$global_settings->favicon}}" type="image/x-icon">
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>

    <meta name="description" content="{{$global_settings->meta_description}}">
    <meta name="keywords" content="{{$global_settings->meta_keywords}}">
    <meta name="author" content="{{$basic_information->name_surname}}">
    <meta name="robots" content="index, follow"/>

    @foreach(explode(",",$global_settings->meta_keywords) as $item)
        <meta property="article:tag" content="{{trim($item)}}"/>
    @endforeach

    <meta property="og:url" content="{{config('app.url')}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:locale" content="en"/>
    <meta property="og:title" content="{{$basic_information->name_surname}} - {{$basic_information->job_title}}"/>
    <meta property="og:description" content="{{$global_settings->meta_description}}"/>
    <meta property="og:image" content="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}">
    <meta property="og:image:url" content="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}"/>
    <meta property="og:image:secure_url" content="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}"/>
    <meta property="og:image:alt" content="{{$basic_information->name_surname}} - {{$basic_information->job_title}}">
    @if($basic_information->facebook)
        <meta property="article:author" content="https://www.facebook.com/{{$basic_information->facebook}}">
    @endif
    @if($basic_information->twitter)
        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:site" content="{{$basic_information->twitter}}"/>
        <meta name="twitter:creator" content="{{$basic_information->twitter}}"/>
        <meta name="twitter:description" content="{{$global_settings->meta_description}}"/>
        <meta name="twitter:title" content="{{$basic_information->name_surname}} - {{$basic_information->job_title}}"/>
        <meta name="twitter:image" content="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}"/>
        <meta name="twitter:image:src" content="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}"/>
    @endif

    <link rel="dns-prefetch" href="https://mc.yandex.ru"/>
    <link rel="dns-prefetch" href="https://www.google.com"/>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com"/>
    <link rel="dns-prefetch" href="https://www.googletagmanager.com"/>
    <link rel="dns-prefetch" href="https://s7.addthis.com"/>
    <link rel="dns-prefetch" href="https://v1.addthisedge.com"/>
    <link rel="dns-prefetch" href="https://m.addthis.com"/>
    <link rel="dns-prefetch" href="https://z.moatads.com"/>
    <link rel="dns-prefetch" href="https://www.google-analytics.com"/>

    <script
        src="https://www.google.com/recaptcha/api.js?render={{$global_settings->recaptcha_public_v3}}&amp;lang=en"></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>

    @if($global_settings->google)
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{$global_settings->google}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', '{{$global_settings->google}}');
        </script>
    @endif
    {!! $global_settings->yandex !!}
    {!! $global_settings->bing !!}
    {!! $global_settings->yahoo !!}
    {!! $global_settings->google_tag_manager_head !!}

</head>
<body id="top">
{!! $global_settings->google_tag_manager_body !!}
<header>
    <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
            <div class="container">
                <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip"><img src="{{config('app.url')}}/storage/images/site/{{$global_settings->logo}}" alt="{{$basic_information->name_surname}}" height="50"></a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Experience</a></li>
                        <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
                        @if($basic_information->website)
                            <li class="nav-item"><a class="nav-link smooth-scroll" href="{{$basic_information->website}}" target="_blank" rel="author">{{$basic_information->website_title}}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="page-content">
    <div>
        <div class="profile-page">
            <div class="wrapper">
                <div class="page-header page-header-small" filter-color="green">
                    <div class="page-header-image" data-parallax="true" style="background-image: url('{{config('app.url')}}/public/CV/images/cc-bg-1.jpg')"></div>
                    <div class="container">
                        <div class="content-center">
                            <div class="cc-profile-image"><a href="#"><img src="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}" alt="Image"/></a></div>
                            <div class="h2 title">{{$basic_information->name_surname}}</div>
                            <p class="category text-white">{{$basic_information->job_title}}</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Hire Me</a>
                        </div>
                    </div>
                    <div class="section">
                        <div class="container">
                            <div class="button-container">
                                @if($basic_information->github)
                                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://github.com/{{$basic_information->github}}" rel="tooltip" title="Follow me on Github" target="_blank"><i class="fa fa-github"></i></a>
                                @endif
                                @if($basic_information->linkedin)
                                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://linkedin.com/in/{{$basic_information->linkedin}}" rel="tooltip" title="Follow me on Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if($basic_information->facebook)
                                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://facebook.com/{{$basic_information->facebook}}" rel="tooltip" title="Follow me on Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($basic_information->twitter)
                                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://twitter.com/{{$basic_information->twitter}}" rel="tooltip" title="Follow me on Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                @endif
                                @if($basic_information->instagram)
                                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://instagram.com/{{$basic_information->instagram}}" rel="tooltip" title="Follow me on Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if($basic_information->behance)
                                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.behance.net/{{$basic_information->behance}}" rel="tooltip" title="Follow me on Behance" target="_blank"><i class="fa fa-behance"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="about">
            <div class="container">
                <div class="card" data-aos="fade-up" data-aos-offset="10">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">About</div>
                                <p>{!! $basic_information->about !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">Basic Information</div>
                                <div class="row">
                                    <div class="col-sm-4"><strong class="text-uppercase">Birthday:</strong></div>
                                    <div class="col-sm-8">{{CheckPrivacy($basic_information->birthday, $basic_information, true, share_token: $share_token)}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                                    <div class="col-sm-8">{{CheckPrivacy($basic_information->email, $basic_information->show_email, share_token: $share_token)}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
                                    <div class="col-sm-8">{{CheckPrivacy($basic_information->phone, $basic_information->show_phone, share_token: $share_token)}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                                    <div class="col-sm-8">{{CheckPrivacy($basic_information->address, $basic_information->show_address, share_token: $share_token)}}</div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
                                    <div class="col-sm-8">{{$basic_information->languages}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="skill">
            <div class="container">
                <div class="h4 text-center mb-4 title">Professional Skills</div>
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <div class="card-body">
                        <div class="row">
                            @foreach($skills as $skill)
                                <div class="col-md-6">
                                    <div class="progress-container progress-primary"><span class="progress-badge">{{$skill->skill_name}}</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->skill_progress}}%;"></div><span class="progress-value">{{$skill->skill_progress}}%</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="h4 text-center mb-4 title">Portfolio</div>
                    </div>
                </div>
                <div class="tab-content gallery mt-5">
                    <div class="tab-pane active" id="web-development">
                        <div class="ml-auto mr-auto">
                            <div class="row">
                                @foreach($portfolios as $portfolio)
                                    <div class="col-md-3 col-sm-6">
                                        <div class="cc-porfolio-image img-raised" data-aos="fade-up" data-aos-anchor-placement="top-bottom"><a href="{{$portfolio->portfolio_web}}" target="_blank" rel="nofollow">
                                                <figure class="cc-effect"><img src="{{config('app.url')}}/storage/images/portfolio/{{$portfolio->portfolio_image}}" alt="{{$portfolio->portfolio_name}}" class="portfolio-image"/>
                                                    <figcaption>
                                                        <div class="h4">{{$portfolio->portfolio_name}}</div>
                                                        <p>{{$portfolio->portfolio_description}}</p>
                                                    </figcaption>
                                                </figure></a></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($global_settings->github_token)
            <div class="section" id="github-repos">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="h4 text-center mb-4 title">My Github Repositories</div>
                        </div>
                    </div>
                    <div class="tab-content gallery mt-5">
                        <div class="tab-pane active" id="git-projects">
                            <div class="ml-auto mr-auto">
                                <div class="row">
                                    @foreach($github_repos as $github)
                                        @if(!$github->fork && $github->name!=$global_settings->github_username)
                                            <div class="card">
                                                <div class="row">
                                                    <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                                        <div class="card-body cc-experience-header">
                                                            <img src="{{config('app.url')}}/public/CV/images/github-repositories.jpg" alt="{{$github->name}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                                        <div class="card-body">
                                                            <div class="h5"><a href="{{$github->html_url}}" target="_blank">{{$github->name}}</a></div>
                                                            <p>{{$github->description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="section" id="experience">
            <div class="container cc-experience">
                <div class="h4 text-center mb-4 title">Work Experience</div>
                @foreach($experiences as $experience)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                    <p>{{dateformat($experience->start_date, 'M Y')}} - @if($experience->end_date !=null) {{dateformat($experience->end_date, 'M Y')}}@else Present @endif </p>
                                    <div class="h5">{{$experience->company_name}}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">{{$experience->job_title}}</div>
                                    <p>{{$experience->work_description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section">
            <div class="container cc-education">
                <div class="h4 text-center mb-4 title">Education</div>
                @foreach($educations as $education)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-education-header">
                                    <p>{{dateformat($education->start_date, 'Y')}} - @if($education->end_date!=null) {{dateformat($education->end_date, 'Y')}} @else Present @endif </p>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">{{$education->school_name}}</div>
                                    <p class="category">{{$education->section}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="section" id="contact">
            <div class="cc-contact-information" style="background-image: url('{{config('app.url')}}/public/CV/images/staticmap.png')">
                <div class="container">
                    <div class="cc-contact">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card mb-0" data-aos="zoom-in">
                                    <div class="h4 text-center title">Contact Me</div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <form action="javascript:contact()" method="POST" id="contact-form">
                                                    <div class="p pb-3"><strong>Feel free to contact me </strong></div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                                                <input class="form-control" type="text" name="name" placeholder="Name" required="required"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                                                <input class="form-control" type="text" name="subject" placeholder="Subject" required="required"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                <input class="form-control" type="email" name="email" placeholder="E-mail" required="required"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="message" placeholder="Your Message" required="required"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @csrf
                                                    <input type="hidden" name="recaptcha_response" class="recaptcha_response" id="recaptcha_response">
                                                    <div class="input-group mb-3 text-center" id="recaptcha_v2" @if(!session()->has('score_error'))style="display:none"@endif>
                                                        <div class="g-recaptcha" id="g-recaptcha" data-sitekey="{{$global_settings->recaptcha_public_v2}}"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button class="btn btn-primary" type="submit" id="send-button">Send</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
</div>
<footer class="footer">
    <div class="container text-center">
        @if($basic_information->github)
            <a class="cc-github btn btn-link" href="https://github.com/{{$basic_information->github}}" rel="nofollow" target="_blank"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
        @endif
        @if($basic_information->linkedin)
            <a class="cc-linkedin btn btn-link" href="https://linkedin.com/in/{{$basic_information->linkedin}}" rel="nofollow" target="_blank"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
        @endif
        @if($basic_information->facebook)
            <a class="cc-facebook btn btn-link" href="https://facebook.com/{{$basic_information->facebook}}" rel="nofollow" target="_blank"><i class="fa fa-facebook fa-2x " aria-hidden="true"></i></a>
        @endif
        @if($basic_information->twitter)
            <a class="cc-twitter btn btn-link " href="https://twitter.com/{{$basic_information->twitter}}" rel="nofollow" target="_blank"><i class="fa fa-twitter fa-2x " aria-hidden="true"></i></a>
        @endif
        @if($basic_information->instagram)
            <a class="cc-instagram btn btn-link" href="https://instagram.com/{{$basic_information->instagram}}" rel="nofollow" target="_blank"><i class="fa fa-instagram fa-2x " aria-hidden="true"></i></a>
        @endif
        @if($basic_information->behance)
            <a class="cc-behance btn btn-link" href="https://behance.com/{{$basic_information->behance}}" rel="nofollow" target="_blank"><i class="fa fa-behance fa-2x " aria-hidden="true"></i></a>
        @endif
    </div>
    <div class="h4 title text-center"> @if($basic_information->website) <a href="{{$basic_information->website}}" target="_blank" rel="author">{{$basic_information->name_surname}}</a>@else {{$basic_information->name_surname}} @endif </div>
    <div class="text-center text-muted">
        <p>&copy; All rights reserved.</p>
    </div>
</footer>
<script src="{{config('app.url')}}/public/CV/js/core/jquery.3.2.1.min.js?ver=1.1.0"></script>
<script src="{{config('app.url')}}/public/CV/js/core/popper.min.js?ver=1.1.0"></script>
<script src="{{config('app.url')}}/public/CV/js/core/bootstrap.min.js?ver=1.1.0"></script>
<script src="{{config('app.url')}}/public/CV/js/now-ui-kit.js?ver=1.1.0"></script>
<script src="{{config('app.url')}}/public/CV/js/aos.js?ver=1.1.0"></script>
<script src="{{config('app.url')}}/public/CV/scripts/main.js?ver=1.1.0"></script>
<script>
    function getRecaptchaToken() {
        grecaptcha.ready(function () {
            grecaptcha.execute('{{$global_settings->recaptcha_public_v3}}', {action: '@yield("recaptcha_action")'}).then(function (token) {
                $('.recaptcha_response').val(token);
            });
        });
    }

    getRecaptchaToken();

    const contact_form = $('#contact-form');
    const send_button = $('#send-button');
    contact_form.submit(function(){
        send_button.attr('disabled', true);
        const warning = $('.warning');
        $.ajax({
            url: "{{config('app.url')}}/contact",
            type: 'post',
            dataType: 'json',
            data: contact_form.serialize(),
            success: function (result) {
                getRecaptchaToken();
                if(result.result){
                    warning.html('<strong><em>Your message has been sent.</em></strong>');
                }
                else{
                    warning.html('<strong><em>' + result.reason.description + '</em></strong>');
                    if(result.reason.type === "recaptcha"){
                        if(result.reason.score<{{$global_settings->recaptcha_score}}){
                            $('#recaptcha_v2').show();
                        }
                        else{
                            getRecaptchaToken();
                        }
                        console.log(result.reason.score)
                    }
                }
                contact_form.trigger("reset");
                send_button.attr('disabled', false);
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                warning.html('<strong><em>System error occurred!</em></strong>');
            }
        });
    })
</script>
</body>
</html>
