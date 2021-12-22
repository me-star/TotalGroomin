<?php
  include_once 'includes/session.php'

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css"/>


    <title>Total Groomin - <?php echo $title?></title>
  </head>
  <body>
  <div class="container">
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Complete Grooming</a> <!-- https://attendance-re.herokuapp.com//index.php-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
         aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav nav-tabs" id="navbarNav">
        
       <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/totalgroomin/index.php">Home</a>
       </li>
      <li class="nav-item">
          <a class="nav-link active" href="/totalgroomin/appointments.php">Appointment</a>
      </li>
      <li class="nav-item">
          <a class="nav-link active" href="/totalgroomin/scripts/viewrecords.php">View Clients</a>
      </li>
      <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
      </li>
      <li class="navbar-nav ml-auto">
        <?php
            if(!isset($_SESSION['userid'])){
         ?>     
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
         <?php } else{ ?>     
            <span>Hello <?php echo $_SESSION['username'] ?>! </span>
          <a class="nav-link active" aria-current="page" href="login.php">Logout</a>
          <?php } ?>
        </li>
        </ul>        

      </ul>
    </div>
  </div>
</nav>
<br/>

