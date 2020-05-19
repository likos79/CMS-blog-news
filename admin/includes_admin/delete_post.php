<?php include "../../includes/db.php"; ?>
<?php include "../../includes/functions.php"; ?>
    
<?php

    if(isset($_GET['delete'])) {
        $delete_post_id = $_GET['delete'];
    
    $query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
    $delete_post_result = mysqli_query($db, $query);
    
    confirmQuery($delete_post_result);
    header ("Location:view_all_posts.php");
    }

?>