<?php include "../../includes/db.php"; ?>
<?php include "../../includes/functions.php"; ?>


<?php
    if(isset($_GET['delete'])) {
        $delete_category_id = $_GET['delete'];
        
        $query = "DELETE FROM category WHERE category_id = $delete_category_id";
        $delete_category_query = mysqli_query($db, $query);
        header("Location: ../categories.php");
    }
?>