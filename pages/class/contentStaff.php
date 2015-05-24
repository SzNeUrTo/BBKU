<?php
class Content {
	private $pageHeader;
	private $panelName;
	private $tableHeader = array();
	private $tableBody = array();
	private $pageAction;
	private $dataTable = array();

	public function __construct($pageAction, $pageHeader, $panelName, $queryResult) {
		$this->pageAction = $pageAction;
		$this->pageHeader = $pageHeader;
		$this->panelName = $panelName;
		$this->findKeyValue($queryResult);
	}

	private function findKeyValue($queryResult) {
		if (!empty($queryResult)) {
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
				$this->dataTable[] = $dataRow;
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
		$this->generateBtnTagTH();
		// echo ifelse "<th>btn action to something...</th>> fun("th") fun("td");
	}

	private function generateBtnTagTH() {
		if ($this->pageAction != "" && !empty($this->tableHeader)) {
			echo '<th>Submit</th>';
		}
	}

	private function generateBtnTagTD($i) {
		$j = 0;
		if ($this->pageAction != "" && !empty($this->tableHeader)) {
			echo "<td class='text-center'>";
			if ($this->pageAction == "Borrow" || $this->pageAction == "Return" || $this->pageAction == "Loss" || $this->pageAction == "All") {
				$btnDisable = 'false';
				if ($this->dataTable[$i]['Type'] == "Borrow" || $this->dataTable[$i]['Type'] == "Loss") {
					$btnDisable = 'true';
				}
				$studentID = $this->dataTable[$i]['StdID'];
				$type = $this->dataTable[$i]['Type'];
				$studentID = "'$studentID'";
				$type = "'$type'";
				echo '<input value="Accept" class="btn btn-success" type="submit"'.$st.'>';
				echo '<input value="Reject" class="btn btn-danger" type="submit"'.$st.'>';
				echo "<input value=\"Ruined\" class=\"btn btn-warning\" type=\"submit\" disabled=\"$btnDisable\" $st>";
			}
			else if ($this->pageAction == "ToRepair") {
				$order = $this->dataTable[$i]['Order'];
				$st = "onclick=\"editInfo(".$order.")\"";
				echo '<input value="Edit" class="btn btn-danger" type="submit"'.$st.'>';
				$st = "onclick=\"complete(".$order.")\"";
				echo '<input value="Complete" class="btn btn-success" type="submit"'.$st.'>';
			}
			else if ($this->pageAction == "NotPayed") {
				echo '<input value="Paid" class="btn btn-success" type="submit" onclick="paidMoney('.$this->dataTable[$i]['Order'].')">';
			}

	//<button value="accept" class="btn btn-success" type="submit" onclick="getValue(this)">Accept</button>
//	<button value="reject" class="btn btn-danger" type="submit" onclick="getValue(this)">Reject</button>
//	<button value="ruined" class="btn btn-warning" type="submit" onclick="getValue(this)">Ruined</button>
			echo "</td>";
		}
	}

	public function generateTagTD() {

		$n = count($this->tableHeader);
		$m = count($this->tableBody) / $n;
		for ($i = 0; $i < $m; $i++) {
			//echo "<tr>";
			echo '<tr class="odd gradeX">';
			for ($j = 0; $j < $n; $j++) {
				//check Link createLink array 2 dims maps and create case possible get form column
				echo "<td>".$this->tableBody[$n*$i + $j]."</td>";
			}
			// echo <td>btn1 btn2 btn3</td> if else
			$this->generateBtnTagTD($i);
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
	private $staffID;
	private $status;
	private $sqlCommand;
	private $queryResult;
	private $pageHeader;
	private $panelName;
	private $content;
	private $pageAction;
	private $querySearch;

	public function __construct() {
		session_start();
		$this->userLoggedIn();
		$this->createConnection();
		//$this->staffAction();
		$this->doAction();
		$this->queryRun();
		$this->showContent();
		//echo $this->sqlCommand;
		//echo "<br>";
		//var_dump($this->queryResult->fetchAll());
	}

	private function userLoggedIn() {
		if (!isset($_SESSION['username'])) {
			// $this->goToLogin("relogin");
			echo "";
		}
		else {
			$this->username = $_SESSION['username'];
			$this->studentID = $_SESSION['staff_id'];
			$this->status = $_SESSION['status']; //status = staff
		}
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

	// can move to define
	private function convertSearchStr() {
		$search = $_GET["search"];
		if (!empty($search)) {
			if ($search == "ready") {
				$search = "Ready";
			}
			else if ($search == "borrow") {
				$search = "Borrow";
			}
			else if ($search == "return") {
				$search = "Return";
			}
			else if ($search == "lost") {
				$search = "Lost";
			}
			else if ($search == "repair") {
				$search = "Repair";
			}
			else if ($search == "requestborrow") {
				$search = "RequestBorrow";
			}
			else if ($search == "requestreturn") {
				$search = "RequestReturn";
			}
			else if ($search == "requestloss") {
				$search = "RequestLoss";
			}
			else if ($search == "loss") {
				$search = "Loss";
			}
			else if ($search == "repaired") {
				$search = "Repaired";
			}
			else if ($search == "torepair") {
				$search = "ToRepair";
			}
			else if ($search == "payed") {
				$search = "Payed";
			}
			else if ($search == "notpayed") {
				$search = "NotPayed";
			}
			else if ($search == "all") {
				$search = "All";
			}
		}
		//$this->querySearch = $search;
		return $search;
	}
	// can move to define

	private function doAction() {
		if (isset($_GET["action"])) {
			$action = $_GET["action"];
			$this->pageAction = "";
			$search = $this->convertSearchStr();
			if ($action == "bike") {
				$this->setContentBike($search);
			}
			else if ($action == "request") {
				$this->setContentRequest($search);
			}
			else if ($action == "history") {
				$this->setContentHistory($search);
			}
			else if ($action == "repair") {
				$this->setContentRepair($search);
			}
			else if ($action == "blacklist") {
				$this->setContentBlackList($search);
			}
			else if ($action == "student") {
				$this->setContentUserStudent();
			}
			else if ($action == "staff") {
				$this->setContentUserStaff();
			}
			else if ($action == "logout") {
				$this->goToLogin("logout");
			}
			else {
				$this->setContentHome();
			}
		}
	}

	private function queryRun() {
		$this->queryResult = $this->db_connection->query($this->sqlCommand); // Can Reuse
	}

	private function showContent() {
		// edithere add Value something to class Content to create button coloumn javascript to do it work
		$this->content = new Content($this->pageAction, $this->pageHeader, $this->panelName, $this->queryResult);
		//editHere
	}

	private function goToLogin($action) {
		header("refresh: 0; url=logout.php?action=$action");
	}

	public function getStatus() {
		return $this->status;
	}

	public function getContent() {
		return $this->content;
	}

	public function getPageAction() {
		return $this->pageAction;
	}

	public function getStaffID() {
		return $this->staffID;
	}

	public function getQueryResult() {
		return $this->queryResult;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getQuerySearch() {
		return $this->querySearch;
	}

	private function setContentHome() {
		// Edit Here
		echo "Home";
	}

	private function setContentBike($search) {
		if ($search != 'All') {
			$this->sqlCommand = "SELECT * FROM Bike WHERE Status = '$search'";
		}
		else {
			$this->sqlCommand = "SELECT * FROM Bike";
		}
		$this->pageHeader = "Bike ($search)";
		$this->panelName = "Bike ($search)";
	}

	private function setContentRequest($search) {
		if ($search != "All") {
			$this->sqlCommand = "SELECT * FROM Request WHERE Type = '$search'";
		}
		else {
			$this->sqlCommand = "SELECT * FROM Request";
			$search = "All";
		}
		$this->pageAction = $search;
		$this->pageHeader = "Request ($search)";
		$this->panelName = "Request ($search)";
	}

	private function setContentHistory($search) {
		if ($search != "All") {
			$this->sqlCommand = "SELECT * FROM History WHERE Operation = '$search'";
		}
		else {
			$this->sqlCommand = "SELECT * FROM History";
			$search = "All";
		}
		$this->pageHeader = "History ($search)";
		$this->panelName = "History ($search)";
	}

	private function setContentRepair($search) {
		if ($search == "Repaired") {
			$this->sqlCommand = "SELECT * FROM Repairing INNER JOIN Bike ON Repairing.BikeID = Bike.BikeID WHERE Status != 'Repair'";
		} 
		else if ($search == "ToRepair") {
			$this->pageAction = $search;
			$this->sqlCommand = "SELECT * FROM Repairing INNER JOIN Bike ON Repairing.BikeID = Bike.BikeID WHERE Status = 'Repair'";
		}
		else {
			$this->sqlCommand = "SELECT * FROM Repairing INNER JOIN Bike ON Repairing.BikeID = Bike.BikeID";
			$search = "All";
		}
		$this->pageHeader = "Repair ($search)";
		$this->panelName = "Repair ($search)";

	}

	// editHere
	private function setContentBlackList($search) {
		if ($search == "Payed") {
			$this->sqlCommand = "SELECT Payed.Order, StdID, BikeID, Cost, StaffID FROM BlackList INNER JOIN Payed ON BlackList.Order = Payed.Order";
		}
		else {
			$this->sqlCommand = "SELECT NotPayed.Order, StdID, BikeID, Cost FROM BlackList INNER JOIN NotPayed ON BlackList.Order = NotPayed.Order";
			$this->pageAction = "NotPayed";
		}
		$this->pageHeader = "BlackList ($search)";
		$this->panelName = "BlackList ($search)";
	}
	//edit Here

	//left join ?
	private function setContentUserStudent() {
		$this->sqlCommand = "SELECT Student.StdID,User,Status,FirstName,LastName,MajorCode,Telephone FROM Student LEFT JOIN StdAccount ON Student.StdID = StdAccount.StdID";
		$this->pageHeader = "Users (Student)";
		$this->panelName = "Users (Student)";
	}

	//left join ?
	private function setContentUserStaff() {
		$this->sqlCommand = "SELECT Staff.StaffID,User,FirstName,LastName,Telephone FROM Staff LEFT JOIN StaffAccount ON Staff.StaffID = StaffAccount.StaffID";
		$this->pageHeader = "Users (Staff)";
		$this->panelName = "Users (Staff)";
	}
}
