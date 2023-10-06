
<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
           
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item active"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                           Home
                    </a></li>
                    <li class="tm-nav-item"><a href="post.php" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Single Post
                    </a></li>
                    <li class="tm-nav-item"><a href="about.php" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        About Xtra
                    </a></li>
                    <li class="tm-nav-item"><a href="contact.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>
                    <li class="tm-nav-item"><a href="register.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Register
                    </a></li>
                   <?php if(isset ($_SESSION['username'])){
                        echo "
                          <li class='tm-nav-item'><a href='logout.php' class='tm-nav-link'>
                        <i class='far fa-comments'></i>
                         logout
                    </a></li>
                   ";}
                   else{
                    echo"
                    <li class='tm-nav-item'><a href='login.php' class='tm-nav-link'>
                        <i class='far fa-comments'></i>
                         Login
                    </a></li>
                   ";
                   }?>
                    <?php 
                    if(isset ($_SESSION['username'])){
                        $name=$_SESSION['username'];
                        $query="SELECT id FROM user where name='$name'";
                        $result=mysqli_query($conn,$query);
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                        $id=$row['id'];
                    echo"
                    <li class='tm-nav-item'><a href='profile.php?id=$id' class='tm-nav-link'>
                        <i class='far fa-comments'></i>
                         Profile
                    </a></li>";
                    }}}
                    ?>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
                Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
            </p>
        </div>
    </header>