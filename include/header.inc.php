<?php
session_start();
if ($_SESSION['id'] != NULL) {
} else {
    header('location:/');
}
include '../fonctionPhp/fonction.php';
include '../Classes/Utilisateur.php';
$user = new Utilisateur($mysqli, $_SESSION['id']);
$a = $user->getPseudo();
$connect = new PDO("mysql:host=mysql-amine95.alwaysdata.net;dbname=amine95_netlife", "amine95", "Marseille95");

if (isset($_POST["searchBtn"])) {
    $search_query = preg_replace("#[^a-z 0-9?!]#i", "", $_POST["searchbar"]);

    header('location:search.php?query=' . urlencode($search_query) . '');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>NetLife</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo_2.png" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="../fichierJs/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src="../fichierJs/bootstrap-datepicker.js"></script>
    <script src="../fichierJs/bootstrap-datepicker.fr.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css" />

    <script src="../fichierJs/images-grid.js"> </script>
    <link rel="stylesheet" href="../css/images-grid.css" />

    <style>
        .wrapper-preview {
            padding: 50px;
            background: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .25);
            border-radius: 10px;
            text-align: center;
        }

        .col-centered {
            float: none;
            margin: 0 auto;
        }

        .wrapper-box {

            padding: 20px;
            margin-bottom: 20px;
            background: #ECEBE4;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .25);
            border-radius: 10px;
        }

        .wrapper-box-title {
            font-size: 20px;
            line-height: 100%;
            color: #000;
            padding-bottom: 8px;
        }

        .wrapper-box-description {
            font-size: 14px;
            line-height: 120%;
            color: #000;
        }

        #friend_request_list li {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
        }

        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }



        .navbar-default {
            background-color: #222930;


        }

        .nav.navbar-nav navbar-right li a {
            background-color: #E9E9E9;
        }



        h1 {
            color: #E9E9E9;
        }

        h3 {
            color: #E9E9E9;
        }

        p {
            color: #E9E9E9;
        }

        a.btn {
            text-decoration: none;
            color: #666;
            border: 2px solid #666;
            padding: 10px 15px;
            display: inline-block;
            margin-left: 5px;
        }

        a.btn:hover {
            background: #666;
            color: #fff;
            transition: .3s;
            -webkit-transition: .3s;
        }

        .btn:before {
            font-family: FontAwesome;
            font-weight: normal;
            margin-right: 10px;
        }

        .github:before {
            content: "\f09b"
        }

        .down:before {
            content: "\f019"
        }

        .back:before {
            content: "\f112"
        }

        [contenteditable] {
            outline: 0px solid transparent;
            min-height: 100px;
            height: auto;
            cursor: auto;
        }

        [contenteditable]:empty:before {
            content: attr(placeholder);
            color: #ccc;
            cursor: auto;
        }

        [placeholder]:empty:focus:before {
            content: "";
        }

        #temp_url_content a {
            text-decoration: none;
        }

        #temp_url_content a:hover {
            text-decoration: none;
        }

        #temp_url_content h3,
        #temp_url_content p {
            padding: 0 16px 16px 16px;
        }

        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            height: 100%;
            opacity: 0;
            filter: alpha(opacity=0);
            font-size: 200px !important;
            direction: ltr;
            cursor: pointer;
        }

        html {
            overflow-x: hidden;
        }
    </style>

</head>

<body style="background-color: #222930">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="membre.php"> <img alt="Brand" src="../images/logo_1.png" id="logo" class="logo" /> </a>
            </div>

            <form class="navbar-form navbar-left" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchbar" name="searchbar" placeholder="Chercher pseudo" autocomplete="off" />
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="searchBtn" id="searchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <div class="countryList" style="position: absolute;width: 235px;z-index: 1001;"></div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="tl3.php" style="color:magenta;"><span class="fas fa-list" style="color:magenta;"></span> Mes publications</a></li>
                <li><a href="tl2.php" style="color:magenta;"><span class="fas fa-list" style="color:magenta;"></span> Fil d'actualité géneral</a></li>
                <li><a href="tl.php" style="color:magenta;"><span class="fas fa-list" style="color:magenta;"></span> Fil d'actualité amis</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="friend_request_area">
                        <span id="unseen_friend_request_area"></span>
                        <i class="fa fa-user-plus fa-2" aria-hidden="true" style="color:cyan;">Demande d&apos;amis</i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" id="friend_request_list" style=" width: 300px; max-height: 350px;">

                    </ul>
                </li>

                <li><a href="profil.php?action=view" style="color:white;"><?php echo Get_user_avatar($_SESSION["user_id"], $connect); ?> <b>Profil</b></a></li>
                <li> <a href="logout.php" style="color:red;"><span class="fas fa-sign-out-alt"></span> Deconnexion</a></li>
            </ul>
        </div>
    </nav>