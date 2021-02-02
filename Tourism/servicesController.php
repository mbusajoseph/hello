<?php
include 'DatabaseConnection.php';
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
}
class Tourism
{
  use getData;
  public function __construct()
  {
  }
  public static function get_services() {
    $services = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM park_orders";
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $services[] = $data;
    }
    return $services;
  }
  public static function get_national_parks() {
    $parks = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM national_parks";
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $parks[] = $data;
    }
    return $parks;

  }
  /**
   * @method get_packages
   * @return array An array of package rows fecthed from the database
   */
  public static function get_packages() {
    $packages = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM packages";
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $packages[] = $data;
    }
    return $packages;

  }
  private static function failure(string $message = 'Oops, something when wrong, please try again later.') {
    return '<div class="alert alert-warning alert-dismissible fade show">
    <strong>Failure! </strong>'. $message.'
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
  }
  private static function success(string $message) {
    return '<div class="alert alert-success alert-dismissible fade show">
    <strong>Success! </strong>'. $message.'
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>';
  }
  public static function approve_order() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::get('order');
    $sql = "UPDATE park_orders SET `status` = 'approved' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success('Order approved successfully');
    }else {
      return self::failure();
    }
  }
}

