<nav id="index-nav" class="navbar navbar-expand-lg navbar-default navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="images/logo-dark.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class='nav-item'>
                    <a class='nav-link' id='nav-link-li'  href='#'>Home</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' id='nav-link-li' href='#services'>Services</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' id='nav-link-li' href=blog/index.php>Blog</a>
                </li>
                <?php
                if(isset($_SESSION['user_name'])) {
                    $sessionUser = $_SESSION['user_name'];
                    echo "
              <li class='nav-item'>
                  <a class='nav-link' id='nav-link-li'   href='blog/addPost.php'>Upload Post</a>
              </li>
                <li class='nav-item'>
                  <a class='nav-link'  id='logout-link' href='admin/logout.php'>Logout<sub>$sessionUser</sub></a>
              </li>";
                }else{
                    echo  " <li class='nav-item'>
                  <a class='nav-link' id='nav-link-li' href='admin/login.php'>Login</a>
              </li>
              <li class='nav-item'>
                  <a class='nav-link' id='nav-link-li' href='admin/register.php'>Register</a>
              </li>";
                }
                ?>
                <li class='nav-item'>
                    <a class='nav-link' id='nav-link-li' href='contact/contact.html'>Contact</a>
                </li>
                <?php
                if (isset($_SESSION['user_name'])){
                    if ($_SESSION['user_role'] == 'admin'){
                        echo " <li class='nav-item'>
              <a class='nav-link' id='nav-link-li' href='admin/index.php'>Admin</a>
            </li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
