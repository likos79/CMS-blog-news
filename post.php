<?php session_start(); ?>
<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="css/public_style.css">
</head>

<body>
    <!-- Wrapper start -->

    <div id="wrapper">
        <header class="header">

            <h2><a href="index.php">News Blog</a></h2>
            
        </header>
        <nav>
            <ul>

            <?php
                    
                    $query = "SELECT * FROM category";
                    $select_all_categories_query = mysqli_query($db, $query);
                    
                    while($row = mysqli_fetch_assoc($select_all_categories_query)){
                        $cat_id = $row['category_id'];
                        $cat_name = $row['category_name'];
                        echo "<li><a href='category_posts.php?cat_id=$cat_id'>{$cat_name}</a></li>";
                    }
                    
                    ?>

                <?php
                if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
                
                    echo "<li><a href='admin/index.php'>Admin</a></li>";
                }else{
                    echo "<li><a href=''>Welcome-" .$_SESSION['user_name'] . "</a></li>";
                }
                ?>
               <li><div class="logout_btn"><a href="includes/logout.php">Logout</a></div>
            </ul>
           

        </nav>
        <!-- Main start -->
        <main class="main">
            <div class="main_post">
               
               <?php
                
                if(isset($_GET['post_id'])) {
                $single_post_id = $_GET['post_id'];
                }
                global $single_post_id;
                $query = "SELECT * FROM posts WHERE post_id = {$single_post_id}";
                $posts_query = mysqli_query($db, $query);
                confirmQuery($posts_query);
                global $category_name;
                while($row = mysqli_fetch_assoc($posts_query)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                
                    $post_date = $row['post_date'];
                    $post_status = $row['post_status'];
                    global $post_status;
                    $post_category_id = $row['post_category_id'];
                    
                if($post_status == 'published') {
                    $query = "SELECT * FROM category WHERE category_id = $post_category_id";
                    $cat_query = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($cat_query)) {
                        $cat_id = $row['category_id'];
                        $cat_name = $row['category_name'];
                    }
                    echo "<h3><a href='category_posts.php?cat_id=$cat_id'>$cat_name</a></h3>";
                
                echo "<hr>";
                echo "<h1><a href='post.php?post_id=$post_id'>$post_title</a></h1>";
                echo "by <a href=''>$post_author</a>";
                echo "<p><img src='images/calendar-icon.png'><small>$post_date</small></p>";
                echo "<hr>";
                echo "<p>$post_content</p>";
                }
               
}
 ?>
           
            </div>
          </main>
          <!-- Main ends -->
          
          
          <!-- Sidebar -->
          
          <aside class="aside">

            <div class="aside_1">
                <h3>Blog Categories</h3>
                
        <?php
    
          $query = "SELECT * FROM category";
          $category_query = mysqli_query($db, $query);

          while($row = mysqli_fetch_assoc($category_query)) {
          $category_id = $row['category_id'];
          $category_name = $row['category_name'];
          
                
                echo "<ul>";
                echo "<li><a href='category_posts.php?cat_id=$category_id'>$category_name</a></li>";
                echo "</ul>";
          }
        ?>
            </div>
        </aside> 
             
              
<?php              //Getting values from the form and inserting added comment to database
            if(isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                global $post_id;
               
            }
        
            if(isset($_POST['comment_submit'])) {
               
                $comment_content = $_POST['comment_content'];
                $comment_post_id = $_GET['post_id'];
                $comment_user_id = $_SESSION['user_id'];
                $comment_user_name = $_SESSION['user_name'];
             
            
                
                 if(!empty($comment_content)) {
                
                $query = "INSERT INTO comments (comment_content, comment_date, comment_post_id, comment_user_id, comment_user_name) ";
                $query.= "VALUES ('{$comment_content}', now(), '{$comment_post_id}', '$comment_user_id', '{$comment_user_name}')";
                $comment_query = mysqli_query($db,$query);
                $message_success = "<p style='color:green;'>Comment added / It will be visible after admin approval</p>";
            }else{
            $error_msg = "<p style='color:red;'>Comment field cannot be empty</p>";
            global $error_msg;
            }
                
        }else{
        $comment_query = '';
    }
        


?>
      
        
                      <!-- Comments Form -->
        <?php   
        if(isset($_SESSION['user_id'])) {
        if($post_status == 'published') {
           echo "<div class='comment'>";
                    echo "<form action='' method='post'>";
                    if(isset($error_msg)) {
                        echo $error_msg;
                    }elseif($comment_query){
                        echo $message_success;
                    }
                    echo "<label for='textarea'><h3>Post Comment</h3></label>";
                     echo "<textarea name='comment_content' cols='57' rows='5'></textarea><br>";
                    
                    echo "<button class='btn' type='submit' name='comment_submit' value='submit'>Submit</button>";
                  
               echo "</form>";
           echo "</div>";
           
     }
            
     }else{
                $_SESSION['user_id'] = null;
           }
       
        ?>
          
                      <!-- Comments Form End-->
           
        <?php
           $query = "SELECT * FROM comments 
                    WHERE comment_post_id = '{$single_post_id}' 
                    AND comment_status = 'approved' 
                    ORDER BY comment_id DESC ";
        
            $comment_post_query = mysqli_query($db, $query);
        
           if(!$comment_post_query) {
              die('Query failed.' . mysqli_error($db));
           }

             while($row = mysqli_fetch_assoc($comment_post_query)) {
                $comment_id = $row['comment_id'];
                $comment_user_name = $row['comment_user_name'];
                global $comment_user_name;
                $comment_user_id = $row['comment_user_id'];
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                

        if((isset($_SESSION['user_name'])) && $post_status == 'published') {
            

               echo "<div class='published_comments'>";
               echo "<strong>$comment_user_name </strong>";
               echo "<small><i>| $comment_date</i></small><br><br>";
               echo "$comment_content<br>";
               
               
                 if($comment_user_id == $_SESSION['user_id']) {
               echo "<div class='delete_btn'><a href='includes/delete_comment.php?delete_comm=$comment_id&comm_user_id=$comment_user_id&p_id=$post_id;'>delete</a></div>";  
                }
                     echo "</div>";
        }
    }
        ?>
        
        <footer>
            <p>Copyright &copy; Vuk Tripunovic 2020</p>
        </footer>

        
    </div>
    <!-- Wrapper ends -->
    </body>


</html>
