<?php
    include 'static/de_connection.php';
?>
  
  
    <title>My Notes</title>


<?php
    require 'static/navbar_after.html';
    ?>
    
    <?php
        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false)
        {
            header('location: login.php');
            exit;
        }
        $uid = $_SESSION['uid'];
        $sql = "SELECT * FROM `notes` WHERE `uid` = '$uid'";
        $result = mysqli_query($conn,$sql);
        ?>

        <?php
        $msg = $_SESSION['msg'];
        if($msg == "Note deleted successfully")
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>'.$msg.'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          $_SESSION['msg'] = false;
        }
        else if($msg == "Note Updated Successfully!!")
        {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>'.$msg.'</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          $_SESSION['msg'] = false;
        }
        ?>

      <div class="container mt-5">
       <div >
        <?php
        echo '<table class="table table-striped" id="myTable">
         <thead class="t_head">
             <tr>
                 <th>Title</th>
                 <th>Description</th>
                 <th>Action</th>
             </tr>
         </thead>
         ';
     while($row = mysqli_fetch_assoc($result))
     {
        echo '
        <tbody>
         <tr>
             <td>'.$row['Title'].'</td>
             <td>'.$row['Description'].'</td>
             <td><a href="update.php?post_id='.$row['sno'].'" class="btn btn-sm btn-warning">update</a> <a href="delete.php?post_id='.$row['sno'].'" class="btn btn-danger btn-sm">delete</a></td>
         </tr>
        </tbody>
        ';
     }
     echo '</table>';
        ?>
       </div>
      </div>
    
</body>
</html>