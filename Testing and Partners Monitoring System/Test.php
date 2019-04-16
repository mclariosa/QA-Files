<?php include "Saving.php";?>
<html>
<head>
    <title>Add New Schedule for Testing</title>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
 <script language="javascript" type="text/javascript">
    //this code handles the F5/Ctrl+F5/Ctrl+R
    document.onkeydown = function(){
  switch (event.keyCode){
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false;
        case 82 : //R button
            if (event.ctrlKey){ 
                event.returnValue = false;
                event.keyCode = 0;
                return false;
            }
    }
}
</script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<body>
   <h1>Add New Schedule for Testing</h1>
<form class="form" action="" method="post" enctype="multipart/form-data" autocomplete ="off">
<input type="text" placeholder= "Team Leader" name= "TeamLeaderIncharge" required /><br>
<select id="ProjectName" name="ProjectName" placeholder= "Project Name" label="Project Name" style="height: 17.988636px;width: 158.988636px;" required>
            <option value="">-Select Project Name-</option>
            <?php
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'listoftesting';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT ProjectName FROM listofprojects GROUP BY ProjectName HAVING COUNT(ProjectNum)";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
                $ProjectName=$cdrow["ProjectName"];
                echo '<option value = "'.$ProjectName.'">'.$ProjectName.'</option>';                
            }    
            ?>
       </select><br>
<input type="text" placeholder= "Project Description" name= "ProjectRelease" required /><br>
<input style = "color: Gray;" type="date" placeholder= "Target Date" name= "TargetDateRelease"  max="2040-12-31" min= "<?php echo date('Y-m-d'); ?>" required /><br>
<select id = "Testing Phase" placeholder= "Testing Phase" name= "TestingPhase"  style="height: 17.988636px;width: 158.988636px;" required>
  
           <option value="">-Select Testing Phase-</option>
           <?php  
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'listoftesting';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT TestingPhase FROM testingphase GROUP BY TestingPhase HAVING COUNT(TestingNum)";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $TestingPhase=$cdrow["TestingPhase"];
                echo '<option value = "'.$TestingPhase.'">'.$TestingPhase.'</option>';   
            }      
            ?>
            </select>
<input type="submit" name="submit" value="Save" class="btn btn-block btn-primary"/>
    </form>

</body>
</html>
