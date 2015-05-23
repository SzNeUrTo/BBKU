<?php
class Content {
	private $pageHeader;
	private $panelName;
	private $tableHeader = array();
	private $tableBody = array();
	private $showBotton;
	private $pageAction;

	public function __construct($pageAction, $pageHeader, $panelName, $queryResult) {
		$this->pageAction = $pageAction;
		$this->pageHeader = $pageHeader;
		$this->panelName = $panelName;
		$this->findKeyValue($queryResult);
	}

	private function findKeyValue($queryResult) {
		if (!empty($queryResult) && $this->pageAction != 'br') {
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
	}

	public function generatePageHeader() {
		echo $this->pageHeader;
	}

	public function generatePanelName() {
		echo $this->panelName;
	}

	public function generateTagTH() {
		foreach ($this->tableHeader as $th) {
			echo "<th>$th</th>";
		}
		// echo ifelse "<th>btn action to something...</th>> fun("th") fun("td");
	}

	public function generateTagTD() {

		$n = count($this->tableHeader);
		$m = count($this->tableBody) / $n;
		for ($i = 0; $i < $m; $i++) {
			echo "<tr>";
			for ($j = 0; $j < $n; $j++) {
				//check Link createLink array 2 dims maps and create case possible get form column
				echo "<td>".$this->tableBody[$n*$i + $j]."</td>";
			}
			// echo <td>btn1 btn2 btn3</td> if else
			echo "</tr>";
		}
		if (count($this->tableBody) == 0) {
			echo "<p>No data available</p>";
		}
	}

	public function getPageHeader() {
		return $this->pageHeader;
	}

	public function getPanelName() {
		return $this->panelName;
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
	private $pageHeader;
	private $panelName;
	private $status;
	private $bikeid;
	private $pageAction;

	public function __construct() {
		session_start();
		$this->userLoggedIn();
		$this->createConnection();
		$this->getStatusDB();
		$this->updateStatus();
		$this->doAction();
		$this->queryRun();
		$this->showContent();
	}

	public function getStatus() {
		return $this->status;
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
			$this->pageAction = $action;
			if ($action == "br") {
				// getting value sending command operation management
				//$this->setHome();
				
				$this->status = $_SESSION["status"];
				if ($this->status == "CanBorrow") {
					$this->setContentBorrow();
				}
				else if ($this->status == "RequestBorrow") {
					$this->setContentRequest("RequestBorrow");
				}
				else if ($this->status == "CanReturn") {
					$this->setContentReturn();
				}
				else if ($this->status == "RequestReturn") {
					$this->setContentRequest("RequestReturn");
				}
				else if ($this->status == "RequestLoss") {
					$this->setContentRequest("RequestLoss");
				}
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
			else {
				$this->setContentHome();
			}
		}
	}

	private function updateStatus() {
		// get status from sql because staff update not section
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$this->bikeid = $_POST['bikeid'];
			$operation = $_POST['operation'];
			echo $operation;

			if ($this->status == "CanBorrow") {
				$this->status = "RequestBorrow";
				$this->queryReuestBorrow();
			}
			else if ($this->status == "RequestBorrow") {
				$this->status = "CanBorrow";
				$this->queryBorrow();
			}
			else if ($this->status == "Return") {
				$this->status = $operation; 
				$this->queryRequestRL();
			}
			else if ($this->status == "RequestReturn" || $this->status == "RequestLoss") {
				$this->status = "Return";
				$this->queryReturn();
			}
			$_SESSION['status'] = $this->status;
		}
	}

	public function getPageAction() {
		return $this->pageAction;
	}

	private function getStatusDB() {
		$this->sqlCommand = "SELECT Status From StdAccount WHERE User = '$this->username'";
		$this->queryRun();
		$this->status = $this->queryResult->fetch()['Status'];
		$_SESSION['status'] = $this->status;
	}

	private function queryReuestBorrow() {
		$this->sqlCommand = "UPDATE StdAccount SET Status = 'RequestBorrow' WHERE User = '$this->username'";
		$this->queryRun();
		$this->sqlCommand = "INSERT INTO Request VALUES('$this->bikeid','$this->studentID','Borrow')";
		$this->queryRun();
		$this->sqlCommand = "UPDATE Bike SET Status = 'RequestBorrow' WHERE BikeID = '$this->bikeid'";
		$this->queryRun();
	}

	private function queryBorrow() {
		$this->sqlCommand = "UPDATE StdAccount SET Status = 'CanBorrow' Where User = '$this->username'";
		$this->queryRun();
		$this->sqlCommand = "DELETE FROM Request WHERE StdID = '$this->studentID' AND BikeID = '$this->bikeid'";
		$this->queryRun();
		$this->sqlCommand = "UPDATE Bike SET Status = 'Borrow' WHERE BikeID = 'this->bikeid'";
		$this->queryRun();
	}

	private function queryRequestRL() {
		if($this->status == "RequestReturn"){
			$this->sqlCommand = "UPDATE StdAccount SET Status 'RequestReturn' WHERE User = '$this->username'";
			$this->queryRun();
			$this->sqlCommand = "INSERT INTO Request VALUES('$this->bikeid','$this->studentID','Return')";
			$this->queryRun();
			$this->sqlCommand = "UPDATE Bike SET Status = 'RequestReturn' WHERE BikeID = '$this->bikeid'";
			$this->queryRun();
		}
		else if($this->status == "RequestLoss"){
			$this->sqlCommand = "UPDATE StdAccount SET Status 'RequestLoss' WHERE User = '$this->username'";
			$this->queryRun();
			$this->sqlCommand = "INSERT INTO Request VALUES('$this->bikeid','$this->studentID','Loss')";
			$this->queryRun();
			$this->sqlCommand = "UPDATE Bike SET Status = 'RequestLoss' WHERE BikeID = '$this->bikeid'";
			$this->queryRun();
		}
	}

	private function queryReturn() {
		$this->sqlCommand = "UPDATE StdAccount SET Status = 'CanReturn' WHERE User = '$this->username'";
		$this->queryRun();
		$this->sqlCommand = "DELETE FROM Request WHERE StdID = '$this->studentID' AND BikeID = '$this->bikeid'";
		$this->queryRun();
		$this->sqlCommand = "UPDATE Bike SET Status = 'Return' WHERE BikeID = 'this->bikeid'";
		$this->queryRun();
	}

	private function setContentBorrow() {
		$this->pageHeader = "Borrow";
		$this->panelName = "Borrow";
		$this->sqlCommand = "SELECT BikeID FROM Bike WHERE Status = 'Ready'";
		$this->queryRun();
	}

	private function setContentReturn() {
		$this->pageHeader = "Return";
		$this->panelName = "<h4>You must return the bike by click return. But if the bike is losing, you should click loss.</h4>";
		$this->sqlCommand = "SELECT BikeID FROM History WHERE StdID = '$this->studentID' AND Operation = 'Return' ORDER BY Date,Time DESC LIMIT 1";
		$this->queryRun();
		$this->bikeid = $this->queryResult->fetch()['BikeID'];
	}

	private function setContentRequest($request) {
		$this->pageHeader = $request;
		$this->panelName = "RRRR $request";
		$this->sqlCommand = "SELECT BikeID FROM Request WHERE StdID = '$this->studentID'";
		$this->queryRun();
		$this->bikeid = $this->queryResult->fetch()['BikeID'];
		var_dump($this->bikeid);
	}

	public function getBikeID() {
		return $this->bikeid;
	}

	
	private function goToLogin($action) {
		header("refresh: 0; url=logout.php?action=$action");
	}

	private function setContentHome() {
		$this->pageHeader = "Home";
		$this->setContentAlert(); // for test javascript remover table
		//something redirect studentHome.php --> example eiei
	}

	private function setContentHistory($search) {
		if ($search == 'borrow') {
			$search = " AND Operation = 'Borrow'";
			$this->pageHeader = "History Borrow";
			$this->panelName = "History Borrow";
		}
		else if ($search == 'return') {
			$search = " AND Operation = 'Return'";
			$this->pageHeader = "History Return";
			$this->panelName = "History Return";
		}
		else if ($search == 'loss') {
			$search = " AND Operation = 'Lost'";
			$this->pageHeader = "History Loss";
			$this->panelName = "History Loss";
		}
		else {
			$search = ""; 
			$this->pageHeader = "History All";
			$this->panelName = "History All";
		}
		$this->sqlCommand = "SELECT * FROM History WHERE StdID = '$this->studentID'$search";
	}

	private function setContentAlert() {
		$this->sqlCommand = "SELECT * FROM BlackList, NotPayed WHERE BlackList.Order = NotPayed.Order  AND StdID = '$this->studentID'"; // Join t
		$this->pageHeader = "Alert";
		$this->panelName = "Alert";
		echo "xx";
	}

	private function queryRun() {
		$this->queryResult = $this->db_connection->query($this->sqlCommand); // Can Reuse
	}

	public function getQueryResult() {
		return $this->queryResult;
	}

	private function showContent() {
		// edithere add Value something to class Content to create button coloumn javascript to do it work
		$this->content = new Content($this->pageAction, $this->pageHeader, $this->panelName, $this->queryResult);
		//editHere
	}

	private function userLoggedIn() {
		if (!isset($_SESSION['username'])) {
			$this->goToLogin("relogin");
		}
		else {
			$this->username = $_SESSION['username'];
			$this->studentID = $_SESSION['studentID'];
			$this->status = $_SESSION['status'];
		}
	}
}
