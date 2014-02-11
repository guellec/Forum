<?php
	require_once 'models/User.class.php';
	class UserManager
	{

		private $db;
		private $test = "1"; 

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function getDb()
		{
			return $this->db;
		}

		public function createUser($data)
		{
			$user = new User($data);
			return $user;
		}

		public function getUser($login)
		{
			if ($this->test != "1")
			{
				$login = mysqli_real_escape_string($this->getDb(), $login);
			
			}

			$req = "SELECT * FROM users WHERE login='".$login."'";
			echo $req;
			$res = mysqli_query($this->getDb(), $req);

			$obj = $this->createUser(mysqli_fetch_assoc($res));
			return $obj;

		}
		
		public function insertUser($login, $pass)
		{
			$login = mysqli_real_escape_string($this->getDb(), $login);
			$this->test = "0";

			$pass = mysqli_real_escape_string($this->getDb(), $pass);
			$req="INSERT INTO users (login,pass,avatar,admin) VALUES ('".$login."','".$pass."','4-manDefault.png','0')";
			mysqli_query($this->getDb(), $req);

			$user = $this->getUser($login);
			$user->initSession();

		}



	}



?>