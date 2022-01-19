<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>NetLife: Connexion</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo_2.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />

    <style>
        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
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

        label {
            color: #E9E9E9;
        }

        body {
            color: #fff;
            background: #222930;
            font-family: 'Roboto', sans-serif;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form h2:before,
        .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .signup-form h2:before {
            left: 0;
        }

        .signup-form h2:after {
            right: 0;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
</head>



<body>
    <div class="signup-form">
        <?php
        include 'fonctionPhp/fonction.php';
        if (isset($_POST['submit'])) {
            $pseudo = trim($_POST['pseudo']);
            $motDePasse = trim($_POST['motDePasse']);

            if (empty($_POST['pseudo'])) {
                $errors[] = "Veuillez saisir votre pseudo";
            }
            if (empty($_POST['motDePasse'])) {
                $errors[] = "Veuillez saisir votre mot de passe";
            }
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<p class='error'>" . $error . "</p>";
                }
            } else {
                if (verifier_compte($mysqli, $pseudo, $motDePasse) != 0) {
                    $id = id_compte($mysqli, $pseudo, $motDePasse);
                    $_SESSION['id'] = $id;
                    header("Location:Pages/membre.php");
                    exit;
                } else {
                    echo "<p class='error'>Veuillez reesayer!</p>";
                }
            }
        }
        ?>

        <form class="box" method='POST' action=>
            <h2>Connexion</h2>
            <div class="form-group">
                <input type="text" name="pseudo" placeholder="Pseudo" id="pseudo" placeholder="Pseudo" class="form-control">
            </div>

            <div class="form-group">
                <input type="password" name="motDePasse" placeholder="Password" id="motDePasse" placeholder="Mot de Passe" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" id="submit">Connexion </button>
            </div>
        </form>
        <div class="text-center">Vous n&apos;avez pas de compte ? <a href="Pages/inscription.php"> Inscription</a></div>
    </div>
</body>

</html>