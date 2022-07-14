<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from sproogen.github.io/modern-resume-theme/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Jul 2022 10:11:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$basic_information->name_surname}} - {{$basic_information->job_title}}</title>
    <meta name="generator" content="Cryptograph" />
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
    <link rel="shortcut icon" href="{{config('app.url')}}/storage/images/site/{{$global_settings->favicon}}" type="image/x-icon">
    <link rel="icon" href="{{config('app.url')}}/storage/images/site/{{$global_settings->favicon}}" type="image/x-icon">
    <link rel="stylesheet" href="{{config('app.url')}}/public/Print/assets/main.css">

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
{!! $global_settings->google_tag_manager_body !!}
<body class="">
<div class="container header-contianer">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 header-left">
            <h1>{{$basic_information->name_surname}}</h1>
            <h2>{{$basic_information->job_title}}</h2>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 header-right">
            <img src="{{config('app.url')}}/storage/images/profile/{{$basic_information->profile_picture}}" alt="{{$basic_information->name_surname}} - {{$basic_information->job_title}}" class="profile-img img-fluid rounded">
        </div>
        <div class="col-sm-12">
            <p>
                Birthday: {{CheckPrivacy($basic_information->birthday, $basic_information, true, share_token: $share_token)}}
            </p>
            <p>
                Email: {{CheckPrivacy($basic_information->email, $basic_information->show_email, share_token: $share_token)}}<
            </p>
            <p>
                Phone: {{CheckPrivacy($basic_information->phone, $basic_information->show_phone, share_token: $share_token)}}
            </p>
            <p>
                Address: {{CheckPrivacy($basic_information->address, $basic_information->show_address, share_token: $share_token)}}
            </p>
            <p>
                Languages: {{$basic_information->languages}}
            </p>

            @if($basic_information->website)
                <p>
                    Web:
                   {{$basic_information->website}}
                </p>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="page-content" aria-label="Content">
    <div class="wrapper"><div class="container intro-container">
            <h3>About Me</h3>
            <div class="col-xs-12 col-sm-8 col-md-9 col-print-12">
                    <p>{!! $basic_information->about !!}</p>

                </div>
            </div>
        </div>

        <div class="container list-container">
            <h3>Professional Skills</h3>

            <div class="row clearfix layout layout-top-middle">
                <div class="card no-print" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
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
                <div class="skills">
                    <ul>
                        @foreach($skills as $skill)
                            <li><span class="progress-badge">{{$skill->skill_name}} - {{$skill->skill_progress}}%</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>


        </div>

        <div class="container list-container">
            <h3>Portfolio</h3>
            @foreach($portfolios as $portfolio)
            <div class="row clearfix layout portfolio-list">
                <div class="col-xs-3 col-sm-4 col-md-3 col-print-4 details">
                    <figure class="cc-effect"><img src="{{config('app.url')}}/storage/images/portfolio/{{$portfolio->portfolio_image}}" alt="{{$portfolio->portfolio_name}}" class="portfolio-image img-fluid profile-img"/></figure>
                </div>
                <div class="col-xs-9 col-sm-4 col-md-3 col-print-8 details">
                    <h4>{{$portfolio->portfolio_name}}</h4>
                    <p>{{$portfolio->portfolio_web}}</p>
                </div>
                <div class="col-xs-9 col-sm-8 col-md-9 col-print-8 content"><p class="quote">{{$portfolio->portfolio_description}}</p>

                </div>
            </div>
            @endforeach

        </div>
        @if($global_settings->github_token)
        <div class="container list-container">
            <h3>My Github Repositories</h3>
            @foreach($github_repos as $github)
                @if(!$github->fork && $github->name!=$global_settings->github_username)
                <div class="row clearfix layout portfolio-list">
                    <div class="col-xs-9 col-sm-6 col-md-6 col-print-12 details">
                        <h4>{{$github->name}}</h4>
                        <a href="{{$github->html_url}}" target="_blank" class="link">{{$github->html_url}}</a>
                    </div>
                    <div class="col-xs-9 col-sm-6 col-md-6 col-print-12 content"><p class="quote">{{$github->description}}</p>

                    </div>
                </div>
                @endif
            @endforeach

        </div>
        @endif

        <div class="container list-container">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Work Experience</h3>
                    @foreach($experiences as $experience)
                        <div class="row clearfix layout layout-left">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-print-12 details">
                                <h4>{{$experience->company_name}}</h4>
                                <p><b>{{$experience->job_title}}</b></p>
                                <p>{{dateformat($experience->start_date, 'M Y')}} - @if($experience->end_date !=null) {{dateformat($experience->end_date, 'M Y')}}@else Present @endif </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-6">
                    <h3>Education</h3>
                    @foreach($educations as $education)
                        <div class="row clearfix layout layout-left">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-print-12 details">
                                <h4>{{$education->school_name}}</h4>
                                <p><b>{{$education->section}}</b></p>
                                <p>{{dateformat($education->start_date, 'Y')}} - @if($education->end_date!=null) {{dateformat($education->end_date, 'Y')}} @else Present @endif </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
<script src="{{config('app.url')}}/public/Print/assets/js/index.js"></script>

</body>


</html>
