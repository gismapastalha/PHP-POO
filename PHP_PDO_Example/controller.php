<?php
	require_once("db.php");
	require_once("models.php");

	class DBController extends DBhandler {
		private $dbhandler;

		public function __construct() {
			parent::__construct();
		}

		public function get_all_blogs() {
			$blogs = array();
			$query = "SELECT B.b_id, B.title, B.body, U.uname
								FROM blogs B, users U
								WHERE B.b_id=U.u_id";
			foreach ($this->dbh->query($query) as $row) {
				$blog = new Blog($row['b_id'], $row['title'], 
									       $row['body'], $row['uname']);			
				array_push($blogs, $blog);
			}
			return $blogs;
		}

		public function get_blogs_by_author($author) {
			if(gettype($author) == "string") {
				$query = "SELECT B.b_id, B.title, B.body, U.uname
									FROM blogs B, users U
									WHERE B.b_id=U.u_id AND U.uname=:uname";
				$stmt = $this->dbh->prepare($query);
				$stmt->bindParam(':uname', $author, PDO::PARAM_STR);
			}
			else if(gettype($author) == "integer") {
				$query = "SELECT B.b_id, B.title, B.body, U.uname
									FROM blogs B, users U
									WHERE B.b_id=U.u_id AND U.u_id=:u_id";
				$stmt = $this->dbh->prepare($query);
				$stmt->bindParam('u_id', $author, PDO::PARAM_INT);
			}
			else {die("Invalid Author variable type");}
			try {
				$stmt->execute();
				$results = $stmt->fetchAll();
				$blogs = array();
				foreach($results as $row) {
					$blog = new Blog($row['b_id'], $row['title'], $row['body'], $row['uname']);
					array_push($blogs, $blog);
				}
				return $blogs;
			}
			catch (PDOException $err) {
				die("DB error");
			}
		}

		//Helper function will get a username when given an id
		public function get_username($user_id) {
			$query = "SELECT uname FROM users
								WHERE u_id=:user_id";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchColumn();
		}

		public function get_userid($username) {
			$query = "SELECT u_id FROM users
								WHERE uname=:username";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(':username', $username, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchColumn();
		}

		public function create_blog($blog_object) {
			if(gettype($blog_object->author) == "string") {
				$userid = $this->get_userid($blog_object->author);
				if($userid == NULL || $userid == 0) {
					die("User ID does not exist -- in create_blog function param");
				}
				$blog_object->author = $userid;
			}
			$query = "INSERT INTO blogs 
								VALUES(NULL, :title, :body, :author)";
			$stmt = $this->dbh->prepare($query);
			//I Used bindValue because it does not pass by reference -- it is needed
			// for passing a blog_objects private variable
			$stmt->bindValue(':title', $blog_object->title, PDO::PARAM_STR);
			$stmt->bindValue(':body', $blog_object->body, PDO::PARAM_STR);
			$stmt->bindValue(':author', $blog_object->author, PDO::PARAM_INT);
			//This will return true if insert was successful, false otherwise...
			return $stmt->execute();
		}

		public function create_user($user_object) {
			$query = "INSERT INTO users
								VALUES (NULL, :uname, :passwd)";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindValue(':uname', $user_object->uname);
			$stmt->bindValue(':passwd', $user_object->passwd);
			return $stmt->execute();
		}

		public function get_user_with_passwd($uname, $passwd) {
			$query = "SELECT * FROM users
			          WHERE uname=:uname";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(":uname", $uname, PDO::PARAM_STR);
			$stmt->execute();
			if($stmt->rowCount() < 0) {
				//username does not exist
				return NULL;
			}
			$row = $stmt->fetch();
			if(password_verify($passwd, $row['pword'])) {
				return new User($row['u_id'], $row['uname'], $row['pword'], TRUE);
			}
			else {
				//password is invalid
				return NULL;
			}

		}
	}	

	$test = new DBController();
	print_r($test->get_user_with_passwd('Awesome Pants', '123456'));
?>
