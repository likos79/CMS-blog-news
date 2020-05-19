<?php session_start(); ?>
<?php include "functions.php"; ?>
<?php include "db.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="../css/public_style.css">
</head>

<body>
    <!-- Wrapper start -->

    <div id="wrapper">
        <header class="header">

            <h2>News Blog</h2>
            
        </header>
        <nav>
            <ul>
                <li><a href=""> Link 1 </a></li>
                <li><a href=""> Link 2 </a></li>
                <li><a href=""> Link 3 </a></li>
                <li><a href=""> Link 4 </a></li>
                <?php

                echo "<li><a href='../admin/index.php'>Admin</a></li>";

                ?>
              
                <li><div class="logout_btn"><a href="logout.php">Logout</a></div>
            </ul>
           

        </nav>
        
        <?php
           if (isset($_POST['register'])) {
	           register();
             } 
        
        
        
        
        
        ?>
        
        
                     <!-- Register form -->
        <div class="register_form">
            <form class="form-control" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label for="user_name">Username</label><br><br>
                <input  class="input" type="text" name="user_name"><br><br>
                
                <label for="user_password">Password</label><br><br>
                <input class="input" type="password" name="user_password"><br><br>
                
                <label for="user_password1">Confirm Password</label><br><br>
                <input class="input" type="password" name="user_password_1"><br><br>
                
                <label for="user_name">Email</label><br><br>
                <input class="input" type="email" name="user_email"><br><br>
                
                 <span>
                  <button class="btn" name="register" type="submit">Register</button>
                 </span>
                 
               
                    <p>Already a member? <a href="../index.php">Sign in</a> </p>
               
                
            </form>
            
        </div>
        
 
        
        <footer>
            <p>Copyright &copy; Vuk Tripunovic 2020.</p>
        </footer>

        
    </div>
    <!-- Wrapper ends -->
    </body>


</html>
