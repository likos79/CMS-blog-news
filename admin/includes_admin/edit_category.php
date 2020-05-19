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

            <h2>Welcome Admin</h2>
            
        </header>
        <nav>
            <ul>
                <li><a href="">USERS</a></li>
                <li class="dropdown"><a href="" class="dropbtn">POSTS</a>
                     <div class="dropdown-content">
                      <a href="view_all_posts.php">View all posts</a>
                      <a href="add_post.php">Add post</a>
                    </div></li>
                <li><a href="../comments.php">COMMENTS</a></li>
                <li><a href="../categories.php">CATEGORIES</a></li>
                <li><a href="../../index.php">HOME</a></li>
            </ul>
           </nav>
           
           
        <!-- Main start -->
        <main class="main">
          <div class="form-control">
              <?php
                
                if(isset($_GET['cat_id'])) {
                    $the_category_id = $_GET['cat_id']; // $the_category_id = 1
                    global $the_category_id;
                }
              
                if(isset($_GET['cat_name'])) {
                     $the_category_name = $_GET['cat_name'];
                     global $the_category_name;
                }
//                $query = "SELECT * FROM category WHERE category_id = $the_category_id";
//                $select_category_by_id = mysqli_query($db, $query); // sport sa id 1
//                while($row = mysqli_fetch_assoc($select_category_by_id )) {
//                    $category_id = $row['category_id']; // 1
//                    $category_name = $row['category_name']; //sport
//                }
              
               ?>
               
                <form action="" method="post">
                    <label for="category_id">Edit Category</label><br><br>
                    <input type="hidden" name="category_id" value="<?php $the_category_id; ?>">
                    
                    <input value="<?php echo $the_category_name; ?>" class="input" type="text" name="category_name"><br>
                    
                    <input class="btn" type="submit" name="update_category" value="Update Category">
                    
                </form>
                
                <?php
                if(isset($_POST['update_category'])) {

//                   $the_category_id = $_POST['category_id'];
                   $updated_category_name = $_POST['category_name'];
                    
                    $query = "UPDATE category SET category_name = '{$updated_category_name}' WHERE category_id = $the_category_id";
                  
                    $update_category = mysqli_query($db, $query);
                    confirmQuery($update_category);
                    header("Location: ../categories.php");
                    
                   }
              
              ?>
            
            
            
            
            
             <div class="categories">
                <table class="table_cat">
                    <thead>
                        <th>Id</th>
                        <th>Category Title</th>
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
                            echo "</tr>";
                
                        }
                        
                            
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    <!-- Wrapper ends -->
</body>


</html>
