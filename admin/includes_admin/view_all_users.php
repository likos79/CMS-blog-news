<table class="table">
   <thead>
   <th>Id</th>
   <th>Username</th>
   <th>Email</th>
   <th>User Type</th>
   <th>Change Type(Admin)</th>
   <th>Change Type(User)</th>
   <th>Delete</th>
   </thead>
   <tbody>
                     
       <?php

       $query = "SELECT * FROM users";
       global $db;
       $users_query = mysqli_query($db, $query);

       while($row = mysqli_fetch_assoc($users_query)) {

           $user_id = $row['user_id'];
           $user_name = $row['user_name'];
           $user_password = $row['user_password'];
           $user_email = $row['user_email'];
           $user_type = $row['user_type'];

       echo "<tr>";
       echo "<td>{$user_id}</td>";
       echo "<td>{$user_name}</td>";       
       echo "<td>{$user_email}</td>";
       echo "<td>{$user_type}</td>";

                        
//                        $query = "SELECT * FROM category WHERE category_id = {$post_category_id}";
//                        $select_categories_id = mysqli_query($db, $query);
//                        confirmQuery($select_categories_id);
//
//                        while($row = mysqli_fetch_assoc($select_categories_id)){
//
//                        $cat_id = $row['category_id'];
//                        $cat_title = $row['category_name'];
//
//                        echo "<td>{$cat_title}</td>";
//                        }

                           
       echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";            
       echo "<td><a href='users.php?change_to_user={$user_id}'>User</a></td>";
       echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
       }
    ?>
   </tbody>
</table>

<?php
    

    if(isset($_GET['change_to_admin'])) {
        $the_user_id = $_GET['change_to_admin'];
        
        $query = "UPDATE users SET user_type = 'admin' WHERE user_id = {$the_user_id}";
        $change_to_admin_query = mysqli_query($db, $query);
        header("Location: users.php");
       
    }
        

    if(isset($_GET['change_to_user'])) {
        $the_user_id = $_GET['change_to_user'];
        
        $query = "UPDATE users SET user_type = 'user' WHERE user_id = {$the_user_id}";
        $change_to_user_query = mysqli_query($db, $query);
        header("Location: users.php");
    }
        
        
    if(isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];
        
        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
        $delete_user_query = mysqli_query($db, $query);
     
    }
    

?>


             
