<?php
	class User
	{
		private $id;
		private $login;
		private $pass;
		private $avatar;
		private $date;
		private $admin;
		
		public function __construct($data)
		{
			$this->id = $data['id'];
			$this->login = $data['login'];
			$this->pass = $data['pass'];
			$this->avatar = $data['avatar'];
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

		public function setAvatar($avatar)
		{
			$this->avatar = $avatar;
		}

		public function getAvatar()
		{
			return $this->avatar;
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

		public function verifPass($pass)
		{

			if($this->getPass() == $pass)
				return true;
			else
				return false;
		}

		public function initSession()
		{
			$_SESSION['id'] = $this->getId();
			$_SESSION['login'] = $this->getLogin(); 
			$_SESSION['admin'] = $this->getAdmin();
		}




	}

?>