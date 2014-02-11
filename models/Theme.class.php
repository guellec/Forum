<?php
require 'models/Sujet.class.php';
	class Theme
	{
		private $id;
		private $name;

		public function __construct($data)
		{

			$this->id = $data['id'];
			$this->name = $data['nom'];
		}
		
		public function getId()
		{
			return $this->id;
		}

		public function setName($name)
		{
			$this->name = $name;
		}

		public function getName()
		{
			return $this->name;
		}	

		public function createSujet($data)
		{
			$sujet = new Sujet($data);
			return $sujet;
		}

		public function getSujet($db,$id)
		{
			$req = "SELECT * FROM sujets WHERE id='".$id."'";
			$res = mysqli_query($db, $req);
			$obj = $this->createSujet(mysqli_fetch_assoc($res));	

			return $obj;		
		}		

		public function getListSujet($db)
		{
			$list = array();
			$req = "SELECT * FROM sujets WHERE id_theme='".$this->getId()."'";

			$res = mysqli_query($db, $req);

			while ($donnees = mysqli_fetch_assoc($res))
			{
				$obj = $this->createSujet($donnees);
				$list[] = $obj;
			}
			return $list;
		}

		public function insertSujet($db, $titre, $contenu)
		{
			$titre = mysqli_real_escape_string($db, $titre);
			$contenu =  mysqli_real_escape_string($db, $contenu);
			$req = "INSERT INTO sujets (titre, contenu, id_theme,id_user) VALUES ('".$titre."','".$contenu."', '".$this->getId()."','".$_SESSION['id']."')";
			mysqli_query($db, $req);
		}				

		public function getAuthorName($db,$id)
		{
			$req = "SELECT * FROM sujets, users WHERE sujets.id='".$id."' AND sujets.id_user=users.id";
			$res = mysqli_query($db, $req);
			$donnees = mysqli_fetch_assoc($res);
			$authorname=$donnees['login'];
			return $authorname;
		}

		public function getSubjectDate($db,$id)
		{
			$req = "SELECT * FROM sujets WHERE id='".$id."'";
			$res = mysqli_query($db, $req);
			$donnees = mysqli_fetch_assoc($res);
			$date=$donnees['date'];
			return $date;
		}		

	}

?>