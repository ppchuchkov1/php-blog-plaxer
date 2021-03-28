<?php
session_start();
include '../includes/config.php';

if (isset($_POST['submitPost'])) {
    if (isset($_SESSION['user_name'])) {
        $postUsername = $_SESSION['user_name'];

        $postHeading = trim($_POST['postHeading']);
        $postContent = trim($_POST['postContent']);
        $postHeading= mysqli_real_escape_string($con,$postHeading);
        $postContent = mysqli_real_escape_string($con,$postContent);
        $postImageName = $_FILES['image']['name'];
        $postImageTmp = $_FILES['image']['tmp_name'];
        $postDate = date("Y-m-d H:i:s");
        $folder = 'images/';
        move_uploaded_file($postImageTmp, $folder.$postImageName);
        $sqlAddPost = "INSERT INTO posts (post_author,post_heading,post_content,post_image,post_date)
    VALUES ('$postUsername','$postHeading','$postContent','$postImageName','$postDate')";
        $queryAddPost = mysqli_query($con, $sqlAddPost);
        if ($queryAddPost) {
            echo 'successful';
        } else {
            die('Query failed: ' . mysqli_error($con));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/blog-add-post.css">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body id="body">
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
<div class="main-section">
<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Add Post</h2>
<!--Section description-->
    <div class="container">
<p class="text-center w-responsive mx-auto mb-5" id="contact-p">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
    a matter of hours to help you.</p>
    </div>
<form id="form-section"  action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="postHeading" class="form-control" id="exampleFormControlInput1">
        <label for="exampleFormControlInput1">Post Heading</label>
    </div>

    <div class="form-group">
        <textarea class="form-control" name="postContent" id="exampleFormControlTextarea1" rows="3"></textarea>
        <label for="exampleFormControlTextarea1">Example textarea</label>
    </div>
    <div class="form-group">
        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <input type="submit" name="submitPost" value="submit" id="button">
</form>
</div>

</body>
</html>
