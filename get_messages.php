<?php
    include("config/db_config.php");
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT user, color, message FROM messages ORDER BY id DESC LIMIT 10";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user = $row['user'];
            $color = $row['color'];
            $message = $row['message'];
            echo "<div class='msg'>
                    <div class='msg-info'>
                    <div class='msg-info-name'><span style='color: $color;'>$user</span></div>
                    </div>
                    <div class='msg-text'>$message</div>
                </div>";
        }
    }
    $conn->close();
?>
