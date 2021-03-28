<?php
$con = mysqli_connect("localhost","YOUR_USERNAME","YOUR_PASSWORD","plaxer");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
