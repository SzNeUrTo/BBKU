<?php
class Content 
{
    private $db_connection = null;
		private $username;
		private $studentID;
		private $content;

    public function __construct()
    {
        session_start();
				//$this->userLoggedIn();
				$this->createConnection();
				$this->doAction();
				//$this->showContent();
    }

		private function createConnection()
		{
				try {
						$host = DB_HOST;
						$user = DB_USER;
						$pass = DB_PASS;
						$dbname = DB_NAME;
						$port = DB_PORT;
						$this->db_connection = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $user, $pass);
				} catch (PDOException $error) {
						die("error : ".$error->getMessage());
				}
		}

		private function doAction()
		{
        if (isset($_GET["action"])) {
						$action = $_GET["action"];
						if ($action == "home") {
								$this->setContentHome();
						}
						else if ($action == "br") {
								///`$this->setHome();
						}
						else if ($action == "history") {
								$this->setContentHistory($_GET["search"]);
						}
						else if ($action == "alert") {
								$this->setContentAlert();
						}
						else if ($action == "logout") {
								header("refresh: 0; url=logout.php?action=logout");
						}
				}
		}

		private function setContentHome() {
		}

		private function setContentHistory($search) {
		}

		private function setContentAlert() {
				echo "alert!!!";
				$studentID = '0002';
				$sql = "SELECT * FROM BlackList, NotPayed WHERE BlackList.Order = NotPayed.Order  AND StdID = '$studentID'"; // Join t
				$qry = $this->db_connection -> query($sql);
		}

    private function showContent() {
    }

		private function userLoggedIn() {
				if (!isset($_SESSION['username'])) {
						header("refresh: 0; url=logout.php?action=relogin");
				}
				else {
						$this->username = $_SESSION['username'];
						//$this->studentID = $_SESSION['studentID'];
				}
		}
}
