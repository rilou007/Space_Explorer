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
			
			public function myupdate($value,$code)
			{
				$sql="UPDATE infos_etudiants SET valider='$value' where code_etudiant ='$code'";
				
				$update = $this->db->prepare($sql);
				$count = $update->execute();
				return $count;
			}
		public function Delete($sql,$elements)
			{
				$delete= $this->db->prepare($sql);
				$count = $delete->execute(array_values($elements));
				return $count;
			}
		public function CreateDB($dbname)
			{
				$sql="CREATE DATABASE ".$dbname[0];
				$createdb= $this->db->prepare($sql);
				$count = $createdb->execute(array_values($dbname));
				return $count;
			}
		public function AdministrateDB($elements)
			{
				$sql="CREATE USER ".$elements[0]."@localhost IDENTIFIED by '".$elements[1]."'";
				$create= $this->db->prepare($sql);
				$count = $create->execute(array_values($elements));
				return $count;
			}
		public function FormatDB($elements)
			{
				$sql= "mysqldump -u root -pnitsugua array | mysql -u root -pnitsugua zaboka";
				//$sql= "mysqldump -h localhost -u root -pnitsugua array | mysql -h localhost -u root -pnitsugua ".$elements[0];
//				$sql= "mysqldump -h [".$hostname_conn."] -u [".$username_conn."] -p[".$password_conn."] ".$elements[0]." | mysql -h [".$hostname_conn."] -u [".$username_con."] -p[".$password_conn."] array";

//				$sql="source ".$elements[1];
				$create= $this->db->prepare($sql);
				$count = $create->execute(array_values($elements));
				return $count;
			}
		public function GrantAdm($elements)
			{
				$sql="GRANT ALL ON ".$elements[0].".* TO ". $elements[1]."@localhost";
				$grant= $this->db->prepare($sql);
				$count = $grant->execute(array_values($elements));
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
		}
		
?>