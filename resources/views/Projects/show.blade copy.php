<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Projects Details</title>
    <style>
        .heading{
            text-align: center;
        }
        .row{
            width: 100%;
        }
        .card{
            margin-top: 10px;
            padding-bottom: 2px;
            text-align: center;
            /* border-radius: 5%;
            background-color: #555; */
        }
        .card-title{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Start Project Details -->
        <div class="row">
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-8">
                <!-- Start Projects Heading -->
                    <div class="row">
                        <div class="col-md-3">
                            <br><a href="{{url('/')}}"><i class="fa fa-arrow-circle-left" style="font-size:40px" title="Click for view all projects"></i></a>
                        </div>
                        
                        <div class="col-md-9">
                            <h3 class="heading">Project Details</h3><br>
                        </div>
                    </div>
                <!-- End Projects Heading -->
                
                <div class="row">
                    <div class="card">
                        <img src="{{url('/images/projects/'.$projects->main_image)}}" class="card-img-top" alt="{{$projects->main_image}}" width="100%" height="125px"/>
                        <div class="card-body">
                            <h5 class="card-title">Project Name - {{$projects->name}}</h5>
                            <p class="card-text">Used Technology - ({{$projects->technology}})</p>
                            <p class="card-text">Start Date - {{date('d-m-Y', strtotime($projects->start_date))}}</p>
                            <p class="card-text">Duration - {{$projects->duration}} Months</p>
                            <p class="card-text">Details - {{$projects->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
        </div>
        <!-- End Project Details -->

        <!-- Start Carousel -->
        <div class="row">
            <div class="col-md-3">&nbsp;</div>
            <div class="col-md-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach($Images as $key=>$Image)
                            @if($key=='0')
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                            @endif
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($Images as $key1=>$Image1)
                            @if($key1=='0')
                                <div class="item active">
                                    <img src="{{url('/images/projects/subimg/'.$Image1->pr_sub_image)}}" alt="{{$Image1->pr_sub_image}}" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>{{$Image1->pr_sub_title}}</h3>
                                    </div>
                                </div>
                            @else
                                <div class="item">
                                    <img src="{{url('/images/projects/subimg/'.$Image1->pr_sub_image)}}" alt="{{$Image1->pr_sub_image}}" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>{{$Image1->pr_sub_title}}</h3>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">&nbsp;</div>
        </div>
        <!-- End Carousel -->

        {{--<!-- Start details show in on row -->
        <div class="row">
            <!-- Start Projects Heading -->
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-2">
                        <br><a href="{{url('/projects')}}"><i class="fa fa-arrow-circle-left" style="font-size:40px" title="Click for view all projects"></i></a>
                    </div>
                    
                    <div class="col-md-8">
                        <h3 class="heading">Project Details</h3><br>
                    </div>
                </div>
            <!-- End Projects Heading -->
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-4">
                <div class="row">
                    <div class="card">
                        <img src="{{url('/images/projects/'.$projects->main_image)}}" class="card-img-top" alt="{{$projects->main_image}}" width="100%" height="125px"/>
                        <div class="card-body">
                            <h5 class="card-title">Project Name - {{$projects->name}}</h5>
                            <p class="card-text">Used Technology - ({{$projects->technology}})</p>
                            <p class="card-text">Start Date - {{date('d-m-Y', strtotime($projects->start_date))}}</p>
                            <p class="card-text">Duration - {{$projects->duration}} Months</p>
                            <p class="card-text">Details - {{$projects->description}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach($Images as $key=>$Image)
                            @if($key=='0')
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                            @endif
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($Images as $key1=>$Image1)
                            @if($key1=='0')
                                <div class="item active">
                                    <img src="{{url('/images/projects/subimg/'.$Image1->pr_sub_image)}}" alt="{{$Image1->pr_sub_image}}" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>{{$Image1->pr_sub_title}}</h3>
                                    </div>
                                </div>
                            @else
                                <div class="item">
                                    <img src="{{url('/images/projects/subimg/'.$Image1->pr_sub_image)}}" alt="{{$Image1->pr_sub_image}}" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h3>{{$Image1->pr_sub_title}}</h3>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-1">&nbsp;</div>
        </div>
        <!-- End details show in on row -->--}}
    </div>
</body></html>