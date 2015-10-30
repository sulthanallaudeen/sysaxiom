@extends('layout.admin')
@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile Settings</h1>
					<div class="alert alert-success" id="adminProfileStatusBarSuccess" style="display:none"></div>
					<div class="alert alert-warning" id="adminProfileStatusBarFailure" style="display:none"></div>
                </div>
                <!-- /.col-lg-12 -->						
            </div>
            <!-- /.row -->
            <div class="row">
			{!! Form::open(array('url' => 'blogPost', 'name' => 'blogPost', 'id' => 'blogPost','class' => 'form-horizontal'))!!}
			<input type="hidden" id="adminProfileId" value=''>
                <div class="col-lg-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Admin Panel Username <button type="button" class="btn btn-default disabled" id='adminProfileUserName'></button>
                        </div>
                        <div class="panel-body">
							<input class="form-control" placeholder='New UserName' id="newUserName">
                        </div>
                        <div class="panel-footer">
						<p align="center">
                            <button type="button" class="btn btn-default" id="updateAdminUserName">Update UserName</button>
						</p>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Admin Panel Email <button type="button" class="btn btn-default disabled" id='adminProfileEmail'></button>
                        </div>
                        <div class="panel-body">
                            <input class="form-control" placeholder='New Email' id="newEmail">
                        </div>
                        <div class="panel-footer">
						<p align="center">
                            <button type="button" class="btn btn-default" id="updateAdminEmail">Update Email</button>
						</p>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Admin Panel Password
                        </div>
                        <div class="panel-body">
								<input class="form-control" placeholder='Old Password' id="oldPassword">
								<input class="form-control" placeholder='New Password' id="newPassword">
                        </div>
                        <div class="panel-footer">
						<p align="center">
                            <button type="button" class="btn btn-default" id="updateAdminPassword">Update Password</button>
						</p>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
				{!! Form::close() !!}
            </div>
            <!-- /.row -->
           <div class="row" style='display:none'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Some Additional Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">What Special Here ?</a>
                                </li>
                                <li><a href="#data" data-toggle="tab">Data</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>Change Info</h4>
                                    <p>This Tab Contains when and what is changed with Date and Time</p>
                                </div>
                                <div class="tab-pane fade" id="data">
                                    <h4>Profile Tab</h4>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Settings Item</th>
                                            <th>Changed Date</th>
                                            <th>Changed Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
											<td>Email</td>
                                            <td>29-10-1995</td>
                                            <td>10 am</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script>
$(document).ready(function() {
var _token = $("input[name=_token]").val();
$.post( "getAdminProfileSettingsData", { _token : _token})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    if (result.success==1)
    {
	$("#adminProfileId").val(result.adminData.id);
	$("#adminProfileUserName").text(result.adminData.name);
	$("#adminProfileEmail").text(result.adminData.email);
    }
    else
    {
	$("#adminProfileStatusBarFailure").show();
    $("#adminProfileStatusBarFailure").html("Error in Fetching Data");
    }
  });
 $( "#updateAdminUserName" ).click(function() {
  var _token = $("input[name=_token]").val();
  var adminUserName =  $("#newUserName").val();
  var id =  $("#adminProfileId").val();
  $.post( "updateAdminUserName", { _token : _token, name : adminUserName, id :id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    if (result.success==1)
    {
	$("#adminProfileUserName").html(adminUserName);
	$("#adminProfileStatusBarFailure").hide();
    $("#adminProfileStatusBarSuccess").html("Admin Username Updated successfully..");
    $("#adminProfileStatusBarSuccess").show(1000);
    $("#adminProfileStatusBarSuccess").hide(2000);
    }
    else
    {
    $("#adminProfileStatusBarSuccess").hide();
    $("#adminProfileStatusBarFailure").html(result.err.name);
    $("#adminProfileStatusBarFailure").show(1000);
    $("#adminProfileStatusBarFailure").hide(2000);
    }
  });
});
$( "#updateAdminEmail" ).click(function() {
  var _token = $("input[name=_token]").val();
  var adminEmail =  $("#newEmail").val();
  var id =  $("#adminProfileId").val();
  $.post( "updateAdminEmail", { _token : _token, email : adminEmail, id :id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    if (result.success==1)
    {
	$("#adminProfileEmail").html(adminEmail);
	$("#adminProfileStatusBarFailure").hide();
    $("#adminProfileStatusBarSuccess").html("Admin Email Updated successfully..");
    $("#adminProfileStatusBarSuccess").show(1000);
    $("#adminProfileStatusBarSuccess").hide(2000);
    }
    else
    {
    $("#adminProfileStatusBarSuccess").hide();
    $("#adminProfileStatusBarFailure").html(result.err.email);
    $("#adminProfileStatusBarFailure").show(1000);
    $("#adminProfileStatusBarFailure").hide(2000);
    }
  });
});
$( "#updateAdminPassword" ).click(function() {
  var _token = $("input[name=_token]").val();
  var oldPassword =  $("#oldPassword").val();
  var newPassword =  $("#newPassword").val();
  var id =  $("#adminProfileId").val();
  $.post( "updateAdminPassword", { _token : _token, oldPassword : oldPassword, password:newPassword, id :id})
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    if (result.success==1)
    {
	$("#adminProfileStatusBarFailure").hide();
    $("#adminProfileStatusBarSuccess").html("Admin Password Updated successfully..");
    $("#adminProfileStatusBarSuccess").show(1000);
    $("#adminProfileStatusBarSuccess").hide(2000);
    }
    else
    {
    $("#adminProfileStatusBarSuccess").hide();
	$("#adminProfileStatusBarFailure").html(result.err);
	$("#adminProfileStatusBarFailure").append(result.err.password);
    $("#adminProfileStatusBarFailure").show(1000);
    $("#adminProfileStatusBarFailure").hide(2000);
    }
  });
});

$( "#changeUserName" ).keypress(function() {
  var blogTitle =  $("#blogTitle").val();
  var blogUrl = blogTitle.replace(/\s+/g, "-");
  $("#blogUrl").val(blogUrl);
});
  $( "#postBlog" ).click(function() {
  var _token = $("input[name=_token]").val();
  var blogTitle =  $("#blogTitle").val();
  var blogUrl =  $("#blogUrl").val();
  var blogDate =  $("#blogDate").val()+' '+$("#blogTime").val();
  var blogContent = CKEDITOR.instances['blogpost'].getData();
  var blogStatus =   $('input:radio[name=blogStatus]:checked').val();
  var blogTags = [];
  $('input[name=blogTags]:checked').map(function() {
              blogTags.push($(this).val());
  });


  $.post( "postBlog", { _token : _token, blogTitle: blogTitle, blogUrl: blogUrl, blogContent:blogContent, blogTags:blogTags, blogDate : blogDate, blogStatus:blogStatus })
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    if (result.success==1)
    {
    }
    else
    {
    $("#blogPostFailure").html(" ");  
    }
  });
});
});
</script>
@stop