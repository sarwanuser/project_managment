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
    <title>Update Project</title>
    <style>
        .heading{
            text-align: center;
        }
        .row{
            width: 100%;
        }
        .mdi-plus{
            cursor: pointer;
            color: green;
            padding: 1px 3px !important;
        }
        .mdi-delete-forever{
            cursor: pointer;
            color: red;
            padding: 1px 3px !important;
            margin-left: 5px !important;
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
                            <br><a href="{{url('/')}}"><i class="fa fa-arrow-circle-left" style="font-size:40px" title="Click for view all projects"></i></a>
                        </div>
                        
                        <div class="col-md-9">
                            <h3 class="heading">Update Project</h3><br>
                        </div>
                    </div>
                <!-- End Projects Heading -->

                <form id="myForm">
                    <!-- Start Projects Details -->
                        <div class="row">
                            <!-- Project Name -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Project Name</label><br>
                                <input type="text" class="form-control" name="name" id="" value="{{$projects->name}}" required>
                            </div>
                            
                            <!-- Project Technology -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Used Technology</label><br>
                                <input type="text" class="form-control" name="technology" id="" value="{{$projects->technology}}" required>
                            </div>
    
                            <!-- Your Role -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Your Role</label><br>
                                <input type="text" class="form-control" name="role" id="" value="{{$projects->role}}" required>
                            </div>
    
                            <div class="col-md-12"><br></div>
                            <!-- Project Start Date -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Start Date</label><br>
                                <input type="date" class="form-control" name="start_date" id="" value="{{$projects->start_date}}" required>
                            </div>
    
    
                            <!-- Project Name -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Duration In Months</label><br>
                                <input type="number" class="form-control" name="duration" id="" value="{{$projects->duration}}" required>
                            </div>
    
                            <!-- Main Image -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Main Image</label><br>
                                <div class="row">
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        <input type="file" class="form-control" name="main_image" id="" accept=".jpg,.png"/>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <a href="{{url('/public/images/projects/'.$projects->main_image)}}" title="click for view image"><img src="{{url('/public/images/projects/'.$projects->main_image)}}" class="card-img-top" alt="{{$projects->main_image}}" width="30px" height="30px"/></a>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-12  col-sm-12 col-xs-12">
                                <br><label for="">Description</label><br>
                                <textarea name="description" id=""  class="col-md-12 col-sm-12 col-xs-12" required>{{$projects->description}}</textarea>
                            </div>
                        </div>
                    <!-- End   Projects Details -->
                    
                    <!-- start gallaries Details -->
                        <br><h4>Gallary Details</h5>
                        <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    @php $j=1; @endphp
                                    @foreach($Images as $datas)
                                        <tr class="rmbtr">
                                            <td>{{$j}}</td>
                                            <td><input type="text" class="form-control" required name="pr_sub_title[]" value="{{$datas->pr_sub_title}}"/></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                                        <input type="file" class="form-control subIMG" id="company_logo" name="pr_sub_image[]"  accept=".jpg,.png" />
                                                        <input type="hidden" required name="pr_sub_image[]" value="{{$datas->pr_sub_image}}" />
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                                        <a href="{{ URL::to('/') }}/public/images/projects/subimg/{{$datas->pr_sub_image}}" target="blank"><img class="img-lg rounded-square" src="{{ URL::to('/') }}/public/images/projects/subimg/{{$datas->pr_sub_image}}" alt="profile photo" width="30px" height="30px"></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><i class="fa fa-plus btn btn-success" title="Click for add new sub details" onclick="addMore()"></i>&nbsp;@if($j!='1')<i class="fa fa-trash-o btn btn-danger"  title="Click for remove sub details"></i>@endif</td>
                                        </tr>
                                    @php $j++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" id="submit_btn" class="btn btn-primary mr-2">Update</button>
                        <div id="alertMSG" style="font-size: 12px; padding: 2px; display: none">&nbsp;</div>
                    <!-- End gallaries Details -->                    
                </form>
            </div>
            <div class="col-md-2">&nbsp;</div>
        </div>
    </div>
</body>
    <script>  
        jQuery(document).ready(function(){
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery('#myForm').on('submit', function(e){
                e.preventDefault();
                var btn  = jQuery('#submit_btn');
                var msg  = $('#alertMSG');
                var form = new FormData(this);
                let files = jQuery('#company_logo');
                form.append('files', files);
                var url = '/update-{{$projects->id}}';
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend:function(){
                        btn.html("<i class='fa fa-circle-o-notch fa-spin'></i> Updating");
                    },
                    success: function(data) {
                        if (data.status=='1') {
                            // Ajax call completed successfully
                            // alert(data.msg);
                            msg.show().html(data.msg).css('color', 'green');
                            btn.html("Update");
                            setTimeout(() => {
                                location.reload();
                                jQuery(msg).html('&nbsp;');
                            },3500);
                        } else {
                            // alert(data.msg);
                            msg.show().html(data.msg).css('color', 'red');
                            btn.html("Update");
                        }
                    },
                    error: function(data) {
                        // Some error in ajax call
                        // alert("some Error");
                        msg.show().html("some Error").css('color', 'red');
                        btn.html("Update");
                    }
                });  
            });
        });

        
	    var j ='{{$j}}';
		function addMore(){
            jQuery('tbody').append(`
                <tr class="rmbtr rmbtrAddon">
                    <td>${j}</td>
                    <td><input type="text" class="form-control" required name="pr_sub_title[]" /></td>
                    <td><input type="file" class="form-control" required id="company_logo" name="pr_sub_image[]"  accept=".jpg,.png" /></td>
                    <td><i class="fa fa-plus btn btn-success" title="Click for add new sub details" onclick="addMore()"></i>&nbsp;<i class="fa fa-trash-o btn btn-danger"  title="Click for remove sub details"></i></td>
                </tr>
                `);
            j++;
        }

        jQuery(document).on('click','.fa-trash-o',function(){
            jQuery(this).closest('tr').remove();
        });
    </script>
</html>