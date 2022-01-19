<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo_2.png" />
    <title>Netlife: Inscription</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />

    <style>
        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }

        label.sexe {
            color: black;
            text-align: center;
        }

        .sexe {
            text-align: center;
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



        <form class="box" method='POST' id="inscription" action=>
            <h2>Inscription</h2>
            <p class="hint-text">Créez votre compte en très peu de temps</p>
            <div class="sexe">
                <label class='sexe' for='sexe'>Sexe</label>
                <select name="sexe">

                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select><br>
            </div>
            <div class="form-group">
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" class="form-control"><br>
            </div>
            <div class="form-group">
                <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" class="form-control"><br>
            </div>

            <div class="form-group">
                <input type="password" name="ReMDP" id="ReMDP" placeholder="Repetez le mot de passe" class="form-control"><br>
            </div>

            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control"><br>
            </div>
            <div class="form-group">
                <input type="bio" name="bio" id="bio" placeholder="Bio" class="form-control"><br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" id="submit">Inscrire </button>
            </div>

        </form>
        <div class="text-center">Vous avez déja un compte? <a href="../index.php">Connexion</a></div>

        <script src="../fichierJs/inscription.js"></script>

    </div>
</body>

</html>​