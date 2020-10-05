<?php
require_once("firewall/config.php");
require_once("firewall/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Dossier</title>
    <style>
        .list {
            border-bottom: 1px solid #ccc;
        }
        .topname td{
            font-size: 18px;
            font-weight: 600;
            padding: 2px 8px;
            background-color: #ccc;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
   <h1>Students List</h1>
   <?php 
        $db = new Database();
        $db->open();
        $db->query($stdrecordset = "SELECT * FROM student ORDER BY stdFName ASC");
        $stdquery = $db->query($stdrecordset);
        $stdrow = $db->fetchAssoc($stdquery);
   ?>
   <table>
    <thead>
        <tr class="topname">
            <td>ID</td>
            <td>Name</td>
            <td>Section</td>
            <td>Department</td>
        </tr>
    <thead>
    <tbody>
    <?php do{ ?>
        <tr>
            <td class="list"><?php echo $stdrow['stdID']; ?></td>
            <td class="list"><?php echo $stdrow['stdFName']." ".$stdrow['stdLName']; ?></td>
            <td class="list" style="text-align:center;"><?php echo $stdrow['stdSec']; ?></td>
            <td class="list"><?php echo $stdrow['stdDep']; ?></td>
        </tr>
    <?php }while($stdrow = $db->fetchAssoc($stdquery)); ?>
    </tbody>
   </table> 
</body>
</html>