
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


<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


  <link rel="stylesheet" type="text/css" href="/cuddlynest/css/style.css">
  
 
 <style >

   .profile
   {
    background-color: #212529;
    padding: 30px;
    width: 400px;
    float: none;
    margin: 0 auto;
    color: white;
    
    border-radius: 20px;
   }

#form_div
{
    background-color: #212529;
    padding: 30px;
    width: auto;
    float: none;
    margin: 0 auto;
    color: white;
    
    border-radius: 20px;
}


 </style>




</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" title="CuddlyNest Assignment" href="">ASSIGNMENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto" style="float:none; margin:0 auto">
      <li class="nav-item active">
        <a class="nav-link" title="Set Your Profile" href="/cuddlynest/user/profile">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" title="See Your Login Details" href="/cuddlynest/user/details">Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" title="logout" href="/cuddlynest/user/logout">logout</a>
      </li>
      
    </ul>

       <div style="color:white" class=" my-2 my-lg-0">
   <h5><?php echo $this->session->userdata('name')?></h4>
   <h6 style="font-size: 12px"><?php echo $this->session->userdata('email')?></h6>
   </div>

   
  </div>
</nav>




<div class="container">
<br>
<div id="alerts">


</div>


<?php 
if($first == "yes")
{
?>

<div>
  
  <h2  style="padding:10px">Hi, <?php echo $this->session->userdata('name')?></h2>
  <p >Welcom to this site. It looks like you have not fill your profile yet!</p>
  <button type="button" id="set_pro" onclick="show_form()"  class="btn btn-primary ">Set Profile </button>

</div>
  


  <div id="profile_div" style="display:none;" class="text-center profile" >
      <img style="border: 3px solid white;" src="/cuddlynest/profile/abc.jpg" class="rounded-circle" alt="Profile Picture" width="200" height="185"> 
    <h1><?php echo $this->session->userdata('name')?></h1>

    <hr style="background-color:white">

    <p><b>Email</b> : <?php echo $this->session->userdata('email')?></p>

    <p><b>Job</b> : <span id="job_pro" > </span> </p>
    <p><b>School/University</b> : <span id="school_p"></span></p>
    <p><b>DOB</b> :  <span id="dob_p"></span></p>
    <p><b>Portfolio</b> : <span id="protfolio_p"></span></p>
   
   <hr style="background-color:white">

   <button type="button" onclick="edit()" class="btn btn-warning">Edit</button>

  </div>







  <div style="display:none;" id="form_div" class="form_style text-center">
  
  <h2 id="heading">Update Profile</h2>
  <br><br>
  
  <form id="myForm" action="/cuddlynest/user/update_profile" method="post">

   <div id="fullname" class="form-group row">
      <label class="col-sm-2 col-form-label" for="job">Job Title:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="job" placeholder="Enter your job title..." name="job">
        <p id="job_v" class="validation"></p>
      </div>

    </div>
 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="school">School/University:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="school" placeholder="Enter your school or university..." name="school">
       <p id="school_v" class="validation"></p>
      </div>
    </div>
  
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="portfolio">Portfolio:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="portfolio" placeholder="Enter your portfolio link..." name="portfolio">
        <p id="portfolio_v" class="validation"></p>
      </div>
    </div>


    <div class="form-group row"> <!-- Date input -->
        <label class="col-sm-2 col-form-label" for="dob">Date of birth:</label>
        <div class="col-sm-10">
          <input class="form-control" id="dob" name="dob" placeholder="MM/DD/YYY" type="text"/>
          <p id="dob_v" class="validation"></p>
        </div>
    </div>




  <br>
  

    <button type="button" id="up_btn" onclick="update()"  class="btn btn-primary ">Update </button>
    
    
  
  
  </form>
  
  
  </div>






<?php 
}
else
{  ?>



  <div id="profile_div" class="text-center profile" >
      <img style="border: 3px solid white;" src="/cuddlynest/profile/abc.jpg" class="rounded-circle" alt="Profile Picture" width="200" height="185"> 
    <h1><?php echo $this->session->userdata('name');?></h1>

    <hr style="background-color:white">

    <p><b>Email</b> : <?php echo $this->session->userdata('email');?></p>
    <p><b>Job</b> : <span id="job_pro"></span><?php echo $profile->job; ?></p>
    <p><b>School/University</b> : <span id="school_p"><?php echo $profile->school; ?></span></p>
    <p><b>DOB</b> :  <span id="dob_p"><?php echo $profile->dob; ?></span></p>
    <p><b>Portfolio</b> : <span id="protfolio_p"><?php echo $profile->portfolio; ?></span></p>
   
   <hr style="background-color:white">

   <button type="button" onclick="edit()" class="btn btn-warning">Edit</button>

  </div>







  <div style="display:none;" id="form_div" class="form_style text-center">
  
  <h2 id="heading">Update Profile</h2>
  <br><br>
  
  <form id="myForm" action="/cuddlynest/user/update_profile" method="post">

   <div id="fullname" class="form-group row">
      <label class="col-sm-2 col-form-label" for="job">Job Title:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="job" value="<?php echo $profile->job; ?>" placeholder="Enter your job title..." name="job">
        <p id="job_v" class="validation"></p>
      </div>

    </div>
 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="school">School/University:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="school" value="<?php echo $profile->school; ?>" placeholder="Enter your school or university..." name="school">
       <p id="school_v" class="validation"></p>
      </div>
    </div>
  
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="portfolio">Portfolio:</label>
      <div class="col-sm-10">
        <input type="text" required class="form-control" id="portfolio" value="<?php echo $profile->portfolio; ?>" placeholder="Enter your portfolio link..." name="portfolio">
        <p id="portfolio_v" class="validation"></p>
      </div>
    </div>


    <div class="form-group row"> <!-- Date input -->
        <label class="col-sm-2 col-form-label" for="dob">Date of birth:</label>
        <div class="col-sm-10">
          <input class="form-control" id="dob" name="dob" value="<?php echo $profile->dob; ?>" placeholder="MM/DD/YYY" type="text"/>
          <p id="dob_v" class="validation"></p>
        </div>
    </div>



  <br>
  

    <button type="button" id="up_btn" onclick="update()"  class="btn btn-primary ">Update </button>
    
    
  
  
  </form>
  
  
  </div>








<?php 
}
?>











