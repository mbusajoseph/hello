<?php
include 'DatabaseConnection.php';
class Toursim_Sevices
{
  public function __construct()
  {
  }
  public function get_services() {
    $services = array();
    $connection = DatabaseConnection::dbConnect();
    $sql = "SELECT * FROM park-orders";
    $result = mysqli_query($connection, $sql);
    while($data = mysqli_fetch_assoc($result)){
      $services[] = $data;
    }
  }
  return $services;
}
$services = new Toursim_Services();
