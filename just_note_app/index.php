<?php
    include 'static/de_connection.php';
?>
    <title>Home</title>

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
            $sql = "SELECT * FROM `user02` WHERE `uid`='$uid'";
            $result = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
    ?>
    <div class="home">
        <div class="text-center">
            <h1><strong>Welcome,<?php echo $row['name']; ?></strong></h1>
            <h3><strong>Make Your Note Here,Free and Secure</strong></h3>
            <br>
            <a href="add_note.php" class="btn btn-success">Add note</a>
            <a href="display_note.php" class="btn btn-danger">Show notes</a>
        </div>
    </div>

    
</body>
</html>