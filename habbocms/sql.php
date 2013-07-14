<?php
	defined('IN_INDEX') or die();
	class HabboMySQL {
		public $connection;
		public $database;

		function __call($fname, $args) {
			if(!$this->connection) {
				//echo "Connected to mysql at $fname";
			 	$this->connect();
			}

			return call_user_func_array(array($this, $fname), $args);
		}

		private function connect() {
			if($this->connection) error('Allready connected.', 'E_WARNING');
			$config = @file_get_contents(P . 'storage/config/sql.json');
			if(!$config) {
				die("There was a problem getting the SQL config file. Make sure it exists and is readable.");
			}

			$config = readJSON($config);
			if(!isset(
				$config->sql->host,
				$config->sql->port,
				$config->sql->username,
				$config->sql->password,
				$config->sql->database
			)) error("Missing variable(s) in the SQL config file.", "E_FATAL");

			$this->database = $config->sql->database;
			$this->connection = @mysql_connect($config->sql->host . ":" . $config->sql->port, $config->sql->username, $config->sql->password);
			if(!$this->connection) error("There was a problem connecting to the mysql server. <!-- Developer information: " . mysql_error() . " -->", "E_MYSQL/E_FATAL");
			if(!@mysql_select_db($config->sql->database, $this->connection)) error("There was a selecting database in the mysql server. <!-- Developer information: " . mysql_error() . " -->", "E_MYSQL/E_FATAL");
			unset($config);
			//error('Called.', 'E_FATAL');
			echo '<!-- connected to mysql -->';
		}

		private function query($query) {
			//echo $query;
			$result = mysql_query($query, $this->connection);
			if(!$result) error("There was a problem executing a MySQL query. <!-- Developer information: " . mysql_error() . ", Query: " . $query . " -->", "E_MYSQL/E_WARNING");
			return $result;
		}

		private function result($result, $convert = true) {
			if($convert) {
				$query = $result;
				$result = $this->query($result);
			}


			$result = mysql_result($result, 0);
			if(!$result && $result != 0 && $result != '') error("There was a problem getting a row result from the MySQL server. <!-- Developer information: " . mysql_error() . (($convert)?', Query: ' . $query:'') . " -->", "E_MYSQL/E_WARNING");
			return $result;
		}

		private function fetch($result, $convert = false) {
			if($convert) {
				$query = $result;
				$result = $this->query($result);
			}

			return mysql_fetch_assoc($result);
		}

		private function count($result, $convert = true) {
			if($convert) {
				$query = $result;
				$result = $this->query($result);
			}
			$result = mysql_num_rows($result);
			if(!$result && $result != 0) error("There was a problem counting the result from the MySQL server. <!-- Developer information: " . mysql_error() . (($convert)?', Query: ' . $query:'') . " -->", "E_MYSQL/E_WARNING");
			return $result;
		}
	}

	$sql = new HabboMySQL;