<?php

/**
 * 
 */
class DatabaseConnection
{
	
	public static function dbConnect()
	{
		  $conn = mysqli_connect("localhost", "root", "groupc", "simpletech_tourism");
		 //$conn = mysqli_connect("localhost", "simpletech_tourism", "iiwPj8A;ZqR5", "simpletech_tourism");

		return $conn;
	}
}
trait getData
{
  public static function get($field) {
    if (isset($_REQUEST[$field])):
      return strip_tags($_GET[$field]);
    else:
      return $_GET;
    endif;
  }
  public static function post($field) {
    if (isset($_POST[$field])):
      return strip_tags($_POST[$field]);
    else:
      return $_GET;
    endif;
  }
  public static function failure(string $message = 'Oops, something went wrong, please try again later.') {
    return '<div class="alert alert-warning alert-dismissible fade show">
    <strong>Failure! </strong>'. $message.'
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
  }
  public static function success(string $message) {
    return '<div class="alert alert-success alert-dismissible fade show">
    <strong>Success! </strong>'. $message.'
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
  }
  public static function redirect(string $url) {
	  header('Location: '.$url);
	  exit;
  }
}
