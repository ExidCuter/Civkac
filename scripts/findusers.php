<?php
$q = $_GET['q'];

include('conn.php');
session_start();

$sql="SELECT username, handle, image FROM users WHERE handle LIKE '%".$q."%' OR username LIKE '%".$q."%'";
$result = $conn->query($sql);
echo "<br>";
while($row = mysqli_fetch_array($result)) {
    echo " <a href='user.php?q=".$row['handle']."'>&nbsp&nbsp <img class='img-post img-circle' src='https://the-dodo.xyz/".$row['image']."'/> <b> ".$row['username']."</b> @".$row['handle']."<a/><hr>";
}

$conn->close();
?>
