<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Čivkač</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="js/script.js" type="text/javascript"></script>
	</head>
	<body class="body-back">
		<?php
			session_start();
            if (!isset($_SESSION['username'])) {
                header('Location: index.php');
            }
            $user = $_GET['q'];
            include('scripts/conn.php');
            $getuser = "SELECT id, username, image FROM users WHERE handle = '".$user."';";
            $result = $conn->query($getuser);
            $username = "unknown";
            $img = "img/logo.png";
            $userid = -1;
            if ($result->num_rows > 0) {
            	$row = $result->fetch_assoc();
            	$username = $row['username'];
                $img = $row['image'];
                $userid = $row['id'];
            }

            $getId = "SELECT id FROM users WHERE handle = '".$_SESSION['handle']."';";
            $result = $conn->query($getId);
            $id = -1;
            if ($result->num_rows > 0) {
            	$row = $result->fetch_assoc();
            	$id = $row['id'];
            }

            $sql = "SELECT follows_id FROM follows WHERE user_id = '".$id."';";
            $result = $conn->query($sql);
            $follows = false;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if ($row['follows_id']===$userid){
                        $follows = true;
                    }
                }
            }
            $conn->close();
         ?>
		<div class="navi">

			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="">
								<a href="home.php"><span class="glyphicon glyphicon-home"></span> Domov</a>
							</li>
							<li>
								<a href="#"><span class="glyphicon glyphicon-bell"></span> Obvestila</a>
							</li>
							<li>
								<a href="#"><span class="glyphicon glyphicon-envelope"></span> Sporočila</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							<form class="navbar-form navbar-left">
								<div class="input-group">
									<input id="search" type="text" class="form-control" placeholder="Search">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<i class="glyphicon glyphicon-search"></i>
										</button>

									</div>
									<div id="result" class="result">

									</div>
								</div>
							</form>
							</li>
							<li>
								<a href="scripts/logout.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username']; ?></a>
							</li>
							<li>
								<button class="btn btn-info navbar-btn" type="button" name="button"> <span class="glyphicon glyphicon-edit"></span> Čivkni</button>
							</li>
							<li>
								&nbsp&nbsp&nbsp&nbsp
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="">
			<div class="top">
				<div class="col-sm-1"></div>
				<div class="col-sm-3 white-back ">
					<div class="profile ">
						<div class="margin-all">
							<img class="img-back" src="img/back.png" alt="">
						</div>
						<div style="background-color: #fff;" class="img-up">
							<img class="img-prof img-circle" src="<?php echo $img; ?>" alt="">
						</div>
						<div class="name">
							<div class="username">
								<b><?php echo $username; ?></b>
							</div>
							<div class="handle">
								@<?php echo $user; ?>
							</div>
						</div>

						<div style="margin-top: 4%;" class="stats row">
							<div class="col-sm-4">
								<div class="what">
									<b>Čivkov</b>
								</div>
								<div class="how-many">
									#
								</div>
							</div>
							<div class="col-sm-4">
								<div class="what">
									<b>Sledi</b>
								</div>
								<div class="how-many">
									#
								</div>
							</div>
							<div class="col-sm-4">
								<div class="what">
									<b>Sledeci</b>
								</div>
								<div class="how-many">
									#
								</div>
							</div>
						</div>
						<div class="spacer">
                            <br>
                            <div class="follow">
                                <?php
                                    if ($follows) {
                                        echo '<button id="nehi" koga="'.$user.'" style="width: 100%;" class="btn btn-danger" type="button" name="button">Nehaj slediti!</button>';
                                    }
                                    else {
                                        echo '<button id="dej" koga="'.$user.'" style="width: 100%;" class="btn btn-info" type="button" name="button">Sledi!</button>';
                                    }
                                 ?>
                            </div>
                            <br>
                        </div>
					</div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-6 white-back">
					<div class="content">
						<?php
                        include('scripts/conn.php');
                        $sql = "SELECT u.username, u.handle, u.image, t.tText, t.time FROM users u INNER JOIN tweets t ON u.id = user_id WHERE u.handle = '".$user."' ORDER BY t.time DESC ;";
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
					</div>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>

	</body>
</html>
