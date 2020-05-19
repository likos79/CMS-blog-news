<?php session_start(); ?>
<?php include "../../includes/db.php"; ?>
<?php include "../../includes/functions.php"; ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/admin_style.css">
</head>

<body>
    <!-- Wrapper start -->
    
    

    <div id="wrapper">
        <header class="header">
      <h2>Welcome Admin <?php echo $_SESSION['user_name']; ?></h2>
            
        </header>
        <nav>
            <ul>
                <li class="dropdown"><a href="">USERS</a> 
                    <div class="dropdown-content">
                      <a href="../users.php?source=view_all_users">View all users</a>
                      <a href="../users.php?source=add_user">Add user</a>
                    </div></li>
                <li class="dropdown"><a href="">POSTS</a>
                     <div class="dropdown-content">
                      <a href="#">View all posts</a>
                      <a href="add_post.php">Add post</a>
                    </div></li>
                <li><a href="../comments.php">COMMENTS</a></li>
                <li><a href="../categories.php">CATEGORIES</a></li>
                <li><a href="../../index.php">HOME</a></li>
                <li><div class="logout_btn"><a href="../includes/logout.php">Logout</a>
            </div>
           </li>
            </ul>
           </nav>
        <!-- Main start -->
        <main class="main">
           <?php
            if(isset($_SESSION['post_succsess'])) {
                echo "<div class='post_succsess'>" . $_SESSION['post_succsess'];  "</div>";
            }
            ?>
            <div>
              
              
               <table class="table">
                   <thead>
                   <th>Id</th>
                   <th>Author</th>
                   <th>Title</th>
                   <th>Content</th>
                   <th>Category</th>
                   <th>Date</th>
                   <th>Category Id</th>
                   <th>Post Status</th>
                   <th>Edit</th>
                   <th>Delete</th>
                   </thead>
                   <tbody>
                      <?php
                       
                       $query = "SELECT * FROM posts";
                       $posts_query = mysqli_query($db, $query);
                       
                       while($row = mysqli_fetch_assoc($posts_query)) {
                      
                           $post_id = $row['post_id'];
                           $post_author = $row['post_author'];
                           $post_title = $row['post_title'];
                           $post_content = substr($row['post_content'], 0, 100);
                        
                           $post_date = $row['post_date'];
                           $post_status = $row['post_status'];
                           $post_category_id = $row['post_category_id'];
                           
                       echo "<tr>";
                       echo "<td>{$post_id}</td>";
                       echo "<td>{$post_author}</td>";
                       echo "<td><a href='../../post.php?post_id=$post_id'>$post_title</a></td>";
                       echo "<td>{$post_content}</td>";
                       
                    
                        
                        $query = "SELECT * FROM category WHERE category_id = {$post_category_id}";
                        $select_categories_id = mysqli_query($db, $query);
                        confirmQuery($select_categories_id);

                        while($row = mysqli_fetch_assoc($select_categories_id)){

                        $cat_id = $row['category_id'];
                        $cat_title = $row['category_name'];

                        echo "<td>{$cat_title}</td>";
                        }
                           
                           
                       echo "<td>{$post_date}</td>";
                       echo "<td>{$post_category_id}</td>";
                       echo "<td>{$post_status}</td>";
                       echo "<td><a href='edit_post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                       echo "<td><a href='delete_post.php?delete={$post_id}'>Delete</a></td>";
                       echo "</tr>";
                       }
                           ?>
                   </tbody>
               </table>
                   
                
            </div>

        </main>
        </div>
    <!-- Wrapper ends -->
    </body>


</html>
