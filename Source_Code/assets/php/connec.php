<?php
    $conn = mysqli_connect('localhost', 'root', '', 'crime');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
