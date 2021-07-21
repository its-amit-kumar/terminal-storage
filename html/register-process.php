<?php

//require_once('mysqli_connect.php');
require ('helper.php');
// error variable.
$error = array();

$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)){
    $error[] = "You forgot to enter your first Name";
}
$userName = validate_input_text($_POST['userName']);
if (empty($firstName)){
    $error[] = "You forgot to enter your username Name";
}

$lastName = validate_input_text($_POST['LastName']);
if (empty($lastName)){
    $error[] = "You forgot to enter your Last Name";
}

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)){
    $error[] = "You forgot to enter your Confirm Password";
}
$files = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/profile/', $files);

if(empty($error)){
    // register a new user
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    require ('mysqli_connect.php');
    $user_search = "select * from user where email='$email' ";
    $firstname_search = "select * from user where userName='$userName' ";
    $query= mysqli_query($con,$user_search);
    $query_name= mysqli_query($con,$firstname_search);
    $user_count = mysqli_num_rows($query);
    $userName_count = mysqli_num_rows($query_name);
    if($userName_count==0){
    if($user_count==0  ){
        ?>
        <script>console.log(  <?php echo $user_count; ?>) </script> <?php
// make a query
$query = "INSERT INTO user (firstName, lastName, email, password , profileImage,userName )";
$query .= "VALUES(?, ?, ?, ?, ?,?)";

// initialize a statement
$q = mysqli_stmt_init($con) or die("Not connect");

// prepare sql statement
mysqli_stmt_prepare($q, $query) or die("not prepare");

// bind values
$q->bind_param("ssssss",$firstName, $lastName, $email, $hashed_pass, $profileImage,$userName) or die($q->error);

// execute statement
if(!$q->execute()){
	echo $q->error;
}

if(mysqli_stmt_affected_rows($q) == 1){
    $_SESSION['user'] = $userName;
    shell_exec(mkdir("users/".$_SESSION['user']));
    shell_exec("docker run --restart always --name ".$userName." -i -v '/var/www/html/users/".$userName."':/".$userName." ubuntu &");    
    // start a new session
    

    header('location: login.php');
    exit();
}else{
    print "Error while registration...!";
}

    }
else{
    ?>
    <script>
    alert(" Email has already taken")
    </script>
    <?php
}
    }
    else{
        ?>
        <script>
        alert(" username has already taken")
        </script>
        <?php
    }
    

}

else{
    echo 'not validate';
}


















