<?php include "../../includes/db.php"; ?>
<?php include "../../includes/functions.php"; ?>
                 
                 <?php
                  
                     if(isset($_GET['approve'])) {
                        $the_comment_id = $_GET['approve'];
                        
                        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}";
                        $approve_comment_query = mysqli_query($db, $query);
                       
                        confirmQuery($approve_comment_query);
                         header("Location: ../comments.php");
                       
                    }
                
                     if(isset($_GET['unapprove'])) {
                        $the_comment_id = $_GET['unapprove'];
                        
                        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}";
                        $unapprove_comment_query = mysqli_query($db, $query);
                       
                        confirmQuery($unapprove_comment_query);
                          header("Location: ../comments.php");
                       
                    }
                ?>