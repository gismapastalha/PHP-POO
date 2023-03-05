<?php
	class DBHandler {
		public $dbh;

		public function __construct() {
			try {
				$this->dbh = new PDO("sqlite:data.db");
			}
			catch (PDOException $err) {
				die("Unable to connect to DB");
			}
		}

		public function __destruct() {
			$this->dbh = NULL;
		}
	}
?>