<?php include "../../includes/db.php"; ?>
<?php include "../../includes/functions.php"; ?>

<?php

  if(isset($_POST['create_post'])) {
   
            $post_author       = escapeString($_POST['post_author']);
            $post_title        = escapeString($_POST['post_title']);
            $post_content      = escapeString($_POST['post_content']);
            $post_date         = escapeString(date('d-m-y'));
            $post_category_id  = escapeString($_POST['post_category']);
       
       
      $query = "INSERT INTO posts (post_title, post_author, post_date, post_content, post_category_id) ";
      $query .= "VALUES('{$post_title}', '{$post_author}', now(), '{$post_content}', '{$post_category_id}') "; 
             
      $create_post_query = mysqli_query($db, $query);  
      confirmQuery($create_post_query);
      $the_post_id = mysqli_insert_id($db);
      
      $_SESSION['post_succsess'] = "You added post successfully";

//      echo "<p class=''>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
      header("Location: view_all_posts.php");
  }
?>

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
                      <a href="../users.php">View all users</a>
                      <a href="add_user.php">Add user</a>
                    </div></li>
                <li class="dropdown"><a href="" class="dropbtn">POSTS</a>
                     <div class="dropdown-content">
                      <a href="view_all_posts.php">View all posts</a>
                      <a href="#">Add post</a>
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
            <div class="form-control">
                <form action="" method="post">
                    <label for="post_author">Author</label><br>
                    <input class="input" type="text" name="post_author"><br><br>
                    
                    <label for="post_title">Post Title</label><br>
                    <input class="input" type="text" name="post_title"><br><br>
                    
                    <label for="post_content">Post Content</label><br>
                    <textarea class="input" name="post_content" id="body" cols="30" rows="10">
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
                    
                    <input class="btn" type="submit" name="create_post" value="Publish Post">
                </form>
            </div>
          


        </main>
        </div>
    <!-- Wrapper ends -->
    </body>


</html>
