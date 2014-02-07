<?php
	class ThemeManager
	{

		private $db;

		public function __construct($db)
		{
			$this->db = $db
		}

		public function getDb()
		{
			return $this->db;
		}

		public function createTheme($data)
		{
			$theme = new Theme($data);
		}

		public function getTheme($id)
		{
			$req = "SELECT * FROM themes WHERE id='".$id."'";
			$res = mysqli_query($this->getDb(), $req);
			$this->createTheme(mysqli_fetch_assoc($res));
		}

		public function getListTheme()
		{
			$list = array();
			$req = "SELECT * FROM themes";
			$res = mysqli_query($this->getDb(), $req);
			while ($donnees = mysqli_fetch_assoc($res))
			{
				$list[] = $donnees;
			}

			return $list;
			
		}
		
	}

?>