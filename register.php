<?php
include('scripts/conn.php');
echo "<br>";
session_start();
$sql = "INSERT INTO users (username, password, handle, email) VALUES ('".$_POST['ime']."', '".hash('sha256', $_POST['pass1'])."', '".$_POST['handle']."', '".$_POST['mail']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['username'] = $_POST['ime'];
    $_SESSION['handle'] = $_POST['handle'];
    $_SESSION['img'] = "img/logo.png";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "<br>".hash('sha256', $_POST['pass1']);
header("Location: index.php");
?>
