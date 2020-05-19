
<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "functions.php"; ?>
    

<?php

       global $delete_comment_id, $delete_comment_user_id;
    if(isset($_GET['delete_comm'])) {
        $delete_comment_id = $_GET['delete_comm']; // comment_id need to be deleted
        }

    if(isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
        global $post_id;
    }


    if(isset($_GET['comm_user_id'])) {
      $delete_comment_user_id = $_GET['comm_user_id'];
    
        if($delete_comment_user_id == $_SESSION['user_id']) {
      
            $query = "DELETE FROM comments WHERE comment_id = $delete_comment_id LIMIT 1";
            $delete_comment_query = mysqli_query($db, $query);
            header ("Location: ../post.php?post_id=" . $post_id . "");
            exit();
        }
}
         
 
    
        
          // Admin Comment Delete
    if(isset($_GET['delete'])) {
        $adm_delete_comment_id = $_GET['delete'];
        
        $query = "DELETE FROM comments WHERE comment_id = $adm_delete_comment_id";
        $adm_delete_comment_query = mysqli_query($db, $query);
        header("Location: ../admin/comments.php");
        exit();
    }

?>
