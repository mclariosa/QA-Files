<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("listoftesting", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$PartnersName = $_POST['PartnersName'];
$MOA = $_POST['MOA'];
$NDA = $_POST['NDA'];
$WO = $_POST['WO'];
$FSDRequest = $_POST['FSDRequest'];
$ChargeSettings = $_POST['ChargeSettings'];
$AccessForm = $_POST['AccessForm'];
$HDChecklist = $_POST['HDChecklist'];
$GLCode = $_POST['GLCode'];
$PartnersType = $_POST['PartnersType'];
$Overall = $_POST['Overall'];


if($MOA !=="" && $NDA !==""){
$query = mysql_query("INSERT INTO partnerslist (PartnersID, PartnersName, MOA, NDA, WO, FSDRequest, ChargeSettings, AccessForm, HDChecklist, GLCode, PartnersType, Overall, DateTimeAdded) VALUES ('', '$PartnersName', '$MOA', '$NDA', '$WO', '$FSDRequest', '$ChargeSettings', '$AccessForm', '$HDChecklist', '$GLCode', '$PartnersType', '$Overall', CURRENT_TIMESTAMP)");
  
  $message1 = "Partner Successfully Saved";
  echo "<script type='text/javascript'>alert('$message1');</script>";
}
else{
  
  $message = "Failed to save partners documentation.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
}
mysql_close($connection); // Closing Connection with Server
?>