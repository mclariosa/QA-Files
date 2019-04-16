<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("listoftesting", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$WorkOrder = $_POST['WorkOrder'];
$ProjectName = $_POST['ProjectName'];
$ProjectDescription = $_POST['ProjectDescription'];
$others = (($_POST['ProjectDescription']) == "Manually Encoded" ? $_POST['others'] : $_POST['ProjectDescription']);
$TesterName = $_POST['TesterName'];
$TestingPhase = $_POST['TestingPhase'];
$Status = $_POST['Status'];
$Reason = $_POST['Reason'];
$totaldays = $_POST['totaldays'];
$Hours = $_POST['Hours'];
$DateReceive = $_POST['DateReceive'];


if($ProjectDescription !=="" && $ProjectName !==""){
//Insert Query of SQL (1- is active, 0 -for done Testing, 2-for Ongoing, 3- for Return)
$my_date = date("Y-m-d H:i:s"); 
$query = mysql_query("INSERT INTO testingupdate (Updateno, WorkOrder, ProjectName, ProjectDescription, TesterName, TestingPhase, Status, Reason, totaldays, Hours, DateReceive, TimeUpdated) VALUES ('', '$WorkOrder', '$ProjectName', '$others', '$TesterName', '$TestingPhase', '$Status', '$Reason', '$totaldays', '$Hours', '$DateReceive', CURRENT_TIMESTAMP)");
$query = mysql_query("INSERT INTO testingsummary (ProjectNo, ProjectName, ProjectRelease, TargetDateRelease, TestingPhase, TeamLeaderIncharge, StatusOfTesting, ActualTesting) VALUES ('', '$ProjectName', '$others', '$DateReceive', '$TestingPhase', 'Unplanned Testing', 1, '$DateReceive')");
  
  $message1 = "Testing Successfully Updated";
  echo "<script type='text/javascript'>alert('$message1');</script>";
}
else{
  
  $message = "Failed to Process update.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}
mysql_close($connection); // Closing Connection with Server
?>

