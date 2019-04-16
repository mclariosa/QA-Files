<?php include 'partnerSaving.php';?>


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

<!--MEnu bar<?php;?>-->
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


<h3 align = "center";>Partners Documentation Form</h3>
<p align = "center";>Please Log Partner's Documents:</p>

<div class="container" style="width: 429px; margin-left: 530px;">
  <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete ="off">

    <label for="PartnersName">Partner's Name:</label>
    <select id="PartnersName" name="PartnersName" placeholder= "Partner's Name" label="Partner's Name" required>
            <option value="">---Select Partner's Name---</option>
            <?php
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="";
            $link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
            
            $dbname = 'listoftesting';
            mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
            $cdquery="SELECT Partner FROM listofpartners GROUP BY Partner HAVING COUNT(PartnerNum)";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
                $PartnersName=$cdrow["Partner"];
                echo '<option value = "'.$PartnersName.'">'.$PartnersName.'</option>';                
            }    
            ?>
       </select>

    <label for="MOA">Memorandum of Agreement:</label>
     <select id = "MOA" placeholder= "Please select status." name= "MOA" required>
           <option value="">---Please select Status---</option>
           <option value = "With">With</option>   
           <option value="Without">Without</option>
           </select>
          
  <label for="NDA">Non-Disclosure Agreement:</label>
     <select id = "NDA" placeholder= "Please select status." name= "NDA" required>
           <option value="">---Please select Status---</option>
           <option value = "With">With</option>   
           <option value="Without">Without</option>
           </select>

  <label for="WO">Work Order:</label>
     <select id = "WO" placeholder= "Please select status." name= "WO"  required>
           <option value="">---Please select Status---</option>
           <option value = "With">With</option>  
           <option value="Without">Without</option>
           </select>

  <label for="FSDRequest">FSD Request:</label>
     <select id = "FSDRequest" placeholder= "Please select status." name= "FSDRequest" required>
           <option value="">---Please select Status---</option>
           <option value = "With">With</option>  
           <option value="Without">Without</option>
           </select>

  <label for="ChargeSettings">Charge Settings:</label>
     <select id = "ChargeSettings" placeholder= "Please select status." name= "ChargeSettings" required>
           <option value="">---Please select Status---</option>
           <option value = "With">With</option>  
           <option value="Without">Without</option>
           </select>

  <label for="AccessForm">Access Form:</label>
     <select id = "AccessForm" placeholder= "Please select status." name= "AccessForm" required>
           <option value="">---Please select Status---</option>
           <option value = "WithAndComplete">With Form and Complete Credentials</option>
           <option value = "WithAndIncomplete">With Form but Incomplete Credentials</option>    
           <option value="Without">Without</option>
     </select>

  <label for="HDChecklist">Helpdesk Checklist:</label>
     <select id = "HDChecklist" placeholder= "Please select status." name= "HDChecklist" required>
           <option value="">---Please select Status---</option>
           <option value = "With">With</option>
           <option value="Without">Without</option>
      </select>

 <label for="GLCode">Partner's GL Code:</label>
    <input type="text" id="GLCode" name="GLCode" placeholder="Please Input Partner's GL Code" required>


  <label for="PartnersType">Partner's Classification:</label>
     <select id = "PartnersType" placeholder= "Please select status." name= "PartnersType" required>
           <option value="">---Please select Partners Type---</option>
           <option value = "API">API</option>
           <option value = "Billspayment">Billspayment</option>
     </select>


   <label for="Overall">Overall Document:</label>
     <select id = "Overall" placeholder= "Please select status." name= "Overall" required>
           <option value="">---Please select Overall Partner Documents---</option>
           <option value = "Complete">Complete</option>
           <option value = "Incomplete">Incomplete</option>
     </select>



    <input type="submit" name="submit" value="Save" class="btn btn-block btn-primary"/>

  </form>
</div>

</body>
</html>

