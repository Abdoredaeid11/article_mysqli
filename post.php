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
        <?php if(isset($_SESSION['username'])) echo '('. $_SESSION['username'].')';;

?>
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            
            <div class="row tm-row">
                
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
              
                    
                    <!-- Comments -->
                    
                    <h2 class='tm-color-primary tm-post-title'>Comments</h2>
                   
                                <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                    $user_id=$_GET['user_id'];}
                        $user_id=$_GET['user_id'];
                   $content = $_POST['content'];
                    $stmt ="INSERT INTO post (parent_id,content,article_id,user_id) VALUES (0,'$content',$id,$user_id)";
                    
                                        // Bind the form data to the statement
                                        if (mysqli_query($conn, $stmt)) {
                                            echo "New record created successfully";
                                          } else {
                                            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                                          }}

                        if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $user_id=$_GET['user_id'];

                        $query="SELECT * FROM post WHERE  article_id= $id AND parent_id=0";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) { 
                           $id=$row['id'];
                            if($row['user_id']!=$user_id){
                             echo
                   "
                   <hr class='tm-hr-primary tm-mb-45'> 
                   <div class='tm-comment-reply tm-mb-45'>
                    <hr>
                    <div class='tm-comment'>
                        <figure class='tm-comment-figure'>
                            <img src='img/comment-2.jpg' alt='Image' class='mb-2 rounded-circle img-thumbnail'>
                            <figcaption class='tm-color-primary text-center'>Jewel Soft</figcaption>    
                        </figure>
                        <p>
                            {$row['content']}
                        </p>
                    </div>  
                                                  
                    <span class='d-block text-right tm-color-primary'>June 21, 2020</span>
                </div>
                <hr class='tm-hr-primary tm-mb-45'> 

                <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>Your Reply</h2>
                                
                                <div class='mb-4'>
                                    <input class='form-control' name='content' type='text' >
                                    <input class='form-control' name='post_id' type='hidden' value='{$row['id']}' >

                                </div>
                                
                                <div class='text-right'>
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>                        
                                </div>                                
                            </form>    " ;
                        
                        replies($row['id'],$conn," ",$user_id,$id);
                        
                        }
                        if($row['user_id']==$user_id){  echo
                        "
                        <div class='tm-comment-reply tm-mb-45'>
                         <hr>
                         <div class='tm-comment'>
                             <figure class='tm-comment-figure'>
                                 <img src='img/comment-2.jpg' alt='Image' class='mb-2 rounded-circle img-thumbnail'>
                                 <figcaption class='tm-color-primary text-center'>Jewel Soft</figcaption>    
                             </figure>
                             <p>
                                 {$row['content']}
                             </p>
                         </div>                                
                         <span class='d-block text-right tm-color-primary'>June 21, 2020</span>
                     </div>
                     <form action='' class='mb-5 tm-comment-form' method='post'>
                                     <h2 class='tm-color-primary tm-post-title mb-4'>Your Reply</h2>
                                     
                                     <div class='mb-4'>
                                         <input class='form-control' name='content' type='text' >
                                         <input class='form-control' name='post_id' type='hidden' value='{$row['id']}' >
     
                                     </div>
                                     
                                     <div class='text-right'>
                                         <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>   
                                     </div>                                
                                 </form> 
                                <form action='editpost.php?id=$id'class='mb-1 tm-comment-form' method='post'>
                                 <input class='form-control' name='content' type='hidden' value='{$row['content']}' >
                                 <button class='tm-btn tm-btn-primary tm-btn-big'>edit</button>
                                 </form> 
                                 <form action='deletereply.php?id=$id'class='mb-2 tm-comment-form' method='post'>
                                 <input class='form-control' name='delete' type='hidden' value='{$row['content']}' >
                                 <button class='tm-btn tm-btn-primary tm-btn-small'>delete</button>
                                 </form> " ;
                             
                             replies($row['id'],$conn," ",$user_id,$id);

                    }}}}
                   else 


                   echo '<h1> no comments for you </h1>';

                    ?>
                    
                     <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>Your comment</h2>
                                
                                <div class='mb-4'>
                                    <input class='form-control' name='contentReply' type='text' >
                                </div>
                                
                                <div class='text-right'>
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>                        
                                </div>                                
                            </form>    
                            <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                    $user_id=$_GET['user_id'];}
                        $user_id=$_GET['user_id'];
                        $comment_id=$_POST['post_id'];
                   $content = $_POST['content'];
                    $stmt ="INSERT INTO post (parent_id,content,article_id,user_id) VALUES ($comment_id,'$content',$id,$user_id)";
                    
                                        // Bind the form data to the statement
                                        if (mysqli_query($conn, $stmt)) {
                                            echo "New record created successfully";
                                          } else {
                                            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                                          }}
                                          
                                          ?>
               
        

        </div>
                    </div>
                </div>            
                               
            </div>
           
           </main>
       </div>
                            
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>