<?php
$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if(empty($error)){
    // sql query
    $query = "SELECT firstName, lastName, email, password, profileImage, userName FROM user WHERE email=?";
    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);

    // bind parameter
    mysqli_stmt_bind_param($q, 's', $email);
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)){
        // verify password
        if(password_verify($password, $row['password'])){
            session_start();   
            $id=session_id();
            // setting username to session variable
            $_SESSION['email'] = $row["userName"];

            setcookie("username", $email, time() + (86400), "/");
            setcookie("session_id", $id, time() + (86400), "/");
            header("location: index.php");
            exit();
        }
        else{
            ?>
            <script>
            alert("Invalid Password")
            </script>
            <?php

        }
    }else{
        ?>
        <script>
        alert("Invalid Credentials")
        </script>
        <?php
    }

}else{
    echo "Please Fill out email and password to login!";
}
