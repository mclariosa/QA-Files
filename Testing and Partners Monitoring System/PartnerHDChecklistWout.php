<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'listoftesting'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$sql = "SELECT PartnersName FROM `partnerslist` WHERE HDChecklist = 'without' ORDER BY PartnersName";
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<?php
$db_host1 = 'localhost'; // Server Name
$db_user1 = 'root'; // Username
$db_pass1 = ''; // Password
$db_name1 = 'listoftesting'; // Database Name

$conn1 = mysqli_connect($db_host1, $db_user1, $db_pass1, $db_name1);
if (!$conn1) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$sql1 = "SELECT COUNT(PartnersName) AS total FROM partnerslist WHERE HDChecklist = 'without';";
$query1 = mysqli_query($conn1, $sql1);

if (!$query1) {
	die ('SQL Error: ' . mysqli_error($conn1));
}
?>


<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	  <!--Auto Reload of URL-->
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
     <!--Auto Reload of URL end-->
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
<!--MEnu bar-->
<style>
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: green;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>




</head>
<body style = "zoom: 125%;">
<div class="navbar">
  <a href="HomePage.php"><h6 style="margin-top: 0px; margin-bottom: 0px;">Home</h6></a>
      <div class="dropdown">
      <button class="dropbtn"><h6 style="margin-top: 0px;margin-bottom: 0px;">Schedule Testing</h6> 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="QASchedule.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">QA</h6></a>
        <a href="TQASchedule.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">TQA</h6></a>
        <a href="PVSchedule.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">PV</h6></a>
      </div>
    </div> 
    </div>

	<table class="data-table">
		<caption class="title"><h1>Partner without Helpdesk Checklist Document</h1></caption>
		<thead>
			<tr>
				<th>Partners Name</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($query))
		{
		 //<td>'.$amount.'</td>  <td>'.$no.'</td><th>NO</th><td>'.$row['TestingPhase'].'</td>
			$amount  = $row['PartnersName'] == 0 ? '' : number_format($row['PartnersName']);
			echo '<tr>
					<td style="text-align:left">'.$row['PartnersName'].'</td>
				</tr>';
		}
        ?>
		</tbody>
		<tfoot>
			<tr>
			
					<?php
		 while ($row = mysqli_fetch_array($query1))
		echo '<td style="color:blue;"><b>Total Number:  '.$row['total'].'</b></td>';
	          ?>

			</tr>
		</tfoot>
	</table>
</body>
</html>