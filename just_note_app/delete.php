<?php
    include 'static/de_connection.php';
?>

    <title>Delete</title>

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

        $uid = $_SESSION['uid'];
        $post_id = $_GET['post_id'];

        $sql = "SELECT * FROM `notes` WHERE `notes`.`sno`= '$post_id' AND `notes`.`uid`='$uid'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) != 1)
        {
            header('location: display_note.php');
        }
        else{
            $row = mysqli_fetch_assoc($result);
        }
        

        if(array_key_exists('Delete', $_POST)) { 
            delete(); 
        } 
        else if(array_key_exists('Cancel', $_POST)) { 
            cancel(); 
        } 


        function delete()
        {
            global $msg,$error,$conn,$uid,$post_id;

            $sql = "DELETE FROM `notes` WHERE `notes`.`sno`= '$post_id' AND `notes`.`uid`='$uid'";
            $result = mysqli_query($conn,$sql);

            //echo $result;
            if($result == 1)
            {
                $_SESSION['msg'] = "Note deleted successfully";
                header('location: display_note.php');
            }
            else
            {
                $error = "Something went wrong";
            }
        }
        function cancel()
        {
            header('location: display_note.php');
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
            <form >
                <div class="form-group">
                    <label for="title"><strong>Title</strong></label>
                    <input type="text" class="form-control"  id="title" value="'.$row['Title'].'" readonly>
                </div>
                <div class="form-group">
                    <label for="desc"><strong>Description</strong></label>
                    <textarea id="desc" class="form-control" rows="5" readonly>'.$row['Description'].'</textarea>
                </div>
           </form>
        </div>     
    </div>
    ';
    ?>
    <div class="container pt-3 text-center">
        <form method="post"> 
            <input type="submit" name="Delete" class="btn btn-danger" value="Confirm Delete" /> 
            <input type="submit" name="Cancel" class="btn btn-warning" value="Cancel" /> 
        </form>
    </div> 



</body>
</html>