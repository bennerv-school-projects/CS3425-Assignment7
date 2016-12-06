<?php
	if(isset($_POST['topic'])) {
		if((!isset($_POST['username'])) or strlen($_POST['username']) == 0) {
			$_POST['username'] = "anonymous";
		} 
		$dbh = new PDO( 'mysql:host=classdb.it.mtu.edu;dbname=llpeters', 'llpeters', '789456123');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $dbh->prepare("INSERT INTO topic values(?, ?)");
		$statement->execute([
			$_POST['topic'],
			$_POST['username']
		]);

		exit(header('location: fillTopic.php'));
	}



?>

<html>
	<body>
		<!-- Table and table population -->
		<table border='1'>
			<TR>
			<TH>Topic</TH>
			<TH>Author</TH>
			<TH>Go to</TH>

			<?php 
				$dbh = new PDO( 'mysql:host=classdb.it.mtu.edu;dbname=llpeters', 'llpeters', '789456123');
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$statement = $dbh->prepare("SELECT name, user FROM topic");
				$statement->execute();
				$result = $statement->fetchAll();
				foreach($result as $row) {
					echo "<TR>";
						echo '<form method="post" action="fillTopic.php">';
						echo '<input type="hidden" name="topic" value="'.$row['name'].'">';
						echo '<input type="hidden" name="username" value="'.$row['user'].'">';
						
						echo "<TR>";
						echo "<TD>".$row['name']."</TD>";
						echo "<TD>".$row['user']."</TD>";
						echo '<TD> <input type="submit" name="goto" value="Go To Topic"> </TD>';
						echo "</TR>";
						echo '</form>';
				}
			?>

		</table>

		<!-- Input form for a new topic here -->
		<form method="post" action="">
			<br>
			<input type="text" name="topic" value="Topic Name">
			<input type="text" name="username" value="Username">
			<input type="submit" name="newTopic" value="Create New Topic">			
		</form>		
	</body>
</html>
