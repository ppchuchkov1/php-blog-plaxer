
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
    <a href="index.php"><img src="../images/logo-dark.png" class="pl-5" alt=""></a>
    <?php
        if (isset($_SESSION['user_name'])){
            $username =$_SESSION['user_name'];
            $avatar = $_SESSION['avatar_image'];
            echo " <ul class='navbar-nav ml-auto'>
        <div class='topbar-divider d-none d-sm-block'></div>
 
        <!-- Nav Item - User Information -->
        <li class='nav-item dropdown no-arrow'>
            <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
               data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <span class='mr-2 d-none d-lg-inline text-white'>$username</span>
                <img class='img-profile rounded-circle'
                     src='../admin/avatars/$avatar' width='60px' height='60px'>
            </a>
            <!-- Dropdown - User Information -->
            <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
                 aria-labelledby='userDropdown'>
                <a class='dropdown-item' href='../admin/logout.php'>
                    <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>";
        }else{
            echo "
<ul class='navbar-nav ml-auto'>
        
 <li><a class='text-white mr-5' href='../admin/login.php'>Login</a>
 </li>";
        }

        ?>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


</nav>