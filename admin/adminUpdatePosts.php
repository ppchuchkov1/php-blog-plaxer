<?php include "admin-includes/adminHeader.php"; ?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'admin-includes/adminNavigation.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php include 'admin-includes/adminTopbar.php';?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                updatePost();
                if (isset($_GET['update_id'])) {
                    $updateId = $_GET['update_id'];
                    $sqlViewUpdatePost = "SELECT * FROM posts WHERE post_id = '$updateId'";
                    $queryViewUpdatePost = mysqli_query($con, $sqlViewUpdatePost);
                    if (!$queryViewUpdatePost){
                        die('QUERY FAILED: ' .mysqli_error($con));
                    }
                    while ($row = mysqli_fetch_assoc($queryViewUpdatePost)) {
                        $postId = $row['post_id'];
                        $postAuthor = $row['post_author'];
                        $postHeading = $row['post_heading'];
                        $postContent = $row['post_content'];
                        $postImage = $row['post_image'];
                        $postDate = $row['post_date'];

                ?>
                        <h1>Update Post</h1>
                <form id="form-section"  action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="updatePostHeading" value="<?php echo $postHeading ?>" class="form-control" id="exampleFormControlInput1">
                        <label for="exampleFormControlInput1">Post Heading</label>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" value="<?php echo $postHeading ?>" name="updatePostContent" id="exampleFormControlTextarea1" rows="3"><?php echo $postContent ?></textarea>
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                    </div>
                    <div class="form-group">
                        <img id="blah" src="../blog/images/<?php echo $postImage?>" alt="your image" width="500px" />
                        <input type="file" name="updateImage" class="form-control-file" id="imgInp">
                    </div>
                    <input type="submit" class="btn btn-primary" name="update" value="Update" id="button">
                </form>

<?php } }?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>
</body>

</html>