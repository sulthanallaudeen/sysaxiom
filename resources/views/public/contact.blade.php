@extends('layout.public')
@section('content')

   <div class="container theme-showcase" role="main">

      
      <div class="jumbotron">
   <p style="text-align:center">     
I can be reached via email at <br><b>sa (SHIFT+2) sysaxiom (period) com | allaudeen (period) s (SHIFT+2) gmail (period) com </b>*
</p>
<br>

* If you are a human, you should be able to decipher the email address.
      </div>
    	
		
		
      <div class="well">
	  <div class="alert alert-success" id="mailSentSucess" style="display:none"><span id="mailResultSuccess"</span></div>
	  <div class="alert alert-danger" id="mailSentFailure" style="display:none"><span id="mailResultFailure"</span></div>
	<div id="formContent">
   		{!! Form::open(array('url' => 'tagPost', 'name' => 'tagPost', 'id' => 'tagPost','class' => 'form-horizontal'))!!}
    <input type="hidden", "_token"  name="_token" value="{{ csrf_token()}}" >
   			<h2>Email Me</h2>
        <input type="text" id="userEmail" class="form-control" placeholder="Email address" autofocus>
        <textarea class="form-control" id="userMessage" rows="3" placeholder="Message"></textarea>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="sendMail">Send</button>
      {!! Form::close() !!}
      </div>
      </div>
	  </div>
    </div>


<script>
$(document).ready(function() {

  
  $( "#sendMail" ).click(function() {
  event.preventDefault();
  var _token = $("input[name=_token]").val();
  var userEmail = $("#userEmail").val();
  var userMessage = $("#userMessage").val();
  $.post( "sendMail", { _token : _token, userEmail : userEmail, userMessage : userMessage })
  .done(function( data ) {
    var result = jQuery.parseJSON(JSON.stringify(data));
    if (result.success==1)
    { 
     $("#mailSentFailure").hide();
	 $("#formContent").hide();
	 $("#mailResultSuccess").html("Mail Sent Succesfully.. Mail Id : "+result.mailId);
	 $("#mailSentSucess").show();

    }
    else
    {
    
     $("#mailResultFailure").html("");
	 $("#mailResultFailure").html(result.error.userEmail);
	 $("#mailResultFailure").append(result.error.userMessage);
	 $("#mailSentFailure").show();

    }

  });
});


} );

</script>
<script>
$( document ).ready(function() {
  $( "#s" ).click(function() {
    var _token = $("input[name=_token]").val();
    event.preventDefault();
var emailSender = $("#userEmail").val();
var userMessage = $("#userMessage").val();
alert(_token);
alert(emailSender);
alert(userMessage);
$.post( "postTag", { _token : _token, userEmail : userEmail, userMessage : userMessage })
  .done(function( data ) {
    alert(data);
    $(".well").html("");
    $(".mailResult").html("Mail Sent Succesfully");
  });


    
});
});
</script>
    @stop