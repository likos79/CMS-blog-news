<?php

  if(isset($_POST['add_user'])) {
   
            $user_name       = ($_POST['user_name']);
            $user_password   = ($_POST['user_password']);
            $user_email      = ($_POST['user_email']);
            $user_type       = ($_POST['select_user_type']);
       
      $query = "INSERT INTO users (user_name, user_password, user_email, user_type) ";
      $query .= "VALUES ('{$user_name}', '{$user_password}', '{$user_email}', '{$user_type}') "; 
             
      $add_user_query = mysqli_query($db, $query);  
      confirmQuery($add_user_query);
      $the_post_id = mysqli_insert_id($db);
      
      confirmQuery($add_user_query);
      header("Location:users.php?source=view_all_users.php");

//      echo "<p class=''>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
    }
?>

        <!-- Main start -->
        <main class="main">
            <div class="form-control">
                <form action="" method="post">
                    <label for="user_name">Username</label><br>
                    <input class="input" type="text" name="user_name"><br><br>
                    
                    <label for="user_password">Password</label><br>
                    <input class="input" type="password" name="user_password"><br><br>
                    
                    <label for="user_email">Email</label><br>
                    <input class="input" type="email" name="user_email"><br><br>
                    
                    <label for="user_type">User Type</label><br><br>
                    
                    <select name="select_user_type">
                        
                        <option value="user">Select Options</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>

                 
                    </select><br><br>
                    <input class="btn" type="submit" name="add_user" value="Add user">
                </form>
            </div>
       </main>
   
