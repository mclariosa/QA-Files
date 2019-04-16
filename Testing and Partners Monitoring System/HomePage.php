<html>
<head>
    <title>Displaying MySQL Data in HTML Table</title>
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
        <a href="AddingOfScheduleForTesting.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">Add Schedule for Testing</h6></a>
        <a href="Done Tested.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">Update Done Testing</h6></a>
        <a href="QASchedule.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">QA</h6></a>
        <a href="TQASchedule.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">TQA</h6></a>
        <a href="PVSchedule.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">PV</h6></a>
      </div>
    </div> 
    
  <div class="dropdown">
     <button class="dropbtn"><h6 style="margin-top: 0px;margin-bottom: 0px;">Partner</h6> 
      </button>
      <div class="dropdown-content">
        <a href="PartnerDropDown.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">Partners With Documents</h6></a>
        <a href="PartnerDropDownWout.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">Partners Without Documents</h6></a>
      </div>
 </div>

    <div class="dropdown">
     <button class="dropbtn"><h6 style="margin-top: 0px;margin-bottom: 0px;">Utilities</h6> 
       
      </button>
      <div class="dropdown-content">
        <a href="AddProject.php"><h6 style="margin-top: 0px;margin-bottom: 0px;">Add Project</h6></a>
        <a href="#"><h6 style="margin-top: 0px;margin-bottom: 0px;">Add Team Leader</h6></a>
        <a href="#"><h6 style="margin-top: 0px;margin-bottom: 0px;">Add Tester's Name</h6></a>
        <a href="#"><h6 style="margin-top: 0px;margin-bottom: 0px;">Add Testing Phase</h6></a>
        <a href="#"><h6 style="margin-top: 0px;margin-bottom: 0px;">Add Status</h6></a>

      </div>
</div>


</body>
</html>
