<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Čivkač</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/log.css">
        <script src="js/intro.js" type="text/javascript"></script>
    </head>
    <body class="body-back-intro">
        <?php
            session_start();
            if (isset($_SESSION['username'])) {
                header('Location: home.php');
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
                                <a href="#"><span class="glyphicon glyphicon-bell"></span> O Čivkaču</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-user"></span>Lang: sl-si</a>
                            </li>
                            <li>
                                &nbsp&nbsp&nbsp&nbsp
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="log-reg">
            <div class="col-sm-7">

            </div>
            <div class="log-box col-sm-2">
                <form class="" action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">E-poštni naslov:</label>
                        <input required name="email" maxlength="30" class="form-control" id="email1" type="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">geslo:</label>
                        <input required name="pass" maxlength="30"  class="form-control" id="pwd" type="password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Zapomi si me</label>
                    </div>
                    <input class="btn btn-default" type="submit" value="Vpisi se!">
                </form>
            </div>
            <div class="col-sm-7">

            </div>
            <div class="reg-box col-sm-2">
                    <form id="register-form" class="" action="register.php" method="post">
                        <div class="form-group">
                            <label for="name">ime: <span class="redtext" id="wrongname"></span></label>
                            <input required name="ime" class="form-control" id="name" type="text">
                        </div>
                        <div class="form-group">
                            <label for="name">handle: <span class="redtext" id="wronghandle"></span></label>
                            <input required name="handle" class="form-control" id="handle" type="text">
                        </div>
                        <div class="form-group">
                            <label for="email">E-poštni :<span class="redtext" id="wrongemail"></span></label>
                            <input required name="mail" class="form-control" id="email" type="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">geslo: <span class="redtext" id="passmach"></span></label>
                            <input required  name="pass1" class="form-control" id="pwd1" type="password">
                        </div>
                        <div class="form-group">
                            <label for="pwd">geslo: <span class="redtext" id="passmach2"></span></label>
                            <input required name="pass2" class="form-control" id="pwd2" type="password">
                        </div>
                        <button id="reg-button" class="btn btn-default" type="button" name="button">Prijavi se!</button>
                    </form>
            </div>
        </div>

    </body>
</html>
