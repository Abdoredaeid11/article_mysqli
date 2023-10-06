<?php require 'connect.php';?>
<?php session_start();
include 'replies.php';
$comment_id;

?>
<!DOCTYPE html>
<html lang="en">
<?php include "layouts/head.php";?>

<body>
<?php include "layouts/header.php" ;?>

    <div class="container-fluid">
        <main class="tm-main">
        <?php 
         if(isset($_GET['id'])){

            $id=$_GET['id'];

            $stmt="DELETE FROM post WHERE  id=$id OR parent_id = $id ";
    // Bind the form data to the statement
   if (mysqli_query($conn, $stmt)) {
     echo "New record Deleted successfully";
    } 
    //else {
   //  //   echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
    //  }
      
}
        
        
        
        ?>
                            
           </main>
       </div>

    <?php 
 


        ?>
                            
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>