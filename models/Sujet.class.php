<?php
	require 'models/Message.class.php';
	class Sujet
	{
		private $id;
		private $titre;
		private $contenu;
		private $date;
		private $id_theme;
		private $id_user;	

		public function __construct($data)
		{
			$this->id = $data['id'];
			$this->titre = $data['titre'];
			$this->contenu = $data['contenu'];
			$this->date = $data['date'];
			$this->id_theme = $data['id_theme'];
			$this->id_user = $data['id_user'];						
		}
		
		public function getId()
		{
			return $this->id;
		}

		public function setTitre($titre)
		{
			$this->titre = $titre;
		}

		public function getTitre()
		{
			return $this->titre;
		}			

		public function setContenu($contenu)
		{
			$this->contenu = $contenu;
		}	

		public function getContenu()
		{
			return $this->contenu;
		}	

		public function getDate()
		{
			return $this->date;
		}					

		public function getId_theme()
		{
			return $this->id_theme;
		}	

		public function getId_user()
		{
			return $this->id_user;
		}

		public function createMessage($data)
		{
			$message = new Message($data);
			return $message;
		}	

		public function getListMessage($db)
		{
			$list = array();
			$req = "SELECT * FROM messages WHERE id_sujet='".$this->getId()."'";

			$res = mysqli_query($db, $req);

			while ($donnees = mysqli_fetch_assoc($res))
			{
				$obj = $this->createMessage($donnees);
				$list[] = $obj;
			}
			return $list;
		}		

		public function getUserName($db,$id)
		{
			$req = "SELECT * FROM messages, users WHERE messages.id='".$id."' AND messages.id_user=users.id";

			$res = mysqli_query($db, $req);
			$donnees = mysqli_fetch_assoc($res);
			$username=$donnees['login'];
			return $username;
		}

		public function getMessageDate($db,$id)
		{
			$req = "SELECT * FROM messages WHERE id='".$id."'";
			$res = mysqli_query($db, $req);
			$donnees = mysqli_fetch_assoc($res);
			$date=$donnees['date'];
			return $date;
		}

		public function insertMessage($db, $contenu)
		{
			$contenu =  mysqli_real_escape_string($db, $contenu);
			$req = "INSERT INTO messages (contenu, id_sujet,id_user) VALUES ('".$contenu."', '".$this->getId()."','".$_SESSION['id']."')";
			mysqli_query($db, $req);
		}

	}

?>