<?php
	class User
	{
		private $id;
		private $login;
		private $pass;
		private $date;
		private $admin;

		public function __construct($data)
		{
			$this->id = $data['id'];
			$this->login = $data['login'];
			$this->pass = $data['pass'];
			$this->date = $data['date'];
			$this->admin = $data['admin'];
		}
		
		public function getId()
		{
			return $this->id;
		}

		public function setLogin($login)
		{
			$this->login = $login;
		}

		public function getLogin()
		{
			return $this->login;
		}

		public function setPass($pass)
		{
			$this->pass = $pass;
		}

		public function getPass()
		{
			return $this->pass;
		}

		public function setDate($date)
		{
			$this->date = $date;
		}

		public function getDate()
		{
			return $this->date;
		}	

		public function setAdmin($admin)
		{
			$this->admin = $admin;
		}

		public function getAdmin()
		{
			return $this->admin;
		}	

		public function getUser($db, $id)
		{
			$requete = "SELECT * FROM users WHERE id='".$id."'";
			$res = mysql_query($db, $requete);
			$user = mysqli_fetch_assoc($res);
			return $user; 
		}							

	}

?>