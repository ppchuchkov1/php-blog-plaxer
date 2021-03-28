<?php include 'blogIncludes/blogHeader.php';?>
<body class="font">
<?php include 'blogIncludes/blogNavigation.php';?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">
        <div class="col-md-8">
            <?php

$sqlCountPosts = "SELECT * FROM posts ";
$queryCountPosts = mysqli_query($con,$sqlCountPosts);
$countPosts = mysqli_num_rows($queryCountPosts);
$postPerPage = 4;
$countPosts = ceil($countPosts /$postPerPage);

if (isset($_GET['page'])){
    $page= $_GET['page'];
}else{
    $page = '';
}
if ($page == '' || $page == 1 ){
    $page1 = 0;
}else{
    $page1 = ($page * $postPerPage) - $postPerPage ;
}


$sqlViewAllPosts = "SELECT * FROM posts ORDER BY post_date DESC LIMIT $page1,$postPerPage ";
$queryViewAllPosts = mysqli_query($con,$sqlViewAllPosts);
while ($row = mysqli_fetch_assoc($queryViewAllPosts)){
    $postId = $row['post_id'];
    $postAuthor = $row['post_author'];
    $postHeading = $row['post_heading'];
    $postContent = $row['post_content'];
    $postImage = $row['post_image'];
    $postDate = $row['post_date'];
?>
      <!-- Blog Entries Column -->


        <h1 class="my-4">Author
          <small><?php echo $postAuthor ?></small>
        </h1>
        <!-- Blog Post -->
        <div class="card mb-4">
        <a href="post.php?p_id=<?php echo $postId?>"><img class="card-img-top" src="images/<?php echo $postImage?>" height="450px" alt="Card image cap"></a>
          <div class="card-body">
            <h2 class="card-title"><?php echo $postHeading?></h2>
            <p class="card-text"><?php echo $postContent?></p>
          </div>
          <div class="card-footer text-muted">
              <?php echo $postDate?>
          </div>
        </div>
<?php }?>
        <!-- Pagination -->
        <ul class="pagination">
         <?php

         for ($i=1; $i <= $countPosts; $i++){
             echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
         }

         ?>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->


        <!-- Categories Widget -->

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

          <div class="card my-4">
              <h5 class="card-header">Side Widget</h5>
              <div class="card-body">
                  You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
              </div>
          </div>

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
 <?php include 'blogIncludes/blogFooter.php';?>