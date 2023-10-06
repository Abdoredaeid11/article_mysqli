<?php 

function get_comments($parent_id,$conn){
 $query="SELECT * FROM post WHERE parent_id = $parent_id ";
 $result = mysqli_query($conn, $query);


  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  // $comments=mysqli_fetch_assoc($result) ;
return $result;}
 else {
 return false;
}



}


// echo get_comments(0,$conn);
function replies($parent_id,$conn,$space,$user_id,$id){
    $result=get_comments($parent_id,$conn);
    if($result){
        $space.="   ";
  while( $row=mysqli_fetch_assoc($result)){
   
    if($row['user_id']!=$user_id){
echo"
    <div class='tm-comment-reply tm-mb-45'>
                    
                    <div class='tm-comment'><pre>$space</pre>
                        <figure class='tm-comment-figure'>
                            <img src='img/comment-2.jpg' alt='Image' class='mb-2 rounded-circle img-thumbnail'>
                            <figcaption class='tm-color-primary text-center'style='color: red;' >Jewel Soft</figcaption>    
                        </figure>
                        <p style='color: red;'>
                    
                         {$row['content']}
                        </p>
                    </div>                                
                    <span class='d-block text-right tm-color-primary'>June 21, 2020</span>
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
            </div>
            <hr class='tm-hr-danger tm-mb-45'> 

                ";
                
  replies($row['id'],$conn,$space,$user_id,$id);  };
  if($row['user_id']==$user_id){
    echo"
        <div class='tm-comment-reply tm-mb-45'>
                        
                        <div class='tm-comment'><pre>$space</pre>
                            <figure class='tm-comment-figure'>
                                <img src='img/comment-2.jpg' alt='Image' class='mb-2 rounded-circle img-thumbnail'>
                                <figcaption class='tm-color-primary text-center'style='color: red;' >Jewel Soft</figcaption>    
                            </figure>
                            <p style='color: red;'>
                        
                             {$row['content']}
                            </p>
                        </div>                                
                        <span class='d-block text-right tm-color-primary'>June 21, 2020</span>
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
                </div>
                <hr class='tm-hr-danger tm-mb-45'> 
                <form action='editpost.php?id=$id'class='mb-1 tm-comment-form' method='post'>
                <input class='form-control' name='content' type='hidden' value='{$row['content']}' >
                <button class='tm-btn tm-btn-primary tm-btn-big'>edit</button>
                </form> 
                <form action='deletereplyي.php?id=$id'class='mb-2 tm-comment-form' method='post'>
                <input class='form-control' name='delete' type='hidden' value='{$row['content']}' >
                <button class='tm-btn tm-btn-primary  tm-btn-small'>delete</button>
                </form> 
    
                    ";
                    
      replies($row['id'],$conn,$space,$user_id,$id);  };
}
}
else {
    return ;
}

    }





