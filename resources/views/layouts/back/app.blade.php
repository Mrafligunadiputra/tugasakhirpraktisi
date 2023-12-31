<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('front/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
       @include('layouts.back.inc.header')
       
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                @yield('content')   
                <!-- Side widgets-->
                    <div class="col-lg-4">
                            <!-- Search widget-->
                            <div class="card mb-4">
                                <div class="card-header">Search</div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Categories widget-->
                            <div class="card mb-4">
                                <div class="card-header">Categories</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#!">Web Design</a></li>
                                                <li><a href="#!">HTML</a></li>
                                                <li><a href="#!">Freebies</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#!">JavaScript</a></li>
                                                <li><a href="#!">CSS</a></li>
                                                <li><a href="#!">Tutorials</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Side widget-->
                            <div class="card mb-4">
                                <div class="card-header">Side Widget</div>
                                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                            </div>
                        </div>


        <!-- Footer-->
        @include('layouts.footer')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{('front/js/scripts.js')}}"></script>
    </body>
</html>

