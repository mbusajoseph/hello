<?php include 'app_view.php' ?>
<!DOCTYPE html>
<html> 
    <head>  
    <link rel="icon" href="" size="16x16" type=""/>
        <title>Dashboard | TOURISM CENTER</title>  
        <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">-->
       <!-- <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">
        <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style type="text/css">
             body{
                background-image: url("");
                 background-repeat: round;
        background-attachment: fixed;
            }
        </style>
    </head> 
    <body>  
       <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand">TOURISM CENTER</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active"></a>
            <div class="nav-item dropdown">
                <a href="./" class="nav-link dropdown-toggle" data-toggle="dropdown">HOME</a>
                <div class="dropdown-menu">
                   
                    <a href="#" class="dropdown-item"></a>
                   
                </div>
            </div>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">NATIONAL_PARKS</a>
                <div class="dropdown-menu">
                   <?php foreach ($parks as $park): ?>
                    <a href="#" class="dropdown-item"><?= $park['name'] ?></a>
                   <?php endforeach ?>
                </div>
            </div>
        </div>
        <form class="form-inline" action="search.php" method="get">
            <div class="input-group">                    
                <input type="search" class="form-control" placeholder="Search" name="q">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <div class="navbar-nav">
           <a href="javascript:void(0)" class="nav-item nav-link">      
       <strong class="text-primary"><i class="fas fa-user"></i> Hi, 
     </strong>
 
    
            <a href="index.php?logout='1'" class="nav-item nav-link">Logout</a>
        </div>
    </div>
</nav>
<main class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card mt-3">
                <div class="card-header py-1">
                <h5 class="font-weight-bold">TOURISM SERVICES </h5>
                </div>
                    <div class="card-body">
                        <div class="row">
                        <?php foreach ($data as $value): ?>
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="card card-body shadow mt-2">  
                                 <div class="row justify-content-between">
                                    <h5 class="text-muted">CUSTOMER ID: </h5>
                                    <span class="text-success"><?=$value['package_id']; ?> </span>
                                    </div>
                                    <div class="row justify-content-between">
                                        <h5 class="text-muted">TELPHONE: </h5>
                                         <span class="text-success"><?=$value['phone_number']; ?> </span>
                                    </div>
                                    <div class="row justify-content-between">
                                         <h5 class="text-muted">STATUS: </h5>
                                         <span class="text-success"><?=$value['status']; ?> </span>
                                    </div>
                                    <div class="row justify-content-between">
                                            <h5 class="text-muted">DATE_ORDERED: </h5>
                                            <span class="text-success"><?= $value['date_ordered'];?> </span>
                                    </div>
                                    <div class="row justify-content-between">
                                            <h5 class="text-muted">ACTION: </h5>

                                            <?php if($value['status'] == 'pending'): ?>
                                            <form action="" method="get">
                                             <input type="hidden" name="approve" value="true"/>
                                             <input type="hidden" name="order" value="<?= $value['id'] ?>"/>
                                             <button type="submit"  class="btn btn-success btn-sm" onclick="return confirm('Approve this order?')">Approve</button>   
                                            </form>
                                            <?php  endif ?>

                                            <?php if($value['status'] == 'approved'): ?>
                                            <form action="" method="get">
                                             <input type="hidden" name="cancel" value="true"/>
                                             <input type="hidden" name="order" value="<?= $value['id'] ?>"/>
                                             <button type="submit"  class="btn btn-success btn-sm" onclick="return confirm('Cancel Approval for this order?')">Cancel Approval</button>   
                                            </form>
                                            <?php  endif ?>
                                    </div>
                                </div>
                            </div>   
                        <?php endforeach ?>         
                </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header py-1">
                <h5 class="font-weight-bold">TOURISM PACKAGES</h5>
                </div>
                    <div class="card-body">
                        <div class="row">
                        <?php foreach ($packages as $value): ?>
                            <div class="col-md-12 col-lg-4 col-xl-4">
                                <div class="card card-body shadow mt-2">  
                                 <div class="row justify-content-between">
                                    <h5 class="text-muted">PACKAGE NAME: </h5>
                                    <span class="text-success"><?=$value['name']; ?> </span>
                                    </div>
                                    <div class="row justify-content-between">
                                        <h5 class="text-muted">COST: </h5>
                                         <span class="text-success"><?=$value['price']; ?> </span>
                                    </div>
                                </div>
                            </div>   
                        <?php endforeach ?>         
                </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="fixed-bottom w-50" id="response">
        <?= $response ?>
    </div>
</main>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        function approve() {
            let el = document.getElementById('approve');
            let orderId = el.getAttribute('data-approve');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'servicesController.php');
            xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    document.getElementById('response').innerHTML = this.responseText;
                }
            }
            xhr.send("approve=true&order="+orderId);
        }
        function cancelApproval() {
            let el = document.getElementById('approve');
            let orderId = el.getAttribute('data-approve');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'servicesController.php');
            xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    document.getElementById('response').innerHTML = this.responseText;
                }
            }
            xhr.send("cancel=true&order="+orderId);
        }
    </script>
</body> 
    </body> 
</html>
