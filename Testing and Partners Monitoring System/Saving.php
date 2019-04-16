<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("listoftesting", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$ProjectName = $_POST['ProjectName'];
$ProjectRelease = $_POST['ProjectRelease'];
$TargetDateRelease = $_POST['TargetDateRelease'];
$TestingPhase = $_POST['TestingPhase'];
$TeamLeaderIncharge = $_POST['TeamLeaderIncharge'];

if($ProjectRelease !=="" && $ProjectName !==""){
//Insert Query of SQL (1- is active, 0 -for done Testing, 2-for Ongoing, 3- for Return)
$query = mysql_query("INSERT INTO testingsummary (ProjectNo, ProjectName, ProjectRelease, TargetDateRelease, TestingPhase, TeamLeaderIncharge, StatusOfTesting, ActualTesting) VALUES ('', '$ProjectName', '$ProjectRelease', '$TargetDateRelease', '$TestingPhase', '$TeamLeaderIncharge', '1', CURRENT_TIMESTAMP)");
  
  $message1 = "Successfully Inserted in Database.";
  echo "<script type='text/javascript'>alert('$message1');</script>";
}
else{
  
  $message = "Not Inserted in Database\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";




echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server
?>



               