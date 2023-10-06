
<?php include "connect.php";?>
<!DOCTYPE html>
<html lang="en">
<?php include "layouts/head.php";?>

<body>


<?php include "layouts/header.php" ;?>



<div class="container fluid">
    <main class="tm-main">
    <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>Edit Profile</h2>
                                
                                <div class='mb-4'>
                                <label for="username"><b>username</b></label>
                                <input class='form-control' name='username'  type="text" placeholder="Enter username" name="username" id="username" required >

                                </div>

                                <div class='mb-4'>

                                <label for="email"><b>Email</b></label>
                                <input type="text"  class='form-control' placeholder="Enter Email" name="email" id="email" required>
                                </div>  
                               
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>                        
                                </div> 

                            </form> 
                            <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                                if(isset($_GET['id'])){

                            $name=$_POST['username'];
                            $email=$_POST['email'];
                            $id=$_GET['id'];

$stmt ="UPDATE  user SET name='$name', email='$email' WHERE id=$id";

                    // Bind the form data to the statement
                    if (mysqli_query($conn, $stmt)) {
                        echo "New record updated successfully";
                      } else {
                        echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                      }
                      
}};

?>
                            </main>     
                            </div>
</body>

<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</html>