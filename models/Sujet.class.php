<?php
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

	}

?>