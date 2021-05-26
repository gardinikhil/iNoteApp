<?php
    include 'static/de_connection.php';
?>

    <title>Update Note</title>


    <?php
        require 'static/navbar_after.html';
        ?>
    <?php

$error = false;

         session_start();
         if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false)
         {
             header('location: login.php');
             exit;
         }
         $post_id = $_GET['post_id'];
         $uid = $_SESSION['uid'];

        // echo $post_id;

         $sql = "SELECT * FROM `notes` WHERE `sno`='$post_id' AND `notes`.`uid`='$uid'";
         $result = mysqli_query($conn,$sql);

         $num_row = mysqli_num_rows($result);

         if($num_row == 1)
         {
            $row = mysqli_fetch_assoc($result);
         }
         else
         {
             header('location: display_note.php');
         }
    ?>

<?php


        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $title = $_POST['title'];
            $desc = $_POST['desc'];

            $sql = "UPDATE `notes` SET `Title` = '$title', `Description` = '$desc' WHERE `notes`.`sno` = '$post_id' AND `notes`.`uid`='$uid'";
            $result = mysqli_query($conn,$sql);

            if($result)
            {
                $_SESSION['msg'] = "Note Updated Successfully!!";
                header('location: display_note.php');
            }
            else
            {
                $error = "Something went wrong!!";
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

        echo '
        <div class="container mt-5 pt-5">
            <div class="add_note p-5">
                <form action="update.php?post_id='.$row['sno'].'" method="POST">
                    <div class="form-group">
                        <label for="title"><strong>Title</strong></label>
                        <input type="text" class="form-control" name="title" id="title" value="'.$row['Title'].'" required>
                    </div>
                    <div class="form-group">
                        <label for="desc"><strong>Description</strong></label>
                        <textarea name="desc" id="desc" class="form-control" rows="5" required >'.$row['Description'].'</textarea>
                    </div>
                    <button type="submit" class="btn float-right">Update</button><br>
                </form>
            </div>     
        </div>
        ';
    ?>
</body>
</html>