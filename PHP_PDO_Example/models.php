<?php
	class Blog {
		private $id;
		private $title;
		private $body;
		private $author;

		public function __construct($id, $title, $blog, $author) {
			$this->id = $id;
			$this->title = $title;
			$this->body = $blog;
			$this->author = $author;
		}

		public function __get($property) {
			if(property_exists($this, $property)) {
				return $this->$property;
			}
		}

		public function __set($property, $value) {
			if(property_exists($this, $property)) {
				$this->$property = $value;
			}
			return $this;
		}
	}

	class User {
		private $id;
		private $uname;
		private $passwd;

		public function __construct($id, $uname, $passwd, $is_hash) {
			$this->id = $id;
			$this->uname = $uname;
			if($is_hash == TRUE) {
				$this->passwd = $passwd;
			}
			else {
				//set bcrypt hash with salt
				$this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
			}
		}

		public function __get($property) {
			if(property_exists($this, $property)) {
				return $this->$property;
			}
		}

		public function __set($property, $value) {
			if(property_exists($this, $property) && $property != "passwd") {
				$this->$property = $value;
			}
			return $this;
		}
		public function set_password($passwd, $is_hash) {
			if($is_hash == TRUE) {$this->passwd = $passwd;}
			else {
				$this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
			}
		}
	}
?>