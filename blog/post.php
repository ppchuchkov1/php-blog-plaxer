<?php include 'blogIncludes/blogHeader.php';?>
<body class="font">
<?php include 'blogIncludes/blogNavigation.php';?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">
<?php
include '../includes/config.php';
//count comments
$GetPostId = $_GET['p_id'];
$sqlCommentsCount = "SELECT * FROM comments WHERE post_comment_id = '$GetPostId'";
$queryCommentsCount = mysqli_query($con,$sqlCommentsCount);
$countComments = mysqli_num_rows($queryCommentsCount);


if (isset($_GET['p_id'])){
    $getId = $_GET['p_id'];
    $sqlViewSinglePost = "SELECT * FROM posts WHERE post_id ='$getId'";
    $queryViewSinglePost  = mysqli_query($con,$sqlViewSinglePost);

    while ($row = mysqli_fetch_assoc($queryViewSinglePost)){
    $postAuthor = $row['post_author'];
    $postHeading = $row['post_heading'];
    $postContent = $row['post_content'];
    $postImage = $row['post_image'];
    $postDate = $row['post_date'];
?>
        <!-- Title -->
        <h1 class="mt-4"><?php echo $postHeading;?></h1>

        <!-- Author -->
        <p class="lead">
            by:
        <?php echo $postAuthor ;?>
        </p>

        <hr>

        <!-- Date/Time -->

        <p><?php echo $postDate;?></p>
        <a href="#comments-section"> <p class="text-secondary">Comments ( <?php echo $countComments; ?> )</p></a>
        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" style="width: 100%" src="images/<?php echo $postImage;?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $postContent?></p>

    <?php }}?>
        <hr>
          <!-- Single Comment -->
          <?php
          $getId = $_GET['p_id'];
          $sqlViewComments = "SELECT * FROM comments WHERE  post_comment_id = '$getId' ";
          $queryViewComments = mysqli_query($con,$sqlViewComments);
          while ($comment = mysqli_fetch_assoc($queryViewComments)){
              $commentContent = $comment['comment_content'];
              $commentAuthor = $comment['comment_author'];
              $commentUserImage = $comment['user_comment_image'];
              $commentDate = $comment['comment_date'];


          ?>

          <div class="media mb-4" id="comments-section">
              <img class="d-flex mr-3 rounded-circle" src="../admin/avatars/<?php echo $commentUserImage?>" width="70px" height="70px" alt="">
              <div class="media-body">
                  <h5 class="mt-0"><?php echo $commentAuthor?></h5>
                  <p> <?php echo $commentContent?></p>
                  <p style="color:gray; font-size: 15px"><?php echo $commentDate?></p>
                  <hr>
                    </div>
          </div>
<?php } ?>
          <?php
          if (isset($_POST['submit'])) {
              $getId = $_GET['p_id'];
              $userCommentContent = $_POST['content'];
              $commentDate = date("Y-m-d H:i:s");
              $username = $_SESSION['user_name'];
              $avatar = $_SESSION['avatar_image'];
              $sqlAddComment = "INSERT INTO comments (post_comment_id,comment_author, user_comment_image, comment_content, comment_date)
          VALUES ('$getId','$username','$avatar','$userCommentContent','$commentDate')";
              $queryAddComment = mysqli_query($con, $sqlAddComment);
              if (!$queryAddComment){
                  die('query Failed'. mysqli_error($con));
              }
              header('refresh:0');

          }
          ?>
        <!-- Comments Form -->
        <?php

       if (isset($_SESSION['user_name'])){
           echo '<div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <input type="text" name="content" class="form-control">
              </div>
              <button type="submit" name="submit" class="btn btn-dark">Submit</button>
            </form>
          </div>
        </div>';
       }else{
           echo '<div class="card my-4">
          <h5 class="card-header">You have to be login to leave comment.</h5>
          </div>';
       }
        ?>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>
          <!-- Side Widget -->
          <div class="card my-4">
              <h5 class="card-header">Side Widget</h5>
              <div class="card-body">
                  You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
              </div>
          </div>
          <!-- Side Widget -->
          <div class="card my-4">
              <h5 class="card-header">Side Widget</h5>
              <div class="card-body">
                  You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
              </div>
          </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php include 'blogIncludes/blogFooter.php';?>
