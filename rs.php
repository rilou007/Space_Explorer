<?php
class Connexion
		{
			private $db;
			public function __construct()
			{
 				$this->db = "";	
			}
			public function connect()
			{
				$hostname_conn = "localhost";
				$database_conn = "logipamo_picstoria";
				$username_conn = "logipamo_esih";
				$password_conn = "esih007";
			try {
    			//$this->db = new PDO('pgsql:host='.$hostname_conn.';dbname='.$database_conn, $username_conn, $password_conn);
				$this->db = new PDO('mysql:host='.$hostname_conn.';dbname='.$database_conn, $username_conn, $password_conn);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//$this->db->exec("UTF8");
				return $this->db;	
    			}
			catch(PDOException $e)
				{
				echo $e->getMessage();
				}

			}
		}
class Rs
		{
		private $db;
		private $rs = array();
		public function __construct()
			{
 			$conn = new Connexion();
			$this->rs = "";
			$this->db = $conn->connect();
			}
		public function __destruct() {
			$this->db = null;
   			}
		public function Select($sql) 
			{
				$select = $this->db->prepare($sql);
				$select->setFetchMode(PDO::FETCH_ASSOC);
				$select->execute();
				$this->rs = $select->fetchAll();
				return $this->rs;
			}
		public function SelectParams($sql,$elements)	
			{
				$select = $this->db->prepare($sql);
				$select->setFetchMode(PDO::FETCH_ASSOC);
				$select->execute(array_values($elements));
				$this->rs = $select->fetchAll();
				return $this->rs;
			}
		public function Insert($sql,$elements)
			{
				$insert = $this->db->prepare($sql);
				$count = $insert->execute(array_values($elements));
				return $count;//$this->db->lastInsertId();				
			}
		public function Update($sql,$elements)
			{
				$update = $this->db->prepare($sql);
				$count = $update->execute(array_values($elements));
				return $count;
			}
			
			/*public function myupdate($value,$code)
			{
				$sql="UPDATE infos_etudiants SET valider='$value' where code_etudiant ='$code'";
				
				$update = $this->db->prepare($sql);
				$count = $update->execute();
				return $count;
			}*/
		public function Delete($sql,$elements)
			{
				$delete= $this->db->prepare($sql);
				$count = $delete->execute(array_values($elements));
				return $count;
			}
		public function DebutTransaction()
			{
				$this->db->beginTransaction();
			}
		public function FinTransaction()
			{
				$this->db->commit();
			}
	    public function AnnulerTransaction()
			{
				$this->db->rollback();
			}
			
		public function SelectCountPages($sql)
			{
				$selectcount = $this->db->prepare($sql);
				$selectcount->setFetchMode(PDO::FETCH_ASSOC);
				$selectcount->execute();
				$this->rs = $selectcount->fetchAll();
				return  $this->rs;
			}
		public function SelectCountPages_($val)
			{
			$a = ($val-1)*30;
			$b = (($val-1)*30)+30;
			$sql = 'SELECT f.feat, f.lat, f.lon, f.geon, f.url ';
			$sql .=	'FROM files f ';
			$sql .=	'LEFT JOIN metadata m ON (m.id = f.id) ';
			$sql .=	'LEFT JOIN tags t ON (t.id = f.id) ';
			$sql .=	'LEFT JOIN year_mission ym ON (ym.mission = f.mission) ';
			$sql .=	'WHERE f.mission LIKE %AS% OR ym.year_mission LIKE %AS% OR f.url LIKE %http:% OR t.tags_name LIKE %esih% LIMITE ' .$a .',' .$b;
			$selectcount = $this->db->prepare($sql);
			$selectcount->setFetchMode(PDO::FETCH_ASSOC);
			$selectcount->execute();
			$this->rs = $selectcount->fetchAll();
			return  $this->rs;
			}
			
		}
		
?>