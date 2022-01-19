<?php

$host = "mysql-amine95.alwaysdata.net"; /* Host name */
$user = "amine95"; /* User */
$password = "Marseille95"; /* Password */
$dbname = "amine95_netlife"; /* Database name */

$mysqli = new mysqli($host, $user, $password, $dbname);
if ($mysqli->connect_errno) {
	//echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

function inscrire_utilisateur($mysqli, $pseudo, $password, $email, $sexe, $bio = "")
{
	// On ajoute une entrée dans la table Utilisateur
	$mysqli->query("INSERT INTO Utilisateur(pseudo,mot_de_passe,email, sexe, bio) VALUES('$pseudo','$password','$email','$sexe','$bio');");
	//echo "INSERT INTO Utilisateur(pseudo,mot_de_passe,email, sexe, bio) VALUES('$pseudo','$password','$email','$sexe','$bio');";

	//echo 'Le compte a bien été créé !';
}
function existe_deja($mysqli, $pseudo, $mail)
{
	$result = $mysqli->query("SELECT id_user FROM Utilisateur WHERE pseudo='$pseudo' OR email='$mail';");
	return $result->num_rows;
}
function connecte(): bool
{
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	return !empty($_SESSION['id']);
}
//---------------------------------------------------------------------//


//echo json_encode($_POST);
$success = 0;
$msg = "Une erreur est survenue (mot de passe non correspondant?)";
$data = [];

if (!empty($_POST['pseudo']) and !empty($_POST['motDePasse']) and !empty($_POST['ReMDP']) and !empty($_POST['email'])) {
	$pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$mdp = $_POST['motDePasse'];
	$sexe = $_POST['sexe'];

	if ($mdp == $_POST['ReMDP']) {
		$mdp = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);

		if (strlen($pseudo) < 30 && strlen($pseudo) > 2) {

			if (existe_deja($mysqli, $pseudo, $mail) == 0) {



				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

					// Ajout de l'utilisateur en base de données à cet endroit (exemple)
					inscrire_utilisateur($mysqli, $pseudo, $mdp, $email, $_POST['sexe'], $_POST['bio']);
					$success = 1;
					$msg = "";
					$data['motDePasse'] = $mdp;
				} else {
					$msg = "Adresse email invalide";
				}
			}
			else{
				$msg = "Votre pseudo ou mail est deja utilisé";
			}
		} else {
			$msg = "Votre pseudo doit avoir entre 2 et 30 caractères";
		}
	}
} else {
	$msg = "Veuillez renseigner tous les champs";
}

$res = ["success" => $success, "msg" => $msg, "data" => $data];
echo json_encode($res);
