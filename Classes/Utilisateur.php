<?php

class Utilisateur
{
	private $id_user;
	private $pseudo;
    private $mdp;
    private $nbAmi;
	private $email;
	private $sexe;
	private $bio;
	private $photo;
    private $banniere;
    private $erreur;
    
    public function __construct ($mysqli,int $id)
    {
        $result=$mysqli->query("SELECT*FROM Utilisateur WHERE id_user=$id") or die($mysqli->error);

        while ($row = $result->fetch_assoc()) {
			$donnees=mysqli_fetch_array($result);
			$this->id_user = $row['id_user'];
            $this->pseudo = $row['pseudo'];
            $this->mdp = $row['mot_de_passe'];
            $this->email = $row['email'];
            $this->sexe = $row['sexe'];
            $this->bio = $row['bio'];
           // printf ("%s (%s)\n", $row["pseudo"], $row["mot_de_passe"]);
        }
    }
	
	public function getId(){
		return $this->id_user;
	}
	public function setId($id1){
        $this->id_user=$id1;
	}

    public function getpseudo(){
		return $this->pseudo;
	}
	public function setpseudo($pseudo1){
        $this->pseudo=$pseudo1;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email1){
        $this->email=$email1;
	}
	
	public function getSexe(){
		return $this->sexe;
	}
	public function setSexe($sexe1){
        $this->sexe=$sexe1;
	}
	
	public function getBio(){
		return $this->bio;
	}
	public function setBio($bio1){
		$this->bio=$bio1;
    }
    
    /*public function getPhoto(){
		return $this->$photo;
	}
	public function setPhoto($photo1){
		$this->photo=$photo1;
    }
    */
    public function getBanniere(){
		return $this->banniere;
	}
	public function setBanniere($banniere1){
		$this->banniere=$banniere1;
	}
	
}


?>