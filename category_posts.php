<?php session_start(); ?>
<?php include "includes/db.php"; ?>

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
                        global $cat_name, $cat_id;
                        
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
               
                $category_id = $_GET['cat_id'];
               
               
                $query = "SELECT * FROM posts WHERE post_category_id = {$category_id}";
            
                $category_posts_query = mysqli_query($db, $query);
                
                  
                while($row = mysqli_fetch_assoc($category_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_content = substr($row['post_content'] , 0, 200) . ' .....' . "<br>" . "<a href='post.php?post_id=$post_id'><button name='btn' type='submit' class='btn'>Read More...</button></a>";
                    $post_date = $row['post_date'];
                    $post_status = $row['post_status'];
                    $post_category_id = $row['post_category_id'];
                   
               if($post_status == 'published') {
                    
                $query = "SELECT * FROM category WHERE category_id = $post_category_id";
                    $cat_query = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($cat_query)) {
                        $cat_id = $row['category_id'];
                        $cat_name = $row['category_name'];
                    }
                    echo "<strong>$cat_name</strong>";
                    echo "<hr>";
                    echo "<h1><a href='post.php?post_id=$post_id'>$post_title</a></h1>";
                    echo "by <a href=''>$post_author</a>";
                    echo "<p><img src='images/calendar-icon.png'><small> $post_date</small></p>";
                    echo "<p>$post_content</p>"; 
               }
           
}
 ?>
           
            </div>

        </main>
      
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
        <footer>
            <p>Copyright &copy; Vuk Tripunovic</p>
        </footer>

        
    </div>
    <!-- Wrapper ends -->
    </body>


</html>
