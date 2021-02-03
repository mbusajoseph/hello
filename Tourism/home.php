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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/style.css">
    </head> 
    <body>  
       <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="dashboard.php" class="navbar-brand">TOURISM CENTER</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
        <a href="#" class="nav-item nav-link active"></a>
            <a href="./dashboard.php" class="nav-item nav-link">HOME</a>
                <a href="#package" class="nav-item nav-link" data-toggle="modal" data-target="#package">Add Package</a>
                <a href="#user" class="nav-item nav-link" data-toggle="modal" data-target="#user">Create User</a>
            <div class="nav-item dropdown">
            <a href="#" class="nav-item nav-link">All Package <span class="badge badge-dark"><?=$num_packs?></span> </a>
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
       <strong class="text-primary"><i class="fas fa-user"></i> Hi, <?= $username?>
     </strong>
            <a href="auth.php?logout='1'" class="nav-item nav-link" onclick="return confirm('Logout?')">Logout</a>
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
                                         <span class="text-success"><?=number_format($value['price']) ?> </span>

                                    </div>
                                    <div class="row justify-content-between">
                                        <h5 class="text-muted">ACTION: </h5>
                                         <a href="action-center?action=edit&package=<?=$value['id']; ?> " class="b-link stretched-link"><i class="fas fa-edit"></i> </a>
                                         
                                    </div>
                                </div>
                            </div>   
                        <?php endforeach ?>         
                </div>
                </div>
            </div>
        </div>
       
    </div>
    <!-- Add packages model -->
    <div id="package" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD PACKAGE</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="addPackageForm">
                        <input type="hidden" name="action" value="add"/>
                        <div class="form-group">
                            <label for="packageName">Package Name</label>
                            <input type="text" name="packageName" class="form-control" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="packagePrice">Package Price</label>
                            <input type="number" name="packagePrice" class="form-control" autocomplete="off" required/>
                        </div>
                        <div class="row justify-content-center before-3 d-none">
                            <span class="spinner-border spinner-border-sm text-success"></span>saving...
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save-package-btn" class="btn btn-primary">SAVE</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Add User model -->
        <div id="user" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CREATE A USER (ADMIN)</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="createUserForm">
                        <input type="hidden" name="account" value="add"/>
                        <div class="form-group">
                            <label for="user">UserName</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" required/>
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" autocomplete="off" required/>
                        </div>
                        <div class="row justify-content-center before-4 d-none">
                            <span class="spinner-border spinner-border-sm text-success"></span>creating...
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel Operation</button>
                    <button type="button" id="create-user-btn" class="btn btn-primary btn-sm">Create User</button>
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
    <script src="js/tourism.js"></script>
</body> 
    </body> 
</html>
