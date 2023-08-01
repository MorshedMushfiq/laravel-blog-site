<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Markedia - Marketing Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
   @include('layouts.css')
</head>
<body>


    <div id="wrapper">

        <header class="market-header header">

            <div class="container-fluid">
  
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="marketing-index.html"><img src="{{asset('asset/images/version/market-logo.png')}}" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-category.html">Marketing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-category.html">Make Money</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('blog.page')}}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <form action="{{route('search.homepost')}}" method='POST' class="form-inline" enctype="multipart/form-data">
                            @csrf
                            <input name='searchhome' class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                            <input name='submit' class="btn btn-outline-success my-2 my-sm-0" type="submit" value='Search'>
                        </form>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->