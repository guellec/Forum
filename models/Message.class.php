<?php
	class Message
	{
		private $id;
		private $contenu;
		private $date;
		private $id_sujet;
		private $id_user;		

		public function __construct($data)
		{
			$this->id = $data['id'];
			$this->contenu = $data['contenu'];
			$this->date = $data['date'];
			$this->id_sujet = $data['id_sujet'];
			$this->id_user = $data['id_user'];						
		}
		
		public function getId()
		{
			return $this->id;
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

		public function getId_sujet()
		{
			return $this->id_sujet;
		}	

		public function getId_user()
		{
			return $this->id_user;
		}												

	}

?>