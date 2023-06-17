<?php
    $message = $_POST['message'];
    $color = $_POST['color-picker'];
    include("config/db_config.php");
    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    $message = $conn->real_escape_string($message);
    session_start ();
    $_SESSION['pass'];
    $_SESSION['name'];
    $_SESSION['color'];
    $user = $_SESSION['name'];
    $color = $_SESSION['color'];
    $sql = "INSERT INTO messages (user, message,color ) VALUES ('$user', '$message', '$color')";
    $conn->query($sql);
    $conn->close();
?>
