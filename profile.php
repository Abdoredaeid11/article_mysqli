<?php require 'connect.php'?>
<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php include "layouts/head.php";?>

<body>
<?php include "layouts/header.php" ;?>

    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
            <h1>Profile</h1>
            <?php
                     if(isset($_GET['id'])){
                     $id=$_GET['id'];
                     $query="SELECT * FROM user WHERE  id= $id";
                     $result = mysqli_query($conn, $query);

                     if (mysqli_num_rows($result) > 0) {
                     // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                    echo"
    <p>This is a simple profile page.</p>
    <h2>Name</h2>
    <p>{$row['name']}</p>
    <h2>Email</h2>
    <p>{$row['email']}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, orci sed scelerisque semper, eros quam ultricies quam, ut scelerisque eros quam ac quam.</p>    
    <button width='60' height='100'><a href='editprofile.php?id={$row['id']}'>edit Profile</a></button>
    </div> ";}}}?>
   
            
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>