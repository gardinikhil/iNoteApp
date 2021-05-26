<?php
    include 'static/de_connection.php';
?>

    <?php
    require 'static/navbar_before.html';
    ?>
    <title>Login</title>

    <?php

    $error = false;


        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $username = $_POST['username'];
            $password = $_POST['pass'];

            $sql = "SELECT * FROM `user02` WHERE `username`='$username'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)==1)
            {
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password,$row['password']))
                {
                    session_start();

                    $_SESSION['loggedin']=true;

                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['msg'] = false;

                    header('location: index.php');
                }
                else
                {
                    $error = "Invalid Password!!!";
                }
            }
            else
            {
                $error = "Invalid Username!!!";
            }
        }
    ?>
     <?php
     if($error)
     {
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>'.$error.'</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
     }
     ?>

    <div class="login">
        <div class="card">
            <h3 class="text-center"><strong>Login your account</strong></h3>
           <div class="mx-auto">
            <form action="login.php" method="POST">
                <label for="username"><strong>username</strong><br>
                    <input type="email" name="username" id="username" required>
                </label>
                <br>
                <label for="pass"><strong>password</strong><br>
                    <input type="password" name="pass" id="pass" required>
                </label>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form><br>
            <div class="text-center">
                <small><strong>Don't have account</strong></small><br>
                <a href="signup.php" class="btn bg-danger text-light">Signup</a>
                </div>
           </div>
        </div>
    </div>
   
    
</body>
</html>



