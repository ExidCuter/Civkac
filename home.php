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
								<a href="#"><span class="glyphicon glyphicon-home"></span> Domov</a>
							</li>
							<li>
								<a href="#"><span class="glyphicon glyphicon-bell"></span> Obvestila</a>
							</li>
							<li>
								<a href="#"><span class="glyphicon glyphicon-envelope"></span> Sporočila</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
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
							<img class="img-prof img-circle" src="<?php echo $_SESSION['img']; ?>" alt="">
						</div>
						<div class="name">
							<div class="username">
								<b><?php echo $_SESSION['username']; ?></b>
							</div>
							<div class="handle">
								@<?php echo $_SESSION['handle']; ?>
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
						<div class="spacer"><br></div>
					</div>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-6 white-back">
					<div class="row write-post-back">
						<div class="col-sm-1"></div>
						<div class="col-sm-10">
							<div class="padding-top-bot">
								<div class="inline">
									<img class="img-write img-circle" src="<?php echo $_SESSION['img']; ?>" alt="">
								</div>
								<div class="inline form-horizontal">
									<input id="text" class="form-control inline" style="width: 80%;" type="text" name="" value="">
									<button id="civkni" class="btn btn-info" type="button" name="button">čivkni</button>
								</div>
							</div>
						</div>
					</div>
					<div class="content">
						<?php
						include('scripts/tweets.php');
						?>
						<div class="post">
							<div class="col-sm-2 coustom-col-2 ">
								<div class="img-post-div ">
									<img class="img-post img-circle" src="img/prof.jpg" alt="">
								</div>
							</div>
							<div class="post-name col-sm-10  coustom-col-10">
								<span> <b>Dodo Dodović</b></span> <span>@dodo</span> <span> - </span> <span>24h</span>
							</div>
							<div class="col-sm-10 coustom-col-10">
								<div class="post-text">
									Zdej delajo civki!
								</div>
							</div>
							<div class="col-sm-12">
								<hr>
							</div>
						</div>


					</div>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>

	</body>
</html>
