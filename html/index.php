<?php
 session_start();
 if(!isset($_SESSION['email'])){
 	header('location: login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Terminal Storage</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
  <!-- Style.css -->
  <link rel="stylesheet" href="stylenav.css">
</head>
<body class="body">
  <!-- Navbar -->
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
                  class="nav-link" href="viewfiles.php">
                  <i 
                    class="fas fa-tachometer-alt">
                  </i>View files
                </a>
            </li>
            <li class="nav-item active">
                <a 
                  class="nav-link" href="upload.php">
                  <i 
                    class="far fa-address-book">
                  </i>upload files
                </a>
            </li>
            <li class="nav-item">
                <a 
                  class="nav-link" href="./amit/request_terminal.php">
                  <i class="far fa-clone">
                  </i>Request terminal
                </a>
            </li>
         
            <li class="nav-item">
                <a 
                  class="nav-link" href="logout.php">
                <button class="btn btn-danger">Logout</button>
                </a>
            </li>
        </ul>
    </div>
  </nav>
    
        <div class="content">
            <h1>Save your files with ease. </h1>
            <div>
                <button type="button" id="upload" ><span></span>Upload Files</button>
                <script type="text/javascript">
                    document.getElementById("upload").onclick = function () {
                        location.href = "fileupload.php";
                    };
                </script>
                <button type="button" id="viewfiles"><span></span>View Files</button>
                <script type="text/javascript">
                    document.getElementById("viewfiles").onclick = function () {
                        location.href = "viewfiles.php";
		    };
                </script>
		<button id="terminal"  type="button"><span></span>Request terminal</button>
 <script>

 		    document.getElementById("terminal").onclick = function(){
			    location.href = "amit/request_terminal.php";
		    }
		</script>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- Custom Script -->
  <script src="script.js"></script>
    
</body>
</html>
