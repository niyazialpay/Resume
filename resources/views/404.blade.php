<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <title>404 Bulunamadı!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{config('app.url')}}/public/CV/css/bootstrap.min.css" />
    <script src="{{config('app.url')}}/public/CV/js/core/jquery.3.2.1.min.js"></script>
    <style>
        body{
            background: #000082;
            color:#ffffff;
            font-family: 'lucida-console','Lucida Console', arial, serif ;
        }
        @font-face {
            font-family: lucida-console;
            src: url('{{config('app.url')}}/public/CV/css/lucida-console.ttf');
        }
        a{
            color:#ffffff;
            text-decoration: none;
        }
        a:hover{
            color:#8896ff;
        }
        .container{
            margin-top: 15px;
        }
    </style>
</head>
<body>
<audio id="bluescreen" autoplay>
    <source src="/public/bluescreen.mp3" type="audio/mpeg">
</audio>
<div class="container">
    <div class="row">
        <div class="col-12">
            <p>An unexpected error has occurred. The web server could not find a response to the request you sent.</p>
            <p>This problem is probably caused by the web browser accessing a page that does not exist.</p>
            <p>The possible error code of this problem is as follows</p>
            <p>THE_PAGE_NOT_FOUND_404</p>
            <p></p>
            <p>If this is the first time you encounter this error, restart your browser, if the error repeats, click one of the links below.</p>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/#contact">Contact</a></li>
            </ul>
            <p>If you stubbornly continue to encounter this error, <a href="/#contact">contact</a> the site administrator.</p>
        </div>
    </div>
</div>
</body>
</html>
