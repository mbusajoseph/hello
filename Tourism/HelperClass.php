<?php
/**
 * 
 */
class HelperClass
{
	public static function render($message)
	{
		header('Content-type: text/plain');
        echo "CON ".$message;
        exit();
	}

	public static function endSession($message)
	{
		header('Content-type: text/plain');
        echo "END ".$message;
        exit();
	}
}