<?php
    $conn = mysqli_connect("localhost", "root", "", "users");

    if (!$conn) {
        echo "<script>alert('Connection failed.');</script>";
    }
?>
