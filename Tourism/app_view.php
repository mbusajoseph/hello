<?php
include 'servicesController.php';
//get the services orderd for
$data = Tourism::get_services();

//get the national parks
$parks = Tourism::get_national_parks();
//get packages
$packages = Tourism::get_packages();
//capture the approval action
$response = "";
if (isset($_REQUEST['approve'])) {
    $response = Tourism::approve_order();
}
