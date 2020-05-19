<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "../includes/functions.php"; ?>

<?php 
if($_SESSION['user_type'] !== 'admin'){ 

            
       header("Location: ../index.php");
        
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
                <li class="dropdown"><a href="">USERS</a><div class="dropdown-content">
                      <a href="users.php">View all users</a>
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
                <li>  <div class="logout_btn"><a href="../includes/logout.php">Logout</a>
            </div>
           </li>
            </ul>
          

        </nav>
        <!-- Main start -->
        <main class="main">
         

        </main>
     
        
        <footer>
            <p>Copyright &copy; Vuk Tripunovic</p>
        </footer>

        
    </div>
    <!-- Wrapper ends -->
    </body>


</html>
