<?php
include 'servicesController.php';
//get the services orderd for
$data = Tourism::get_services();

//get the national parks
$parks = Tourism::get_national_parks();