<br>


</div>

</body>





<script>
    

    $(document).ready(function(){
      var date_input=$('input[name="dob"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    




$("#up_btn").click(function()
{
  if(validation())
  {
    return
  }
  else
  {
    //var file_data = $('#pro_pic').prop('files')[0];
    
    var job = $("#job").val();
    var school = $("#school").val();
    var dob = $("#dob").val(); 
    var portfolio = $("#portfolio").val();
    
    $("#up_btn").append(' <i class="fa fa-circle-o-notch fa-spin"></i>');
    $("#up_btn").attr("disabled","disabled");


    $.post('/cuddlynest/user/profile_update' , {job:job , school:school , dob:dob , portfolio:portfolio} , function(data){

      if(data == 'updated' || data == 'submitted')
      {
        
        
        $("#school_p").html(school);
        $("#dob_p").html(dob);
        $("#protfolio_p").html(portfolio);
        $("#job_pro").html(job);

        $("#up_btn").removeAttr("disabled");
        $("#up_btn").html('Update ');

        $("#form_div").slideUp();
        $("#profile_div").slideDown();

        $("#alerts").html('<div class="alert alert-success alert-dismissable">'+
          '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
          '<strong>Success!</strong> You have successfully updated your profile.'+
          '</div>');
      }
      else
      {
        alert(data);
      }

    });

  }

});













});











function edit()
{
  $("#profile_div").slideUp();
  $("#form_div").slideDown();
}





function show_form()
{
  $("#set_pro").remove();
  $("#form_div").slideDown();
}




function validation()
{
  var job = $("#job").val();
  var school = $("#school").val();
  var dob = $("#dob").val();

  var msg = "This field is required!";
  var count = 0;

  $("#job_v").html(null);
  $("#school_v").html(null);
  $("#dob_v").html(null);

  if(job.length == 0 )
  {
    $("#job_v").html(msg);
    count++;
  }
  if(school.length == 0 )
  {
    $("#school_v").html(msg);
    count++;
  }
  if(dob.length == 0 )
  {
    $("#dob_v").html(msg);
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







</script>










</html>