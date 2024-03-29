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
    <title>All Projects</title>
    <style>
        .row{
            width: 100%;
        }
        .card{
            margin-top: 10px;
            padding-bottom: 2px;
            border-radius: 5%;
            text-align: center;
            background-color: #555;
        }
        .clickable{
            text-decoration: none !important;
            color: white !important;
        }
        img{
            border-top-right-radius: 5%;
            border-top-left-radius: 5%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-8">

                <!-- Start Projects Heading -->
                <div class="row">
                    <div class="col-md-3">
                        <br><a class="btn btn-primary" href="{{url('/create')}}"><i class="fa fa-plus" style="font-size:15px" title="Click for add new project"></i></a>
                    </div>
                    
                    <div class="col-sm-3 col-md-3">
                        <h3 class="heading">All Projects</h3><br>
                    </div>

                    <div class="col-sm-6 col-md-6" style="margin-top: 23px;">
                        @if(Session::has('Failed'))<span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Failed')}}</span>@endif
                        @if(Session::has('Success'))<span id="Massage" style="color: green;" min-height="10px" max-height="10px"> &nbsp; {{Session::get('Success')}}</span>@endif
                    </div>
                </div>
                <!-- End Projects Heading -->

                <div class="row">
                    @foreach($projects as $key=>$project)
                        <div class="col-md-4">  
                            <div class="card">
                                <a href="{{url('/show-'.$project->id)}}" class="clickable">
                                    <img src="{{url('/public/images/projects/'.$project->main_image)}}" class="card-img-top" alt="{{$project->main_image}}" width="100%" height="125px"/>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$project->name}}</h5>
                                        <p class="card-text">({{$project->technology}})</p>
                                        <p class="card-text">{{date('d-m-Y', strtotime($project->start_date))}}</p>
                                        <p class="card-text">{{$project->duration}} months</p>
                                        <p class="card-text">
                                            <a href="{{url('/edit-'.$project->id)}}"><i class="fa fa-edit" style="font-size:15px;color:#1be61b;" title="Click for edit project"></i></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="{{url('/delete-'.$project->id)}}"><i class="fa fa-trash" style="font-size:15px;color:red;" title="Click for delete project"></i></a>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
        </div>
    </div>
</body>
    <script>
        jQuery(document).ready(function() {
            setTimeout(() => {
                jQuery('#Massage').html('&nbsp;');
            },5000);
        });
    </script>
</html>