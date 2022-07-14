<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$basic_information->name_surname}} - {{$basic_information->job_title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{config('app.url')}}/public/Resume/css/aos.css?ver=1.1.0" rel="stylesheet">
    <link href="{{config('app.url')}}/public/Resume/css/bootstrap.min.css?ver=1.1.0" rel="stylesheet">
    <link href="{{config('app.url')}}/public/Resume/css/main.min.css?ver=1.1.0" rel="stylesheet">
    <link rel="shortcut icon" href="{{config('app.url')}}/storage/images/site/{{$global_settings->favicon}}" type="image/x-icon">
    <link rel="icon" href="{{config('app.url')}}/storage/images/site/{{$global_settings->favicon}}" type="image/x-icon">
    <noscript>
        <style>
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
    @if(!request()->is('share', 'share/*'))
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
    @else
        <meta name="robots" content="noindex, nofollow"/>
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

</head>
<body id="top">

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="about">
            <div class="container">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">About</div>
                                <p>{!! $basic_information->about !!}</p>
                            </div>
                        </div>
                        <div class="col-sm-12">
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
                <div class="card">
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
                                    <div class="col-sm-6">
                                        <div class="cc-porfolio-image img-raised"><a href="{{$portfolio->portfolio_web}}" target="_blank" rel="nofollow">
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
                                                    <div class="col-md-12">
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
                            <div class="col-md-3 bg-primary">
                                <div class="card-body cc-experience-header">
                                    <p>{{dateformat($experience->start_date, 'M Y')}} - @if($experience->end_date !=null) {{dateformat($experience->end_date, 'M Y')}}@else Present @endif </p>
                                    <div class="h5">{{$experience->company_name}}</div>
                                </div>
                            </div>
                            <div class="col-md-9">
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
                            <div class="col-md-3 bg-primary">
                                <div class="card-body cc-education-header">
                                    <p>{{dateformat($education->start_date, 'Y')}} - @if($education->end_date!=null) {{dateformat($education->end_date, 'Y')}} @else Present @endif </p>
                                </div>
                            </div>
                            <div class="col-md-9">
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
    </div>
    <footer class="footer">
        <div class="h4 title text-center"> @if($basic_information->website) <a href="{{$basic_information->website}}" target="_blank" rel="author">{{$basic_information->name_surname}}</a>@else {{$basic_information->name_surname}} @endif </div>
        <div class="text-center text-muted">
            <p>&copy; All rights reserved.</p>
        </div>
    </footer>
    <script src="{{config('app.url')}}/public/Resume/js/core/jquery.3.2.1.min.js?ver=1.1.0"></script>
    <script src="{{config('app.url')}}/public/Resume/js/core/bootstrap.min.js?ver=1.1.0"></script>
    <script src="{{config('app.url')}}/public/Resume/js/aos.js?ver=1.1.0"></script>
    <script src="{{config('app.url')}}/public/Resume/scripts/main.js?ver=1.1.0"></script>

</body>
</html>
