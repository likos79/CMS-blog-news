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
                      <a href="users.php?source=view_all_users">View all users</a>
                         <a href="users.php?source=add_user">Add user</a>
                    </div></li>
                <li class="dropdown"><a href="" class="dropbtn">POSTS</a>
                     <div class="dropdown-content">
                      <a href="includes_admin/view_all_posts.php">View all posts</a>
                         <a href="includes_admin/add_post.php">Add post</a>
                    </div></li>
                <li><a href="comments.php">COMMENTS</a></li>
                <li><a href="categories.php">CATEGORIES</a></li>
                <li><a href="../index.php">HOME</a></li>
                <li><div class="logout_btn"><a href="../includes/logout.php">Logout</a>
            </div>
           </li>
            </ul>
           

        </nav>
        <!-- Main start -->
        <main class="main">
          
            <?php
             if(isset($_POST['add_category'])) {
                 
                 $new_category = $_POST['new_category'];
                 
                 $query = "INSERT INTO category (category_name) VALUES ('{$new_category}')";
                 $insert_category = mysqli_query($db, $query);
                 confirmQuery($insert_category);
                 
             }
            
            
            
            ?>
           
            <h2>Categories</h2>
            <hr>
            <div class="add_category">
                <form action="#" method="post">
                    <label for="add_category"><strong>Add Category</strong></label><br>
                    <input  class="input" type="text" name="new_category"><br><br>
                    <input class="btn" type="submit" name="add_category" value="Add Category">
                </form>
            </div>
            
            <div class="categories">
                <table class="table_cat">
                    <thead>
                        <th>Id</th>
                        <th>Category Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                       <?php
                        
                        $query = "SELECT * FROM category";
                        $category_query = mysqli_query($db, $query);
                        
                        while($row = mysqli_fetch_assoc($category_query)) {
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            
                            echo "<tr>";
                            echo "<td>$category_id</td>";
                            echo "<td>$category_name</td>";
                            echo "<td><a href='includes_admin/edit_category.php?cat_id={$category_id}&cat_name=$category_name'>Edit</a></td>";
                            echo "<td><a href='includes_admin/delete_category.php?delete={$category_id}'>Delete</a></td>";
                            echo "</tr>";
                
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
            
        </main>
     
        
        <footer>
            <p>Copyright &copy; Vuk Tripunovic 2020</p>
        </footer>

        
    </div>
    <!-- Wrapper ends -->
    </body>


</html>
