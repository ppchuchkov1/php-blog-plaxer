<?php
function deletePost(){

    global $con;
    if (isset($_GET['delete_id'])){
$deleteId = $_GET['delete_id'];
    $sqlDeletePost = "DELETE FROM posts WHERE post_id = '$deleteId'";
    $queryDeletePost = mysqli_query($con,$sqlDeletePost);
}
}

function updatePost(){
    global $con;
    if (isset($_GET['update_id'])){
        if (isset($_POST['update'])){
        $updateId = $_GET['update_id'];
        $updateHeading = trim($_POST['updatePostHeading']);
        $updateContent = trim($_POST['updatePostContent']);
        $updateHeading= mysqli_real_escape_string($con,$updateHeading);
        $updateContent = mysqli_real_escape_string($con,$updateContent);
        $updateImageName = $_FILES['updateImage']['name'];
        $updateImageTmp = $_FILES['updateImage']['tmp_name'];
        $updateDate = date("Y-m-d H:i:s");
        $folder = '../blog/update-images/';
        move_uploaded_file($updateImageTmp, $folder.$updateImageName);
        $sqlUpdatePost = "UPDATE posts
        SET post_heading = '$updateHeading', post_content = '$updateContent',post_image = '$updateImageName',post_date = '$updateDate'
        WHERE post_id = '$updateId'";
        $queryUpdatePost = mysqli_query($con,$sqlUpdatePost);

    }
}
}