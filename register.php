<?php include "connect.php";?>
<!DOCTYPE html>
<html lang="en">
<?php include "layouts/head.php";?>

<body>


<?php include "layouts/header.php" ;?>



<div class="container fluid">
    <main class="tm-main">
<?php if($_SERVER['REQUEST_METHOD']=='POST'){

$name=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['psw'];
$hash_password=password_hash($password,PASSWORD_BCRYPT);

  $stmt ="INSERT INTO user (name,email,password) VALUES ('$name','$email','$hash_password')";

                      // Bind the form data to the statement
                      if (mysqli_query($conn, $stmt)) {
                          echo "New record created successfully";
                        } else {
                          echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                        }
                      
};

?>



                      <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>Register</h2>
                                
                                <div class='mb-4'>
                                <label for="email"><b>username</b></label>
                                <input class='form-control' name='username'  type="text" placeholder="Enter username" name="username" id="username" required >

                                </div>

                                <div class='mb-4'>

                                <label for="email"><b>Email</b></label>
                                <input type="text"  class='form-control' placeholder="Enter Email" name="email" id="email" required>
                                </div>  
                                <div class='mb-4'>
                                <label for="psw"><b>Password</b></label>
                                <input type="password" class='form-control' placeholder="Enter Password" name="psw" id="psw" required>                                </div>
                                <div class='text-right'>
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>                        
                                </div>                                
                            </form> 
                            </main>     
                            </div>
</body>

<script src="js/jquery.min.js"></script>
<script src="js/templatemo-script.js"></script>
</html>