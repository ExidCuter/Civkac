<?php
include('conn.php');
session_start();

$sql = "SELECT u.username, u.handle, u.image, t.tText, t.time FROM users u INNER JOIN tweets t ON u.id = user_id WHERE u.handle = '".$_SESSION['handle']."' ORDER BY t.time DESC ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="post">
        	<div class="col-sm-2 coustom-col-2">
        		<div class="img-post-div"><img alt="" class="img-post img-circle" src="'.$row['image'].'"></div>
        	</div>
        	<div class="post-name col-sm-10 coustom-col-10">
        		<span><b>'.$row['username'].'</b></span> <span>@'.$row['handle'].'</span> <span>-</span> <span>'.$row['time'].'</span>
        	</div>
        	<div class="col-sm-10 coustom-col-10">
        		<div class="post-text">
        			'.$row["tText"].'
        		</div>
        	</div>
        	<div class="col-sm-12">
        		<hr>
        	</div>
        </div>';
    }
}
$conn->close();
?>
