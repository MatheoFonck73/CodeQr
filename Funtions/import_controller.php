<?php
include('Connection.php');
class  import_controller
{
	public static function insert()
	{
		$Connection = new Connection();
		$ConnectionDb = $Connection->connect();

		$FileUser = $_FILES['FileUser'];
		$FileUser = file_get_contents($FileUser['tmp_name']);

		$FileUser = explode("\n", $FileUser);
		$FileUser = array_filter($FileUser);

		foreach ($FileUser as $user) {
			$UserctList[] = explode(",", $user);
		}

		foreach ($UserctList as $UserData) {
			$ConnectionDb->query("INSERT INTO users 
								(Name,
								 Last_Name,
								 Card)
								 VALUES
								 ('{$UserData[0]}',
								  '{$UserData[1]}', 
								  '{$UserData[2]}'
								   )
		
								 ");
		}
	}
}
import_controller::insert();

#creator: Mateo Fonseca
