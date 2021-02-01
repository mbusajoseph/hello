<?php

/**
 * 
 */
class DatabaseConnection
{
	
	public static function dbConnect()
	{
		  $conn = mysqli_connect("localhost", "root", "", "tourism");
		 //$conn = mysqli_connect("localhost", "simpletech_tourism", "iiwPj8A;ZqR5", "simpletech_tourism");

		return $conn;
	}
}