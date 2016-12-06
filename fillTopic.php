<head>
</head>


<?php
	include_once "functions.php";
	$stuff= new userFunctions():
	
if(isset($_POST['submitButton'] and  ) ) {
	$result = $post->signup($_POST['username'], $_POST['major'], $_POST['name'], $_POST['password']);
	

try {
  $dbh = new PDO( 'mysql:host=classdb.it.mtu.edu;dbname=llpeters', "llpeters",
   "789456123");
  $dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	echo $_POST["topic"]." ".$_POST["username"];
  echo "<table border='1'>";
  echo "<TR>";
  echo "<TH> Reply </TH>";
  echo "<TH> Author </TH>";
  echo "</TR>";
  foreach ($dbh->query('select contents, user from reply where name='.$_POST["topic"].'') as $row){
    echo "<TR>";
    echo '<TD>'.$row[0].'</TD>';
    echo '<TD>'.$row[1].'</TD>';
    echo "</TR>";
  }
  echo "</table>";

	echo'<form action="">' 
	echo '<input type="textbox" name="reply">';
	echo '<input type="text" name="user">';
}
catch (PDOException $e) {
  print "Error!".$e->getMessage()."</br>";
  die();
}
?>
