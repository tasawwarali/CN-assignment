
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CuddlyNest Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/cuddlynest/css/style.css">
  
  
</head>
<body>






<div class="container">

<h1 class="text-center" style="padding:30px">Welcome!</h1>
  <div class="form_style text-center">
	
	<h2 id="heading">Login</h2>
  <br><br>
  
  <form>

   <div id="fullname" style="display:none" class="form-group row">
      <label class="col-sm-2 col-form-label" for="name">Full Name:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="name" placeholder="Enter full name..." name="name">
        <p id="name_v" class="validation"></p>
      </div>

    </div>
  <br>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="email">Email:</label>
  	  <div class="col-sm-10">
  		  <input type="email" required class="form-control" id="email" placeholder="Enter email..." name="email">
  	   <p id="email_v" class="validation"></p>
      </div>
    </div>
	<br>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="pwd">Password:</label>
  	  <div class="col-sm-10">
  		  <input type="password" required class="form-control" id="pwd" placeholder="Enter password..." name="password">
        <p id="pwd_v" class="validation"></p>
  	  </div>
    </div>
	<br>
  

		<button type="button" id="pri" class="btn btn-primary btn-lg">Login </button>
		
		<button type="button" id="sec"  class="btn btn-secondary">SignUp </button>
	
	
  </form>
  
  
  </div>
</div>


</body>


<script>

$(document).ready(function(){

  var isLogin = 1;


  $("#pri").click(function(e){
    e.preventDefault();

    if(validation())
    {
      return
    }

    $("#pri").attr("disabled","disabled");
    $("#sec").attr("disabled","disabled");
    $("#pri").append(' <i class="fa fa-circle-o-notch fa-spin"></i>');

    var name = $("#name").val();
    var email = $("#email").val();
    var pwd = $("#pwd").val();

    if(isLogin)
    {
      $.post("/cuddlynest/welcome/login/" , { email: email , password: pwd} ,function(data){

        if(data == 'success')
        {
          window.location.replace("/cuddlynest/user/profile");
        }
        else
        {
          $("#email_v").html("Invalid Email or Password!");
          $("#pri").removeAttr("disabled");
          $("#sec").removeAttr("disabled");
          $("#pri").html("Login");
          return;
        }
        
      });
    }
    else
    {
      $.post("/cuddlynest/welcome/signup/" , {name: name , email: email , password: pwd} ,function(data){

        if(data != 'not')
        {
          window.location.replace("/cuddlynest/user/profile");
        }
        else
        {
          $("#email_v").html("This user already exist! <br> Please use another email.");
          $("#pri").removeAttr("disabled");
          $("#sec").removeAttr("disabled");
          $("#pri").html("SignUp");
          return;
        }

      });
    }

  });



  $("#sec").click(function(e){
    e.preventDefault();
    if(isLogin)
    {
      $("#fullname").slideDown("slow");
      $("#pri").html("SignUp");
      $("#sec").html("Login");
      $("#heading").html("SignUp");
      isLogin = 0;
    }
    else
    {
      $("#fullname").slideUp("slow");
      $("#pri").html("Login");
      $("#sec").html("SignUp");
      $("#heading").html("Login");
      isLogin = 1;
    }

  });






  function validation()
  {
    var name = $("#name").val();
    var email = $("#email").val();
    var pwd = $("#pwd").val();
    var msg = "This field is required!";
    var count = 0;

    $("#name_v").html(null);
    $("#email_v").html(null);
    $("#pwd_v").html(null);
    if(name.length == 0 && isLogin == 0)
    {
      $("#name_v").html(msg);
      count++;
    }
    if(email.length == 0 )
    {
      $("#email_v").html(msg);
      count++;
    }
    if(pwd.length == 0 )
    {
      $("#pwd_v").html(msg);
      count++;
    }

    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email.length > 0  && !regex.test(email))
    {
      $("#email_v").html("It should be a valid email address!");
      count++;
    }
    if(pwd.length > 0  && pwd.length < 6)
    {
      $("#pwd_v").html("Password length should be greater than 5");
      count++;
    }

    if(count == 0)
    {
      return false;
    }
    else
    {
      return true;
    }


  }







});




</script>










</html>