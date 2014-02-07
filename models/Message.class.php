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
			$this->name = $data['name'];
			$this->date = $data['date'];
			$this->id_sujet = $data['id_sujet'];
			$this->id_user = $data['id_user'];						
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