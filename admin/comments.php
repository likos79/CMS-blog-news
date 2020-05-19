<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "../includes/functions.php"; ?>
  
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="../css/admin_style.css">
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
                      <a href="users.php">View all users</a>
                      <a href="users.php?source=add_user">Add user</a>
                     </div></li>
                     
                <li class="dropdown"><a href="" class="dropbtn">POSTS</a>
                     <div class="dropdown-content">
                      <a href="includes_admin/view_all_posts.php">View all posts</a>
                      <a href="includes_admin/add_post.php">Add post</a>
                    </div></li>
                    
                <li><a href="">COMMENTS</a></li>
                <li><a href="categories.php">CATEGORIES</a></li>
                <li><a href="../index.php">HOME</a></li>
                <li><div class="logout_btn"><a href="../includes/logout.php">Logout</a>
            </div>
           </li>
            </ul>
           </nav>
        <!-- Main start -->
        <main class="main">
            <div>
              
              
               <table class="table">
                   <thead>
                   <th>Id</th>
                   <th>Author</th>
                   <th>Content</th>
                   <th>Date</th>
                   <th>In Response To</th>
                   <th>Status</th>
                   <th>Approve</th>
                   <th>Unapprove</th>
                   <th>Delete</th>
                   </thead>
                   <tbody>
                      <?php
                       
                       $query = "SELECT * FROM comments";
                       $comments_query = mysqli_query($db, $query);
                       
                       while($row = mysqli_fetch_assoc($comments_query)) {
                      
                           $comment_id = $row['comment_id'];
                           $comment_author = $row['comment_user_name'];
                           $comment_content = substr($row['comment_content'], 0, 100);
                           $comment_date = $row['comment_date'];
                           $comment_post_id = $row['comment_post_id'];
                           $comment_status = $row['comment_status'];
                          
                           
                       echo "<tr>";
                       echo "<td>{$comment_id}</td>";
                       echo "<td>{$comment_author}</td>";
                       echo "<td>{$comment_content}</td>";
                       echo "<td>{$comment_date }</td>";
                           
                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                            $select_post_id_query = mysqli_query($db, $query);
                            while($row = mysqli_fetch_assoc($select_post_id_query)) {

                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            echo "<td><a href='../post.php?post_id=$post_id'>$post_title</a></td>";  
                           }
                           
                        echo "<td>$comment_status</td>";
                        echo "<td><a href='includes_admin/comment_approve.php?approve=$comment_id'>approve</a></td>";
                        echo "<td><a href='includes_admin/comment_approve.php?unapprove=$comment_id'>unapprove</a></td>";
                        echo "<td><a href='../includes/delete_comment.php?delete={$comment_id}'>Delete</a></td>";
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
