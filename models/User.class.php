<?php
	class User
	{
		private $id;
		private $login;
		private $pass;
		private $avatar;
		private $date;
		private $admin;
		private $db;

		public function __construct($login, $db)
		{
			$this->login = $login;
			$this->db = $db;
		}

		public function setDb($db)
		{
			$this->db = $db;
		}

		public function getDb()
		{
			return $this->db;
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


		public function getUser($db, $id)
		{
			$req = "SELECT * FROM users WHERE id='".$id."'";
			$res = mysql_query($db, $req);
			$user = mysqli_fetch_assoc($res);
			return $user; 
		}	

		public function setUser($data)
		{
			$this->id = $data['id'];
			$this->pass = $data['pass'];
			$this->avatar = $data['avatar'];
			$this->date = $data['date'];
			$this->admin = $data['admin'];
		}

		public function verifLogin($login)
		{
			$req = "SELECT * FROM users WHERE login='".$login."'";
			
			$db = $this->getDb();
			$res = mysqli_query($db, $req);
			if (mysqli_num_rows($res) != 0)
			{
				$user = mysqli_fetch_assoc($res);
				$this->setUser($user);
				return true;
			}
			else
				return false;
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
			$_SESSION['pass'] = $this->getPass();
		}

		public function createUser($login,$pass)
		{
			$req="INSERT INTO users (login,pass,avatar,admin) VALUES ('".$login."','".$pass."','4-manDefault.png','0')";

			mysqli_query($this->db, $req);
		}		


	}

?>