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
        <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                                if(isset($_GET['id'])){

                            $content=$_POST['content'];
                            $id=$_GET['id'];

              //      $stmt ="UPDATE  user SET name='$name', email='$email' WHERE id=$id";

                    // Bind the form data to the statement
                //    if (mysqli_query($conn, $stmt)) {
                   //     echo "New record updated successfully";
                   //   } else {
                   //  //   echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                    //  }
                      
}};

?>
            <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>edit your comment</h2>
                                
                                <div class='mb-4'>
                                    <input class='form-control' name='contentReply' type='text' value='<?php echo $content;?>'>
                                </div>
                                
                                <div class='text-right'>
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>                        
                                </div>                                
             </form>    
                
                            
           </main>
       </div>

    <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
if ($_POST['contentReply']=TRUE) {
    $content_edit=$_POST['contentReply'];
    $stmt ="UPDATE  post SET content='$content_edit' WHERE id=$id";
    
                        // Bind the form data to the statement
                        if (mysqli_query($conn, $stmt)) {
                            echo "New record updated successfully";
                          } else {
                            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                          }
                        } else {
                            echo 'it is perivious value ';
    
}
   
                          
    }


    
    

        ?>
                            
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>