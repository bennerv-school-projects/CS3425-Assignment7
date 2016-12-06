<?php
	include_once "functions.php";
	$stuff= new userFunctions();

if (!isset($_POST["topic"]))
	exit(header("location: topics.php"));
	
if(isset($_POST['submitButton']) and isset($_POST["reply"]) and strlen($_POST["reply"])!= 0) {
	if (!isset ($_POST["user"]) or strlen($_POST["user"])== 0)
		$user = "anonymous";
	else
		$user = $_POST["user"];
	$stuff->createReply($_POST["topic"], $user, $_POST["reply"]);
}	

try {
  $dbh = new PDO( 'mysql:host=classdb.it.mtu.edu;dbname=llpeters', "llpeters",
   "789456123");
  $dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	echo "<b>".$_POST["topic"]."</b> by ".$_POST["username"];
  echo "<table border='1'>";
  echo "<TR>";
  echo "<TH> Reply </TH>";
  echo "<TH> Author </TH>";
  echo "</TR>";
	$statement = 'select contents, user from reply where topic_name=?';
	$res = $dbh->prepare($statement );
	$res->execute([$_POST["topic"]]);
	$chunks = $res->fetchAll();
  foreach ($chunks as $row){
    echo "<TR>";
    echo '<TD>'.$row[0].'</TD>';
    echo '<TD>'.$row[1].'</TD>';
    echo "</TR>";
  }
	echo "<br>";
  echo "</table>";
	echo '<form action="" method="post">'; 
	echo '<input type="textbox" name="reply">';
	echo '<input type="text" name="user">';
	echo '<input type="hidden" name="topic" value="'.$_POST["topic"].'">';
	echo '<input type="hidden" name="username" value="'.$_POST["username"].'">';
	echo '<input type="submit" name="submitButton" value="Reply">';
	echo '</form>';
}
catch (PDOException $e) {
  print "Error!".$e->getMessage()."</br>";
  die();
}
?>
