<?php include "Saving.php";?>

<html>
<head>
    <title>Displaying MySQL Data in HTML Table</title>
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
<style>
body {
  font-family: Arial;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>

<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="moment-with-locales.min.js"></script>


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
        <a href="PVSchedul e.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">PV</h6></a>
      </div>
    </div> 
    <a href="Done Tested.php"><h6 style="margin-top: 0px; margin-bottom: 0px;">Update Testing</h6></a>
</div>







<h3 align = "center";>Add New Schedule for Testing</h3>

<div class="container" style="width: 429px; margin-left: 530px;">
  <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete ="off">
   
    <label for="TeamLeaderIncharge">Team Leader:</label>
    <input type="text" id="TeamLeaderIncharge" name="TeamLeaderIncharge" placeholder="Input Team Leader" required>
   
 

<label for="ProjectName">Project Name:</label>
           <select id = "ProjectName" placeholder= "Project Name" name= "ProjectName" onchange='CheckColors(this.value);' required>
           <option value="">---Select a Project Name---</option>
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
            </select>

     <label for="ProjectRelease">Project Release:</label>
     <input type="text" id="ProjectRelease" name="ProjectRelease" placeholder="Input Project Release" required>

     <label for="TargetDateRelease">Date Target:</label>
     <input style = "color: Gray; width: 318px;" type="date" placeholder= "Target Date" id= "TargetDateRelease" name= "TargetDateRelease"  max="2040-12-01" min= "<?php echo date('Y-m-d'); ?>"/>
     <br>
     <br>
        <label for="Testing Phase">Testing Phase:&nbsp;</label>
             <select id = "TestingPhase" placeholder= "TestingPhase" name= "TestingPhase" onchange='CheckColors(this.value);' required>
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
</div>

</body>
</html>

