<?php
include 'DatabaseConnection.php';
class Tourism
{
  use getData;
  public static $packageName;
  public static $packageCost;
  public static $packageId;
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
  public static function approve_order() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::get('order');
    $sql = "UPDATE park_orders SET `status` = 'approved' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Order approved successfully <a href='javascript:void(0)' class='btn btn-primary btn-sm' onclick='cancelApproval()' data-approve='$order' id='approve'>undo </a>");
    }else {
      return self::failure();
    }
  }
  public static function cancel_approval() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::get('order');
    $sql = "UPDATE park_orders SET `status` = 'pending' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Order's approval cancelled successfully <a href='javascript:void(0)' class='btn btn-primary btn-sm' onclick='approve()' data-approve='$order' id='approve'>undo </a> ");
    }else {
      return self::failure();
    }
  }
  public static function undo_approval() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::post('order');
    $sql = "UPDATE park_orders SET `status` = 'approved' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Action undone successfully");
    }else {
      return self::failure();
    }
  }
  public static function undo_cancel_approval() {
    $connection = DatabaseConnection::dbConnect();
    $order =  self::post('order');
    $sql = "UPDATE park_orders SET `status` = 'pending' WHERE id = $order";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      return self::success("Action undone successfully");
    }else {
      return self::failure();
    }
  }
  public static function get_package_by_id(){
    $connection = DatabaseConnection::dbConnect();
    $package_id = self::get('package');
    $sql = "SELECT * FROM packages WHERE id = $package_id";
    $result = mysqli_query($connection, $sql);
    if(!empty($result)) {
      while($data = mysqli_fetch_assoc($result)) {
        self::$packageName = $data['name'];
        self::$packageCost = $data['price'];
        self::$packageId   = $data['id'];
      }
    }
  }
  public static function add_package() {
    $connection = DatabaseConnection::dbConnect();
    $name = self::post('packageName');
    $price = self::post('packagePrice');
    $sql = "INSERT INTO packages (name, price) VALUES ('$name', '$price')";
    $checkpoint = "SELECT id FROM packages WHERE name = '$name'";
    $check = mysqli_query($connection, $checkpoint);
    if (mysqli_num_rows($check) > 0) {
      $getID = mysqli_fetch_assoc($check);
      $pkId = $getID['id'];
      echo self::failure("Package name already exists. <br/> Please choose a different name or <a href='action-center?action=edit&package=$pkId' class='b-link font-weight-bold'>Rename</a> the existing package.");
      return false;
    }else {
      mysqli_query($connection, $sql);
      if(mysqli_affected_rows($connection) > 0) {
        echo self::success("Package added successfully");
      }else {
        echo self::failure();
      }
    }
  }
  public static function num_of_packages() {
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT COUNT(id) FROM packages";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['COUNT(id)']; 
  }
  public static function edit_package() {
    $connection = DatabaseConnection::dbConnect();
    $id = self::post('id');
    $name = self::post('name');
    $price = self::post('price');
    $sql = "UPDATE packages SET price = $price, name = '$name' WHERE id = $id";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      echo self::success('Package Details Updated Succefully');
    }else {
      echo self::failure();
    }
  }
  public static function delete_package() {
    $connection = DatabaseConnection::dbConnect();
    $id = self::post('id');
    $sql = "UPDATE packages SET `status` = '1' WHERE id = $id";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      echo self::success("Package Deleted successfully! <a href='javascript:void(0)' class='btn btn-primary btn-sm' onclick='cancelDelete()' data-package='$id' id='cancel'>undo </a> ");
    }else {
      echo self::failure();
    }
  }
  public static function undo_package_delete() {
    $connection = DatabaseConnection::dbConnect();
    $id = self::post('id');
    $sql = "UPDATE packages SET status = '0' WHERE id = $id";
    mysqli_query($connection, $sql);
    if (mysqli_affected_rows($connection) > 0) {
      echo self::success("Action undone successfully");
    }else {
      echo self::failure();
    }
  }
}
//undo order approval action
if (isset($_POST['approve'])) {
  echo Tourism::undo_approval();
}
//undo cancle approval action
if(isset($_POST['cancel'])) {
  echo Tourism::undo_cancel_approval();
}
//add package
if(isset($_POST['action']) && $_POST['action'] == 'add') {
  Tourism::add_package();
}
//update packages
if(isset($_POST['action']) && $_POST['action'] == 'save') {
  Tourism::edit_package();
}
//delete a package
if(isset($_POST['action']) && $_POST['action'] == 'delete') {
  Tourism::delete_package();
}
//undo the package delete action
if(isset($_POST['action']) && $_POST['action'] == 'cancel') {
  Tourism::undo_package_delete();
}


class User
{
  use getData;
  public function __construct()
  {
    
  }
  public static function isLoggedIn() {
    session_start();
    if (!isset($_SESSION['username'])) {
      self::redirect('index.php');
    }
  }
  public static function userName() {
    return $_SESSION['username'];
  }
}
