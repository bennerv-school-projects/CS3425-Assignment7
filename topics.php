<head>
</head>

<?php
try {
  $dbh = new PDO( 'mysql:host=classdb.it.mtu.edu;dbname=airline', "cs3425gr",
   "cs3425gr");
  $dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  echo "<table border='1'>";
  echo "<TR>";
  echo "<TH> Topic </TH>";
  echo "<TH> Author </TH>";
  echo "<TH> Replies </TH>";
  echo "</TR>";
  foreach ($dbh->query("select name, user from topic") as $row){
    echo "<TR>";
    echo '<TD><a href="fillTopic.php">'.$row[0].'</a>yy</TD>';
    echo "<TD>".$row[1]."</TD>";
		$res_count = dbh->query('select count(*) from reply where topic_name='.$row[0].'');
		$replies = $res_count->fetch();
		echo "<TD>".$replies[0]."</TD>"; 
    echo "</TR>";
  }
  echo "</table>";

	echo'<form action="">' 
 
}
catch (PDOException $e) {
  print "Error!".$e->getMessage()."</br>";
  die();
}
?>
