<?php include 'admin-includes/loginHeader.php'; ?>
<?php

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $password = md5($_POST['password']);
    $password = trim( $password);
    $password = mysqli_real_escape_string($con, $password);
    $confirmPassword = md5($_POST['confirmPassword']);
    $confirmPassword = trim( $confirmPassword);
    $confirmPassword = mysqli_real_escape_string($con, $confirmPassword);
    $email = $_POST['email'];
    $avatar = $_FILES['avatar']['name'];
    $avatarTmp = $_FILES['avatar']['tmp_name'];
    $dateRegister  = date("Y-m-d H:i:s");
    $folder = 'avatars/';
    move_uploaded_file($avatarTmp,$folder.$avatar);
if ($password == $confirmPassword) {
    $sqlRegister = "INSERT INTO users (user_name, user_password, user_email,avatar_image, user_role,date_register)
                    VALUES ('$username','$password', '$email','$avatar', 'default', '$dateRegister');";
    $queryRegister = mysqli_query($con, $sqlRegister);

    if (!$queryRegister) {
        die('QUERY FAILED: ' . mysqli_error($con));
    } else {
        echo 'successful';
    }
}else{
    echo 'Password didnt match';
}

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


            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">
                        <di class="p-5">
                            <div class="text-center">
                                <h2 class="h1-responsive font-weight-bold text-center my-4">Register</h2>
                                <p class="text-center w-responsive mx-auto contact-p">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                    a matter of hours to help you.</p>
                            </div>
                            <form id="register-form" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail">
                                    <label for="name" class="">Your name</label>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail">
                                    <label for="name" class="">Your email</label>
                                </div>

                                <div class="form-group">

                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword">
                                    <label for="name" class="">Your password</label>
                                    </div>

                                <div class="form-group">

                                        <input type="password" name="confirmPassword" class="form-control"
                                            id="exampleRepeatPassword">
                                    <label for="name" class="">Repeat password</label>
                                    </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file input</label>
                                    <input name="avatar" type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>


                                <input  type="submit" name="register" value="Register Account" class="button-login p-1">


                            </form>

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