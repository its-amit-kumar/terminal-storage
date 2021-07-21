<?php
session_start();
if(!isset($_SESSION['email'])){
	header('location: login.php');
}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Terminal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
  <!-- Style.css -->
  <link rel="stylesheet" href="../stylenav.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="src/css/terminal_request.css" />
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-mainbg">
    <!-- Logo -->
    <a class="navbar-brand navbar-logo" href="index.php"><button class="btn btn-warning"> <i class="fas fa-chart-bar"></i>Terminal Storage</button></a>
    <!-- Collapse Button -->
    <button 
      class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-white"></i>
    </button>
    <!-- Links -->
    <div 
      class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <!-- For Styling -->
            <div class="hori-selector">
              <div class="left"></div>
              <div class="right"></div>
            </div>
            <!-- Nav Links -->
            <li class="nav-item">
                <a 
                  class="nav-link" href="../viewfiles.php">
                  <i 
                    class="fas fa-tachometer-alt">
                  </i>View files
                </a>
            </li>
            <li class="nav-item active">
                <a 
                  class="nav-link" href="../fileupload.php">
                  <i 
                    class="far fa-address-book">
                  </i>upload files
                </a>
            </li>
            <li class="nav-item">
                <a 
                  class="nav-link" href="request_terminal.php">
                  <i class="far fa-clone">
                  </i>Request terminal
                </a>
            </li>
         
            <li class="nav-item">
                <a 
                  class="nav-link" href="../logout.php">
                <button class="btn btn-danger">Logout</button>
                </a>
            </li>
        </ul>
    </div>
  </nav>



  <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Request Terminal</h3>
                        <p>Fill in the data below.</p>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="text" id="username" placeholder="Username" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>



                           <div class="col-md-12 mt-3">
                            <label class="mb-3 mr-1" for="gender">Usage: </label>

                            <input type="radio" class="btn-check" name="isSharable" id="male" value="0" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Personal</label>

                            <input type="radio" class="btn-check" name="isSharable" id="female" value="1" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Share</label>
                               <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div>
                  

                            <div class="form-button mt-3">
                                <button id="submit" class="btn btn-primary">Request</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




  </body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="src/js/terminal_request.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- Custom Script -->
  <script src="../script.js"></script>
</html>
