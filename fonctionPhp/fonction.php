<?php

$host = "mysql-amine95.alwaysdata.net"; /* Host name */
$user = "amine95"; /* User */
$password = "Marseille95"; /* Password */
$dbname = "amine95_netlife"; /* Database name */

$mysqli = new mysqli($host, $user, $password, $dbname);
if ($mysqli->connect_errno) {
  echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

function verifier_compte($mysqli, $pseudo, $motDePasse)
{
  $a = 0;
  $res = $mysqli->query("SELECT mot_de_passe FROM Utilisateur 
    WHERE pseudo='$pseudo';");
  if ($res == FALSE) {
    return 0;
  } else {
    while ($row = $res->fetch_array()) {
      if (password_verify($motDePasse, $row['mot_de_passe'])) {
        $a = 1;
      }
    }
    return $a;
  }
}

function id_compte($mysqli, $pseudo, $motDePasse)
{
  $res = $mysqli->query("SELECT id_user,mot_de_passe FROM Utilisateur 
    WHERE pseudo='$pseudo';");

  $id = null;

  while ($row = $res->fetch_array()) {
    if (password_verify($motDePasse, $row['mot_de_passe'])) {
      $id = $row['id_user'];
    }
  }

  return $id;
}

function inscrire_utilisateur($mysqli, $pseudo, $password, $email, $sexe, $bio = "")
{
  // On ajoute une entrée dans la table Utilisateur
  $mysqli->query("INSERT INTO Utilisateur(pseudo,mot_de_passe,email, sexe, bio) VALUES('$pseudo','$password','$email','$sexe','$bio');");
  echo "INSERT INTO Utilisateur(pseudo,mot_de_passe,email, sexe, bio) VALUES('$pseudo','$password','$email','$sexe','$bio');";

  echo 'Le compte a bien été créé !';
}

function connecte(): bool
{
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  return !empty($_SESSION['id']);
}



//!
// NOUVEAU FAIT PAR AYOUB
//!

function wrap_tag($argument)
{
  return '<b>' . $argument . '</b>';
}

function Get_user_avatar($user_id, $connect)
{
  $query = "
	SELECT user_avatar FROM Utilisateur
    WHERE id_user
     = '" . $user_id . "'
	";

  $statement = $connect->prepare($query);

  $statement->execute();

  $result = $statement->fetchAll();

  foreach ($result as $row) {
    return '<img src="' . $row['user_avatar'] . '" alt="pp" width="25" class="img-circle" />';
  }
}

function Get_user_avatar_big($user_id, $connect)
{
  $query = "
    SELECT user_avatar FROM Utilisateur
    WHERE id_user = '" . $user_id . "'
    ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    return '<img src="' . $row['user_avatar'] . '" alt="pp" class="img-responsive img-circle" />';
  }
}

function Get_grid_image($posts_id, $connect)
{
  $query = "
  SELECT media_path FROM `media_table` 
  WHERE post_id = '" . $posts_id . "'
    ";

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();


  $resultat= " ";

  foreach ($result as $row) {
    $resultat.= '<img src="' . $row['media_path'] . ' " alt="pp" style="max-width:300px;width:100%"/> ';
  }
  return $resultat;

}

function Get_request_status($connect, $from_user_id, $to_user_id)
{
  $output = '';

  $query = "
    SELECT request_status 
    FROM friend_request 
    WHERE (request_from_id = '" . $from_user_id . "' AND request_to_id = '" . $to_user_id . "') 
    OR (request_from_id = '" . $to_user_id . "' AND request_to_id = '" . $from_user_id . "') 
    AND request_status != 'Confirm'
    ";

  $result = $connect->query($query);

  foreach ($result as $row) {
    $output = $row["request_status"];
  }

  return $output;
}

function Get_user_name($connect, $user_id)
{
  $query = "
    SELECT pseudo 
    FROM Utilisateur 
    WHERE id_user = '" . $user_id . "' 
    ";
  $result = $connect->query($query);
  foreach ($result as $row) {
    return $row['pseudo'];
  }
}

function Get_like_post($connect, $posts_id)
{
  $query = "
    SELECT nb_like
    FROM aimer
    WHERE posts_id = '" . $posts_id . "' 
    ";
  $result = $connect->query($query);
  $output="0";
  foreach ($result as $row) {
    $output= $output+1;
  }
  return $output;
}

function Get_user_profile_data($user_id, $connect)
{
  $query = "
    SELECT * FROM Utilisateur 
    WHERE id_user = '" . $user_id . "'
    ";
  return $connect->query($query);
}

function clean_text($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}

function get_date()
{
  return date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
}

function file_get_contents_curl($url)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

  $data = curl_exec($ch);
  curl_close($ch);

  return $data;
}

function load_country_list()
{
  $output = '';
  $countries = array(" Afghanistan ", " Afrique du Sud ", " Albanie ", " Algérie ", " Allemagne ", " Andorre ", " Angola ", " Anguilla ", " Antarctique ", " Antigua-et-Barbuda ", " Antilles néerlandaises ", " Arabie saoudite ", " Argentine ", " Arménie ", " Aruba ", " Australie ", " Autriche ", " Azerbaïdjan ", " Bahamas ", " Bahreïn ", " Bangladesh ", " Barbade ", " Bélarus ", " Belgique ", " Belize ", " Bénin ", " Bermudes ", " Bhoutan ", " Bolivie ", " Bosnie-Herzégovine ", " Botswana ", " Brésil ", " Brunéi Darussalam ", " Bulgarie ", " Burkina Faso ", " Burundi ", " Cambodge ", " Cameroun ", " Canada ", " Cap-Vert ", " Chili ", " Chine ", " Chypre ", " Colombie ", " Comores ", " Congo ", " Corée du nord ", " Corée du sud ", " Costa Rica ", " Côte d’Ivoire ", " Croatie ", " Cuba ", " Danemark ", " Djibouti ", " Dominique ", " Egypte ", " El Salvador ", " Emirats arabes unis ", " Equateur ", " Erythrée ", " Espagne ", " Estonie ", " Etats-Unis d’Amérique ", " Ethiopie ", " Fédération de Russie ", " Fidji ", " Finlande ", " France ", " Gabon ", " Gambie ", " Géorgie ", " Ghana ", " Gibraltar ", " Grèce ", " Groenland ", " Guadeloupe ", " Guam ", " Guatemala ", " Guinée ", " Guinée équatoriale ", " Guinée-Bissau ", " Guyana ", " Guyane française ", " Haïti ", " Honduras ", " Hong Kong ", " Hongrie ", " Ile De Bouvet ", " Ile Norfolk ", " Iles Caïmanes ", " Iles Cook<" , " Iles d’Aland ", " Iles Falkland ", " Iles Féroé ", " Iles Mariannes septentrionales ", " Iles Marshall ", " Iles Salomon ", " Iles Svalbard et Jan Mayen ", " Iles Turques et Caïques ", " Iles Vierges américaines ", " Iles Vierges britanniques ", " Iles Wallis et Futuna ", " Inde ", " Indonésie ", " Iran ", " Iraq ", " Irlande ", " Islande ", " Israel ", " Italie ", " Jamaïque ", " Japon ", " Jordanie ", " Kazakhstan ", " Kenya ", " Kirghizistan ", " Kiribati ", " Koweït ", " Laos ", " Lesotho ", " Lettonie ", " Liban ", " Libéria ", " Libye ", " Liechtenstein ", " Lituanie ", " Luxembourg ", " Macao ", " Madagascar ", " Malaisie ", " Malawi ", " Maldives ", " Mali ", " Malte ", " Maroc ", " Martinique ", " Maurice ", " Mauritanie ", " Mayotte ", " Mexique ", " Micronésie ", " Moldovie ", " Monaco ", " Mongolie ", " Montserrat ", " Mozambique ", " Myanmar ", " Namibie ", " Nauru ", " Népal ", " Nicaragua ", " Niger ", " Nigéria ", " Nioué ", " Norvège ", " Nouvelle-Calédonie ", " Nouvelle-Zélande ", " Oman ", " Ouganda ", " Ouzbékistan ", " Pakistan ", " Palaos ", " Panama ", " Papouasie-Nouvelle-Guinée ", " Paraguay ", " Pays-Bas ", " Pérou ", " Philippines ", " Pitcairn ", " Pologne ", " Polynésie française ", " Porto Rico ", " Portugal ", " Qatar ", " République centrafricaine ", " République démocratique du Congo ", " République dominicaine ", " République tchèque ", " Réunion ", " Roumanie ", " Royaume-Uni ", " Rwanda ", " Saint-Kitts-et-Nevis ", " Saint-Marin ", " Saint-Pierre-et-Miquelon ", " Saint-Siège ", " Saint-Vincent-et-les Grenadines ", " Sainte-Hélène ", " Sainte-Lucie ", " Samoa ", " Samoas américaines ", " Sao Tomé-et-Principe ", " Sénégal ", " Serbie-et-Monténégro ", " Seychelles ", " Sierra Leone ", " Singapour ", " Slovaquie ", " Slovénie ", " Somalie ", " Soudan ", " Sri Lanka ", " Suède ", " Suisse ", " Suriname ", " Swaziland ", " Syrie ", " Tadjikistan ", " Taiwan ", " Tanzanie ", " Tchad ", " Territoire palestinien occupé ", " Thaïlande ", " Timor-Leste ", " Togo ", " Tokélaou ", " Tonga ", " Trinité-et-Tobago ", " Tunisie ", " Turkménistan ", " Turquie ", " Tuvalu ", " Ukraine ", " Uruguay ", " Vanuatu ", " Venezuela ", " Viet Nam ", " Yémen ", " Zambie ", " Zimbabwe ");
  foreach ($countries as $country) {
    $output .= '<option value="' . $country . '">' . $country . '</option>';
  }
  return $output;
}

function Get_user_profile_data_html($user_id, $connect)
{
  $result = Get_user_profile_data($user_id, $connect);

  $output = '
    <div class="table-responsive">
        <table class="table">
    ';

  foreach ($result as $row) {
    if ($row['user_avatar'] != '') {
      $output .= '
            <tr>
                <td colspan="2" align="center" style="padding:16px 0">
                    <img src="' . $row["user_avatar"] . '"  alt="pp" width="175" class="img-thumbnail img-circle" />
                </td>
            </tr>
            ';
    }

    $output .= '
        <tr>
            <th>Pseudo</th>
            <td>' . $row["pseudo"] . '</td>
        </tr>
        <tr>
            <th>Bio</th>
            <td>' . $row["bio"] . '</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>' . $row["email"] . '</td>
        </tr>
        <tr>
            <th>date de naissance</th>
            <td>' . $row["user_birthdate"] . '</td>
        </tr>
        <tr>
            <th>Genre</th>
            <td>' . $row["sexe"] . '</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>' . $row["user_city"] . '</td>
        </tr>
        <tr>
            <th>Pays</th>
            <td>' . $row["user_country"] . '</td>
        </tr>
        ';
    return $output;
  }
}

function Get_user_profile_data_html2($user_id, $connect)
{
  $result = Get_user_profile_data($user_id, $connect);

  $output = '
    <div class="table-responsive">
        <table class="table">
    ';

  foreach ($result as $row) {
    if ($row['user_avatar'] != '') {
      $output .= '
            <tr>
                <td colspan="2" align="center" style="padding:16px 0">
                    <img src="' . $row["user_avatar"] . '" alt="pp" width="175" class="img-thumbnail img-circle" />
                </td>
            </tr>
            ';
    }

    $output .= '
        <tr>
            <th>Pseudo</th>
            <td>' . $row["pseudo"] . '</td>
        </tr>
        <tr>
            <th>Bio</th>
            <td>' . $row["bio"] . '</td>
        </tr>
        <tr>
            <th>Date de naissance</th>
            <td>' . $row["user_birthdate"] . '</td>
        </tr>
        <tr>
            <th>Genre</th>
            <td>' . $row["sexe"] . '</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>' . $row["user_city"] . '</td>
        </tr>
        <tr>
            <th>Pays</th>
            <td>' . $row["user_country"] . '</td>
        </tr>
        ';
    return $output;
  }
}

