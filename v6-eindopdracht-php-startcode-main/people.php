<?php require_once("header.php"); ?>
<h1>People in Test1</h1>
<?php
$db=new PDO("sqlite:test1.db");
if(!$db) Die("Failed to connect");
$stmt=$db->query("select first_name,last_name from customers order by 2");
if(!$stmt) die(print_r($db->errorInfo(),true));
?>
<table>
<tr><th>First Name</th><th>Last Name</th></tr>
<?php 
while($row=$stmt->fetch()) 
  echo("<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>");
?>
</table>
</body>
</html>
