
<?php include "test1.php";?>

<html>
<head>
    <title>Displaying MySQL Data in HTML Table</title>

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







<h3 align = "center";>Update Form</h3>
<p align = "center";>Please Log your done Tested Project:</p>

<div class="container" style="width: 429px; margin-left: 530px;">
  <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete ="off">
    <label for="WorkOrder">Work Order Number:</label>
    <input type="text" id="WorkOrder" name="WorkOrder" placeholder="MIS-0000000000000" required>

    <label for="ProjectName">Project Name:</label>
    <select id="ProjectName" name="ProjectName" placeholder= "Project Name" label="Project Name" required>
            <option value="">---Select Project Name---</option>
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

    <label for="ProjectDescription">Project Description:</label>
     <select id = "ProjectDescription" placeholder= "Please Select Project Description" name= "ProjectDescription" onchange='CheckColors(this.value);' required>
           <option value="">---Select Project Description---</option>
           <?php  
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'listoftesting';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT ProjectRelease FROM testingsummary WHERE StatusOfTesting =0";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $ProjectRelease=$cdrow["ProjectRelease"];
                echo '<option value = "'.$ProjectRelease.'">'.$ProjectRelease.'</option>';   
            }      
            ?>
            <option value="Manually Encoded">Others</option>
            </select>
            <input placeholder= "Input Specific Testing" style="color: Gray;width: 430px;margin-left: 1px;" type="text" id="others" name = "others"/>









    <label for="TesterName">Tester's Name:</label>
           <select id = "TesterName" placeholder= "Tester Name" name= "TesterName"  required>
           <option value="">---Select a Tester---</option>
           <?php  
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'listoftesting';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT TesterName FROM testersinfo GROUP BY TesterName HAVING COUNT(IDNumber)";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $TesterName=$cdrow["TesterName"];
                echo '<option value = "'.$TesterName.'">'.$TesterName.'</option>';   
            }      
            ?>
            </select>



    <label for="TestingPhase">Testing Phase:</label>
           <select id = "TestingPhase" placeholder= "Testing Phase" name= "TestingPhase"  required>
           <option value="">---Select a Testing Phase---</option>
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

            <label for="Status">Status:&nbsp;</label>
           <select id = "Status" placeholder= "Status" name= "Status" onchange='CheckColors(this.value);' required>
           <option value="">---Choose a Status of the Project---</option>
           <?php  
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'listoftesting';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT Status FROM Status GROUP BY Status HAVING COUNT(StatusNumber)";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $Status=$cdrow["Status"];
                echo '<option value = "'.$Status.'">'.$Status.'</option>';   
            }      
            ?>
            </select>
           <label for="Reason">Reason:</label>
           <textarea style="display: none;padding-right: 56px;" type="text" name="Reason" placeholder="Please State your Justification or Reason of Status" id="Reason" rows="4" cols="50" required></textarea>
           <br>

     <label for="DateReceive">Date Receive:</label>
     <input style = "color: Gray; width: 318px;" type="date" placeholder= "Target Date" id= "DateReceive" name= "DateReceive"  max="<?php echo date('Y-m-d'); ?>" min= "2000-12-01"/>
     <br>
     <br>
     <label for="DateReturn">Date Return:&nbsp;&nbsp;</label>
     <input style = "color: Gray;width: 318px;margin-left: 1px;" type="date" placeholder= "Target Date"  id= "DateReturn" name= "DateReturn"  max="<?php echo date('Y-m-d'); ?>" min= "2000-12-01"/>
     <br>
     <br>
     <label for="totaldays">Number of Days Tested:</label>
     <input placeholder= "Total Days Tested" style = "color: Gray;width: 289px;margin-left: 1px;" type="text" id="totaldays" name = "totaldays" readonly/>

     <label for="StartTest">Start Time Tested:</label>
     <input style = "color: Gray;width: 289px;" type="time" placeholder= "Time" id= "Stime" name= "Stime" required />
     <br>
     <br>
     <label for="EndTest">End Time Tested:&nbsp;</label>
     <input style = "color: Gray;width: 289px;" type="time" placeholder= "Time" id= "Etime" name= "Etime" required />
     <br>
     <br>

     <label for="Hours">Number of time Tested:&nbsp;</label>
     <input placeholder= "Total Time Tested" style = "color: Gray;width: 289px;" type="text" id= "Hours" name= "Hours" readonly/>
    <input type="submit" name="submit" value="Save" class="btn btn-block btn-primary"/>

  </form>
</div>

</body>
</html>



<script type="text/javascript">
  $(document).ready( function(){

    $("#DateReturn").on("change", function(){
      var from      = moment($("#DateReceive").val());
      var to        = moment($(this).val());
      var num_days  = to.diff(from, 'days');
      //Script for Total Day;

      $("#totaldays").val(num_days);
    });

    $("#Etime").on("change", function(){
      var from      = moment($("#Stime").val(), "HH:mm a");
      var to        = moment($(this).val(), "HH:mm a");
      var duration   = moment.duration(to.diff(from));
      var hours = parseInt(duration.asHours());
      var minutes = parseInt(duration.asMinutes())%60;
      $("#Hours").val(hours +' hour/s and '+ minutes +' minute/s');

    });
  });
</script>

   
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('Reason');
 if(val=='.$Status.')
   element.style.display='none';
 else  
   element.style.display='block';
}

</script> 

<script type="text/javascript">
$(document).ready(function() {
 
  $('#ProjectDescription').change(function() {
    if( $(this).val() == 'Manually Encoded') {
          $('#others').prop( "disabled", false );
    } else {       
      $('#others').prop( "disabled", true );
    }
  });
});
</script> 
