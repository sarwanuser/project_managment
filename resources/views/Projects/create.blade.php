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
                            <h3 class="heading">Add Projects</h3><br>
                        </div>
                    </div>
                <!-- End Projects Heading -->

                <form id="myForm">
                    <!-- Start Projects Details -->
                        <div class="row">
                            <!-- Project Name -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Project Name</label><br>
                                <input type="text" class="form-control" name="name" id="" required>
                            </div>
                            
                            <!-- Project Technology -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Used Technology</label><br>
                                <input type="text" class="form-control" name="technology" id="" required>
                            </div>
    
                            <!-- Your Role -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Your Role</label><br>
                                <input type="text" class="form-control" name="role" id="" required>
                            </div>
    
                            <div class="col-md-12"><br></div>
                            <!-- Project Start Date -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Start Date</label><br>
                                <input type="date" class="form-control" name="start_date" id="" required>
                            </div>
    
    
                            <!-- Project Name -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Duration In Months</label><br>
                                <input type="number" class="form-control" name="duration" id="" required>
                            </div>
    
                            <!-- Main Image -->
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <label for="">Main Image</label><br>
                                <input type="file" class="form-control" name="main_image" id="" required accept=".jpg,.png"/>
                            </div>
    
                            <div class="col-md-12  col-sm-12 col-xs-12">
                                <br><label for="">Description</label><br>
                                <textarea name="description" id=""  class="col-md-12 col-sm-12 col-xs-12"></textarea>
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
                                    <tr class="rmbtr">
                                        <td>1</td>
                                        <td><input type="text" class="form-control" required name="pr_sub_title[]" /></td>
                                        <td><input type="file" class="form-control" required id="company_logo" name="pr_sub_image[]"  accept=".jpg,.png" /></td>
                                        <td><i class="fa fa-plus btn btn-success" title="Click for add new sub details" onclick="addMore()"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" id="submit_btn" class="btn btn-primary mr-2">Add</button>
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
                var url = '/store';
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend:function(){
                        btn.html("<i class='fa fa-circle-o-notch fa-spin'></i> Adding");
                    },
                    success: function(data) {
                        if (data.status=='1') {
                            // Ajax call completed successfully
                            // alert(data.msg);
                            msg.show().html(data.msg).css('color', 'green');
                            jQuery('#myForm').trigger('reset');
                            jQuery('.rmbtrAddon').remove();
                            btn.html("Add");
                            setTimeout(() => {
                                jQuery(msg).html('&nbsp;');
                            },3500);
                        } else {
                            // alert(data.msg);
                            msg.show().html(data.msg).css('color', 'red');
                            btn.html("Add");
                        }
                    },
                    error: function(data) {
                        // Some error in ajax call
                        // alert("some Error");
                        msg.show().html("some Error").css('color', 'red');
                        btn.html("Add");
                    }
                });  
            });
        });

        
	    var j =1;
		function addMore(){
            j++;
            jQuery('tbody').append(`
                                <tr class="rmbtr rmbtrAddon">
                                    <td>${j}</td>
                                    <td><input type="text" class="form-control" required name="pr_sub_title[]" /></td>
                                    <td><input type="file" class="form-control" required id="company_logo" name="pr_sub_image[]"  accept=".jpg,.png" /></td>
                                    <td><i class="fa fa-plus btn btn-success" title="Click for add new sub details" onclick="addMore()"></i><i class="fa fa-trash-o btn btn-danger"  title="Click for remove sub details"></i></td>
                                </tr>
                                `);
        }

        jQuery(document).on('click','.fa-trash-o',function(){
            jQuery(this).closest('tr').remove();
        });
    </script>
</html>