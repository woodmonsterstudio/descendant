<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" content="Descendant is designed for keep track of your family tree in simplify way.">
    <meta name="Keywords" content="family">
    <meta name="Author" content="WoodMonster Studio">
    <meta name="charset="utf-8">
    <meta name="Robots" content="index, follow">


    <title>{{env('APP_NAME')}}</title>

    <!-- Bootstrap core CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1010545338572807",
        enable_page_level_ads: true
      });
    </script>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        {{-- <a class="navbar-brand" href="{{route('welcome')}}">{{env('APP_NAME')}}</a> --}}
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('login',['demo'=>'true'])}}">Demo</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="index.html">Log In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Register</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('images/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>{{env('APP_NAME')}}</h1>
              <span class="subheading">Track Your Roots</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a>
              <h2 class="post-title">
                Objective
              </h2>
              <h3 class="post-subtitle">
                To Create A Simple Tool Of Tracking Your Family Tree.
              </h3>
            </a>
            <p class="post-meta"></p>
          </div>
          <hr>
          <div class="post-preview">
            <a>
              <h2 class="post-title">
                Frameworks, Libraries, Templates
              </h2>
              <h3 class="post-subtitle"></h3>
                <li><a class="btn-link" target="_blank" href="https://laravel.com/" role="button">Laravel 5.5</a></li>
                <li><a class="btn-link" target="_blank" href="https://jquery.com/" role="button">Jquery</a></li>
                <li><a class="btn-link" target="_blank" href="https://getbootstrap.com/" role="button">Bootstrap 4</a></li>
                <li><a class="btn-link" target="_blank" href="https://startbootstrap.com/template-overviews/clean-blog/" role="button">Start Bootstrap - Clean Blog</a></li>
                <li><a class="btn-link" target="_blank" href="https://www.flickr.com/photos/68716695@N06/" role="button">Landing Page Image</a></li>
                <li><a class="btn-link" target="_blank" href="http://plugins.krajee.com/file-input" role="button">Bootstrap File Input</a></li>
                <li><a class="btn-link" target="_blank" href="https://github.com/dabeng/OrgChart" role="button">OrgChart</a></li>
                <li><a class="btn-link" target="_blank" href="https://select2.org/" role="button">Select2</a></li>
            </a>
            <p class="post-meta"></p>
          </div>
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p class="copyright text-muted">Copyright &copy; Descendant.my {{Carbon::now()->format('Y')}}</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>
</html>