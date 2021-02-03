<?php
include 'servicesController.php';
//deny access for users who are not logged in
User::isLoggedIn();
//get username
$username = User::userName();
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
//cancle approval
if (isset($_REQUEST['cancel'])) {
    $response = Tourism::cancel_approval();
}
//get the requset to edit a package
$pk_id = $pk_name = $pk_cost = "";
if (isset($_REQUEST['action'])) {
    Tourism::get_package_by_id();
    $pk_id = Tourism::$packageId;
    $pk_name = Tourism::$packageName;
    $pk_cost = Tourism::$packageCost;
}
//get number of packages
$num_packs = Tourism::num_of_packages();
