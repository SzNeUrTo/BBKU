<?php
class Content {

	public function __construct() {

	}

	public function generatePageName() {
		echo "eiei";
	}

	public function generateTableName() {
		echo "eiei";
	}

	public function generateTagTH() {
		echo "<th>eiei2</th>";
	}

	public function generateTagTD() {
		echo "<td>1234</td>";
	}

}
include 'config.php';

class ContentCreator {
	private $db_connection;
	private $username;
	private $studentID;
	private $sqlCommand;
	private $queryResult;
	private $content;

    public function __construct() {
		session_start();
		$this->userLoggedIn();
		$this->createConnection();
		$this->doAction();
		$this->queryRun();
		$this->showContent();
	}

	private function createConnection() {
		try {
			$host = DB_HOST;
			$user = DB_USER;
			$pass = DB_PASS;
			$dbname = DB_NAME;
			$port = DB_PORT;
			$this->db_connection = new PDO("mysql:host=$host;dbname=$dbname".";port=$port", $user, $pass);
		} catch (PDOException $error) {
			die("Error : " . $error->getMessage());
		}
	}

	public function getContent() {
		return $this->content;
	}

	private function doAction() {
		if (isset($_GET["action"])) {
			$action = $_GET["action"];
			if ($action == "home") {
				$this->setContentHome();
			}
			else if ($action == "br") {
				//$this->setHome();
			}
			else if ($action == "history") {
				$this->setContentHistory($_GET["search"]);
			}
			else if ($action == "alert") {
				$this->setContentAlert();
			}
			else if ($action == "logout") {
				$this->goToLogin("logout");
			}
		}
	}
	
	private function goToLogin($action) {
		header("refresh: 0; url=logout.php?action=$action");
	}

	private function setContentHome() {
		//something redirect studentHome.php --> example eiei
	}

	private function setContentBorrowReturn() {
		//something 
		//4 case 3 case is table(extraTable) 1 case is ExtraSelector(BIKE_ID)
		//check Session check User Status Borrow Ready RequestBorrow RequestReturn
	}

	private function setContentHistory($search) {
		if ($search == 'borrow') {
			$search = " AND Operation = 'Borrow'";
		}
		else if ($search == 'return') {
			$search = " AND Operation = 'Return'";
		}
		else if ($search == 'loss') {
			$search = " AND Operation = 'Lost'";
		}
		else {
			$search = ""; 
		}
		$this->sqlCommand = "SELECT * FROM History WHERE StdID = '$this->studentID'$search";
	}

	private function setContentAlert() {
		$this->sqlCommand = "SELECT * FROM BlackList, NotPayed WHERE BlackList.Order = NotPayed.Order  AND StdID = '$this->studentID'"; // Join t
		echo "xx";
	}

	private function queryRun() {
		$this->queryResult = $this->db_connection->query($this->sqlCommand); // Can Reuse
	}

	public function getQueryResult() {
		return $this->queryResult;
	}

	private function showContent() {
		//$this->content = new Content(data1, data2, data3);
		$this->content = new Content();
		// table if it is table
	}

	private function userLoggedIn() {
		if (!isset($_SESSION['username'])) {
			$this->goToLogin("relogin");
		}
		else {
			$this->username = $_SESSION['username'];
			$this->studentID = $_SESSION['studentID'];
		}
	}
}

