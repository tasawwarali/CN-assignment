
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
  


  <link rel="stylesheet" type="text/css" href="/cuddlynest/css/style.css">
  
  
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" title="CuddlyNest Assignment" href="">ASSIGNMENT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto" style="float:none; margin:0 auto">
      <li class="nav-item ">
        <a class="nav-link" title="Set Your Profile" href="/cuddlynest/user/profile">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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


<h1 class="text-center" style="padding:30px">Your Login Details</h1>

 <table class="table table-dark table-hover table-bordered text-center">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    $count = 1;
    foreach($details as $d)
    {
    ?>
      <tr>
        <td><?php echo $count++ ?></td>
        <td><?php echo $d->date ?></td>
        <td><?php echo $d->time ?></td>
      </tr>

    <?php 
    }
    ?>
    </tbody>
  </table>







</div>

</body>


<script>
	


</script>










</html>