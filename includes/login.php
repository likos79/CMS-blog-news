<?php session_start(); ?>
<?php include "db.php"; ?>


<?php

       if(isset($_POST['login'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);
        $password = md5($password);
        
        $query = "SELECT * FROM users WHERE user_name = '{$username}' ";
        $select_user_query = mysqli_query($db, $query);
        
        if(!$select_user_query) {
             die("QUERY FAILED". mysqli_error($db));
        }
        
        while($row = mysqli_fetch_array($select_user_query)) {
            
            $db_user_id = $row['user_id'];
            $db_username = $row['user_name'];
            $db_user_password = $row['user_password'];
            $db_user_email = $row['user_email'];
            $db_user_type = $row['user_type'];
           
        }
       
       if($username === $db_username && $password === $db_user_password) {
            
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['user_name'] = $db_username;
            $_SESSION['user_email'] = $db_user_email;
            $_SESSION['user_type'] = $db_user_type;
            
            header ("Location: ../admin");
            
        }else{
            // header ("Location: ../index.php");
            
    }
}
?>