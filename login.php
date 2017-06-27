<?php
include('scripts/conn.php');
echo "<br>";
session_start();

$sql = "SELECT * FROM users where email LIKE '".$_POST['email']."' AND password LIKE '".hash('sha256', $_POST['pass'])."';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $row["username"];
        $_SESSION['handle'] = $row["handle"];
        $_SESSION['img'] = $row["image"];
        header('Location: home.php');
    }
} else {
    echo "0 results";
    //header('Location: index.php');
}
$conn->close();

?>
