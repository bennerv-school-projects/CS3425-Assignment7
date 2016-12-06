<?php

class userFunctions {

	public function creatReply($topic, $name, $contents) {
	  $dbh = new PDO( 'mysql:host=classdb.it.mtu.edu;dbname=llpeters', "llpeters",
   "789456123");
	  $dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
			$statement = $dbh->prepare('insert into reply values(?, ?)');	
			$result = $statement->execute([
				$topic,
				$name,
				$contents
			]);
					
	}	
}
