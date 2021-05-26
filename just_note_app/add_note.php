<?php
    include 'static/de_connection.php';
?>

    <title>Add note</title>


<?php
    require 'static/navbar_after.html';
    ?>
    
    <?php

    $msg = false;
    $error =false;
          session_start();
          if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false)
          {
              header('location: login.php');
              exit;
          }
          else if($_SERVER['REQUEST_METHOD'] == 'POST')
          {
              $title = $_POST['title'];
              $desc = $_POST['desc'];
              $uid = $_SESSION['uid'];

              $sql = "INSERT INTO `notes` (`Title`, `Description`, `uid`, `Date`) VALUES ('$title', '$desc', '$uid', current_timestamp())";
              $result = mysqli_query($conn,$sql);

              if($result)
              {
                  $msg = "Note added Successfully";
              }
              else
              {
                  $error = "Something went wrong!!";
              }
          }
    ?>

<?php
        if($msg)
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$msg.'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
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

    <div class="container mt-5 pt-5">
        <div class="add_note p-5">
            <form action="add_note.php" method="POST">
            <div class="form-group">
                <label for="title"><strong>Title</strong></label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
                <div class="form-group">
                    <label for="desc"><strong>Description</strong></label>
                    <textarea class="form-control" name="desc" id="desc"  rows="5" placeholder="Write note here......." required></textarea>
                </div>
                <button type="submit" class="btn float-right">Done</button><br>
            </form>
        </div>
    </div>
</body>
</html>