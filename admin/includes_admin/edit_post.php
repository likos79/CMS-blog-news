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
                <li class="dropdown"><a href="" class="dropbtn">POSTS</a>
                     <div class="dropdown-content">
                      <a href="view_all_posts.php">View all posts</a>
                      <a href="add_post.php">Add post</a>
                    </div></li>
                <li><a href="../comments.php">COMMENTS</a></li>
                <li><a href="">CATEGORIES</a></li>
                <li><a href="../../index.php">HOME</a></li>
                <li><div class="logout_btn"><a href="../includes/logout.php">Logout</a>
            </div>
           </li>
            </ul>
           </nav>
        <!-- Main start -->
        <main class="main">
           
           <?php
            
            global $update_post;
            if($update_post) {
               
                echo "<p class='success'>Post Updated. <a href='../../post.php?p_id={$the_post_id}'>View Post </a> or <a href='view_all_posts.php'>Edit More Posts</a></p>";
            
            }
            
            ?>
           
           
            <div class="form-control">
              
               <?php
                
                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                }
                $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                $select_posts_by_id  = mysqli_query($db, $query);
                while($row = mysqli_fetch_assoc($select_posts_by_id )) {
                    $the_post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];
                    $post_status = $row['post_status'];
                    $post_category_id = $row['post_category_id'];
                }
                if(isset($_POST['update_post'])) {

                    $post_author = $_POST['post_author'];
                    $post_title = $_POST['post_title'];
                    $post_content = $_POST['post_content'];
                    $post_status = $_POST['post_status'];
                    $post_category_id = $_POST['post_category'];
                    
                    $query = "UPDATE posts SET ";
                    $query.= "post_author = '{$post_author}', ";
                    $query.= "post_title = '{$post_title}', ";
                    $query.= "post_content = '{$post_content}', ";
                    $query.= "post_status = '{$post_status}', ";
                    $query.= "post_category_id = '{$post_category_id}' ";
                    $query.= "WHERE post_id = {$the_post_id}";
                    
                    $update_post = mysqli_query($db, $query);
                    confirmQuery($update_post);
                    header("Location: view_all_posts.php");
                    
                   
                     echo "<p class='bg-success'>Post Updated. <a href='../../post.php?p_id={$the_post_id}'>View Post </a> or <a href='view_all_posts.php'>Edit More Posts</a></p>";
                    
                   }
               ?>
               
                <form action="" method="post">
                   
                    <label for="post_author">Author</label><br>
                    <input value="<?php echo $post_author; ?>" class="input" type="text" name="post_author"><br><br>
                    
                    <label for="post_status">Post Status</label>
                    <div class="">
                    <select name="post_status" id="">

                    <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>

                    <?php
                    if($post_status == 'published') {
                    echo "<option value='draft'>Draft</option>";
                    }else{
                    echo "<option value='published'>Publish</option>";
                    }

                    ?>

                    </select>
                    </div><br>
                    
                    <label for="post_title">Post Title</label><br>
                    <input value="<?php echo $post_title; ?>" class="input" type="text" name="post_title"><br><br>
                    
                    <label for="post_content">Post Content</label><br>
                    <textarea class="input" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content; ?>
                    </textarea><br><br>
                    
                    <label for="post_category">Post Category</label><br><br>
                    
                    <select name="post_category" id="post_category">
                    <?php
                    $query = "SELECT * FROM category";
                    $select_categories= mysqli_query($db, $query);

                    confirmQuery($select_categories);

                    while($row = mysqli_fetch_assoc($select_categories)) {

                    $category_id = $row['category_id'];
                    $category_title = $row['category_name'];
                    
                    echo "<option value='{$category_id}'>{$category_title}</option>";
                    }
                    ?>  
                 
                    </select><br><br>
                    <input class="btn" type="submit" name="update_post" value="Update Post">
                </form>
            </div>
          


        </main>
        </div>
    <!-- Wrapper ends -->
    </body>


</html>
