<?php
    include 'static/de_connection.php';
?>

 <?php
    require 'static/navbar_before.html';
?>
<title>Signup</title>


    <?php

    $error = false;
    $user_create = false;

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $c_password = $_POST['c_pass'];

            $sql = "SELECT * FROM `user02` WHERE `username`='$username'";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
                $error = "Username already exist!!";
            }
            else
            {
                if($password == $c_password)
                {
                    $hash_pass = password_hash($password,PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `user02` (`username`, `password`, `name`, `date`) VALUES ('$username', '$hash_pass', '$name', current_timestamp())";        
                    $result = mysqli_query($conn,$sql); 
                    
                    if($result)
                    {
                        $user_create = "Account created successfully :)";
                    }
                    else
                    {
                        $error = "Something went wrong";
                    }
                }
                else
                {
                    $error = "Password does not match";
                }
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
    if($user_create)
     {
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>'.$user_create.'</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
     }
     ?>
      <div class="signup">
        <div class="card">
            <h3 class="text-center"><strong>Create account for free</strong></h3>
           <div class="mx-auto">
           <form action="signup.php" method="post">
           <label for="name"><strong>name</strong><br>
                    <input type="text" name="name" id="name" required>
                </label>
                <br>
                <label for="username"><strong>username</strong><br>
                    <input type="email" name="username" id="username" required>
                </label>
                <br>
                <label for="pass"><strong>password</strong><br>
                <input type="password" name="pass" id="pass" required>
                </label>
                <br>
                <label for="c_pass"><strong>confirm password</strong><br>
                <input type="password" name="c_pass" id="c_pass" required>
                </label>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn">Signup</button>
                </div>
            </form>
            <br>
            <div class="text-center">
            <small><strong>Already have account</strong></small><br>
            <a href="login.php" class="btn bg-danger text-light">Login</a>
            </div>
           </div>
        </div>
    </div>
    <?php
    if($error)
    {
        echo $error;
    }
    if($user_create)
    {
        echo $user_create;
    }
    ?>
</body>
</html>