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
                <table class='table table-hover'>
                    <thead>
                    <tr>
                        <th scope='col'>Post Author</th>
                        <th scope='col'>Post Heading</th>
                        <th scope='col'>Post Content</th>
                        <th scope='col'>Post Image</th>
                        <th scope='col'>Post Link</th>
                        <th scope='col'>Post Date</th>
                        <th scope='col'>Update</th>
                        <th scope='col'>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    deletePost();
                    $sqlViewUsers = "SELECT * FROM posts";
                    $queryViewPosts = mysqli_query($con,$sqlViewUsers);
                    while ($row = mysqli_fetch_assoc($queryViewPosts)){
                        $postId = $row['post_id'];
                        $postAuthor = $row['post_author'];
                        $postHeading = $row['post_heading'];
                        $postContent = $row['post_content'];
                        $postImage = $row['post_image'];
                        $postDate = $row['post_date'];

                        echo "
              <tr>
                        <td>$postAuthor</td>
                        <td>$postHeading</td>
                        <td>$postContent</td>
                        <td><img src='../blog/images/$postImage' width='100px'></td>
                      <td><a href='../blog/post.php?p_id=$postId'>View Post</a></td>
                        <td>$postDate</td>
                         <td><a href='adminUpdatePosts.php?update_id=$postId' class='btn btn-primary'>Update</a></td>
                           <td><a href='adminViewPosts.php?delete_id=$postId' class='btn btn-danger'>Delete</a></td>
                    </tr>
                             ";
                    }

                    ?>

                    </tbody>
                </table>




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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.php">Logout</a>
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