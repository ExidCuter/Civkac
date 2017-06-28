<?php
$q = $_GET['q'];

include('conn.php');
session_start();


$getuser = "SELECT id FROM users WHERE handle = '".$q."';";
$result = $conn->query($getuser);

$userid = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userid = $row['id'];
}

echo "userid: ".$userid."<br>";

$getId = "SELECT id FROM users WHERE handle = '".$_SESSION['handle']."';";
$result = $conn->query($getId);

$id = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
}

echo "id: ".$id."<br>";

$sql = "SELECT * FROM follows where user_id = '".$id."' AND follows_id = '".$userid."';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql = "DELETE FROM follows WHERE user_id = '".$id."' AND follows_id = '".$userid."';";
}
else {
    $sql = "INSERT INTO follows (user_id, follows_id) VALUES(".$id.", ".$userid.");";
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully/zbrisal";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
