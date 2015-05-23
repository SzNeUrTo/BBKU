<?php
class Content {
	private $pageName;
	private $tableName;
	private $tableHeader = array();
	private $tableBody = array();

	public function __construct($pageName, $tableName, $queryResult) {
		$this->pageName = $pageName;
		$this->tableName = $tableName;
		$this->findKeyValue($queryResult);
	}
	private function findKeyValue($queryResult) {
		$isFindKeys = false;
		while($dataRow = $queryResult->fetch(PDO::FETCH_ASSOC)) {
			if (!$isFindKeys) {
				foreach ($dataRow as $key=>$value) {
					$this->tableHeader[] = $key;
				}
				$isFindKeys = true;
			}
			foreach ($dataRow as $value) {
				$this->tableBody[] = $value;
			}
		}
	}

	public function generatePageName() {
		echo $this->pageName;
	}
	public function generateTableName() {
		echo $this->tableName;
	}
	public function generateTagTH() {
		foreach ($this->tableHeader as $th) {
			echo "<th>$th</th>";
		}
	}
	public function generateTagTD() {

		$n = count($this->tableHeader);
		$m = count($this->tableBody) / $n;
		for ($i = 0; $i < $m; $i++) {
			echo "<tr>";
			for ($j = 0; $j < $n; $j++) {
				echo "<td>".$this->tableBody[$n*$i + $j]."</td>";
			}
			echo "</tr>";
		}
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
	private $pageName;
	private $tableName;

	public function __construct() {
		session_start();
		$this->userLoggedIn();
		$this->createConnection();
		$this->doAction();
		//$this->queryRun();
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
			$this->pageName = "History Borrow";
			$this->tableName = "History Borrow";
		}
		else if ($search == 'return') {
			$search = " AND Operation = 'Return'";
			$this->pageName = "History Return";
			$this->tableName = "History Return";
		}
		else if ($search == 'loss') {
			$search = " AND Operation = 'Lost'";
			$this->pageName = "History Loss";
			$this->tableName = "History Loss";
		}
		else {
			$search = ""; 
			$this->pageName = "History All";
			$this->tableName = "History All";
		}
		$this->sqlCommand = "SELECT * FROM History WHERE StdID = '$this->studentID'$search";
	}

	private function setContentAlert() {
		$this->sqlCommand = "SELECT * FROM BlackList, NotPayed WHERE BlackList.Order = NotPayed.Order  AND StdID = '$this->studentID'"; // Join t
		$this->pageName = "Alert";
		$this->tableName = "Alert";
		echo "xx";
	}

	private function queryRun() {
		$this->queryResult = $this->db_connection->query($this->sqlCommand); // Can Reuse
	}

	public function getQueryResult() {
		return $this->queryResult;
	}

	private function showContent() {
		//editHere
		$this->content = new Content($this->pageName, $this->tableName, $this->queryResult);
		//editHere
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
