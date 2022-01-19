<?php

$host = "mysql-amine95.alwaysdata.net"; /* Host name */
$user = "amine95"; /* User */
$password = "Marseille95"; /* Password */
$dbname = "amine95_netlife"; /* Database name */

$mysqli = new mysqli($host, $user, $password,$dbname);
if ($mysqli->connect_errno) {
	//echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

function verifier_compte($mysqli,$pseudo,$motDePasse)
{
    $res = $mysqli->query("SELECT pseudo,mot_de_passe FROM Utilisateur 
    WHERE pseudo='$pseudo' AND mot_de_passe='$motDePasse';");

    if($res==FALSE)
    {
        return 0;
    }else{
        return(mysqli_num_rows($res) == 1);
    }
}

function id_compte($mysqli,$pseudo,$motDePasse)
{
    $res = $mysqli->query("SELECT id_user FROM Utilisateur 
    WHERE pseudo='$pseudo' AND mot_de_passe='$motDePasse';");

    $row = $res->fetch_assoc();
    $id=$row['id_user'];

    return $id;
}
//---------------------------------------------------------------------//


//echo json_encode($_POST);
$success = 0;
$msg = "Une erreur est survenue (script.php)";
$data = [];

	if (!empty($_POST['pseudo']) AND !empty($_POST['motDePasse'])) {
			$pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
			$mdp =$_POST['motDePasse'];
            // Ajout de l'utilisateur en base de données à cet endroit (exemple)
            if(verifier_compte($mysqli,$pseudo,$mdp)!=0)
            {
                //$id=id_compte($mysqli,$pseudo,$motDePasse);
                //$_SESSION['id']=$id;
                $success = 1;
			    $msg = "";
                //$data['motDePasse'] = $mdp;	
                //$data['id']=$id;
            }else{
                $msg = "Pseudo ou mot de passe incorrect";
            }
		    
	}
	else {
		$msg = "Veuillez renseigner tous les champs";
	}

$res = ["success" => $success, "msg" => $msg, "data" => $data];
echo json_encode($res);