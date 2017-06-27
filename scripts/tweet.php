<?php
include('conn.php');
session_start();
echo "DELA";
$obj = $_POST['myData'];

$sql = "SELECT id FROM users WHERE handle = '".$_SESSION['handle']."';";
$result = $conn->query($sql);

$id = -1;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id=$row['id'];

    $sql = "INSERT INTO tweets (tText, user_id, time) VALUES('".$obj."', ".$id.", NOW());";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
else {
    echo "ni najdu";
}

$conn->close();
?>
