<?php include 'admin-includes/loginHeader.php';?>
<?php
session_start();
if (isset($_POST['login'])){
    $loginUsername = trim($_POST['username']);
    $loginPassword = trim($_POST['password']);
    $loginUsername = mysqli_real_escape_string($con,$loginUsername);
    $loginPassword =  mysqli_real_escape_string($con,$loginPassword);
    $loginPassword = md5($loginPassword);

    $sqlChekLogin = "SELECT * FROM users WHERE user_name = '$loginUsername' AND user_password = '$loginPassword'";
    $queryCheckLogin = mysqli_query($con, $sqlChekLogin);
    if (!$queryCheckLogin) {
        die('QUERY FAILED: ' . mysqli_error($con));
    }
while ($row = mysqli_fetch_assoc($queryCheckLogin)) {
    $userId = $row['user_id'];
    $userName = $row['user_name'];
    $userPassword = $row['user_password'];
    $userRole = $row['user_role'];
    $userAvatar = $row['avatar_image'];


    if (($loginUsername == $userName) && ($loginPassword == $userPassword) && ($userRole == 'admin')) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $userName;
        $_SESSION['user_password'] = $userPassword;
        $_SESSION['user_role'] = $userRole;
        $_SESSION['avatar_image'] = $userAvatar;
        header("Location: index.php");

    } elseif (($loginUsername == $userName) && ($loginPassword == $userPassword) && ($userRole == 'default')) {
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $userName;
        $_SESSION['user_password'] = $userPassword;
        $_SESSION['user_role'] = $userRole;
        $_SESSION['avatar_image'] = $userAvatar;
        header("Location:../index.php");
    }else{
        header("Location:login.php");
    }
}
}
if(isset ($_SESSION["user_name"]) && $_SESSION["user_password"] &&  $_SESSION['user_role'] =='admin'){
    header("location: index.php");
    exit;
}
if(isset ($_SESSION["user_name"]) && $_SESSION["user_password"] &&  $_SESSION['user_role'] =='default'){
    header("location: ../index.php");
    exit;
}
?>
<body class="bg-gradient-primary">
<nav id="contact-nav" class="navbar nav-text navbar-expand-lg navbar-default opacity-0">
    <a class="navbar-brand contact-logo" href="../index.php"><img src="../images/logo-dark.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse p-nav" id="navbarText">
        <ul class="navbar-nav mr-auto ">


        </ul>

        <a class="nav-link" id="nav-link-li" href="../index.php">Home</a>

    </div>
</nav>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
<!--                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->

                            <div class="col-lg-12">
                                    <div class="text-center">
                                        <!--Section heading-->
                                        <h2 class="h1-responsive font-weight-bold text-center my-4">Login</h2>
                                        <p class="text-center w-responsive mx-auto contact-p">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                            a matter of hours to help you.</p>
                                        <!--Section description-->

                                    </div>
                                    <form class="user login-form" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp">
                                            <label for="name" class="">Your name</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword">
                                            <label for="name" class="">Your name</label>
                                        </div>
                                        <div class="form-group">
                                                <input type="submit" name="login" class="button-login p-1" value="Login">

                                            </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>