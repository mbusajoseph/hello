<?php
include 'DatabaseConnection.php';
class Tourism
{
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
}
