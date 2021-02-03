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
    <a href="dahsboard.php" class="navbar-brand">TOURISM CENTER</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active"></a>
            <a href="./dashboard.php" class="nav-item nav-link">HOME</a>
                <a href="#package" class="nav-item nav-link">Add Package</a>
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
                    <div class="row justify-content-between">
                        <h5 class="font-weight-bold">EDIT PACKAGE</h5>
                        <div class="before-2 d-none">
                            <span class="spinner-border spinner-border-sm text-danger"></span> deleting...
                                    </div>
                        <form action="" method="post" id="deletePackageForm">
                            <input type="hidden" name="action" value="delete"/>
                            <input type="hidden" name="id" value="<?= $pk_id ?>"/>
                            <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Delete this package?')">Trash <i class="fas fa-trash"></i> </button>
                        </form>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>PACKAGE ID</th>
                                    <th>PACKAGE NAME</th>
                                    <th>PACKAGE COST</th>
                                    <th><div class="before-1 d-none">
                                    <span class="spinner-border spinner-border-sm text-success"></span> saving...
                                    </div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $pk_id ?></td>
                                    <form action="" method="post" id="editPackageForm">
                                        <input type="hidden" name="action" value="save"/>
                                        <input type="hidden" name="id" value="<?= $pk_id ?>"/>
                                         <td><input type="text" name="name" class="edit-input" value="<?= $pk_name ?>"/></td>
                                        <td><input type="text" name="price" class="edit-input" value="<?= $pk_cost ?>"/></td>
                                        <td><button type="submit" class="btn btn-success btn-sm edit-btn">Save Changes</button> </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
       
    </div>
    <div class="fixed-bottom w-50" id="response-2">
        
    </div>
</main>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/tourism.js"></script>
</body> 
    </body> 
</html>
